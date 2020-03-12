<?php

namespace Tests\Feature;

use App\Billing\PaymentGateway;
use App\Exceptions\PaymentFailedException;
use App\User;
use App\Event;
use App\Billing\FakePaymentGateway;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    private function registerForEvent($user, $event, $args){
        return $this
            ->actingAs($user)
            ->post('/events/'.$event->id.'/register', $args);
    }

    /** @test */
    public function a_user_gets_a_registration_number_upon_payment()
    {
        $paymentGateway = new FakePaymentGateway();
        $this->app->instance(PaymentGateway::class, $paymentGateway);

        $user = factory(User::class)->create();
        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000,
            'location' => 'BHBL High School',
            'date' => Carbon::parse('+2 months')
        ]);

        $response = $this->registerForEvent($user, $event, [
            'name' => $user->name,
            'email' => $user->email,
            'user_id' => $user->id,
            'payment_token' => $paymentGateway->getValidTestToken()
        ]);


        $this->assertEquals(1, $event->registrations->count());
        $this->assertEquals(2000, $paymentGateway->getTotalCharges());
    }

    /** @test */
    public function a_user_is_charged_upon_registration()
    {
        $paymentGateway = new FakePaymentGateway();
        $this->app->instance(PaymentGateway::class, $paymentGateway);

        $user = factory(User::class)->create();
        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000,
            'location' => 'BHBL High School',
            'date' => Carbon::parse('+2 months')
        ]);

        $response = $this->registerForEvent($user, $event, [
            'name' => $user->name,
            'email' => $user->email,
            'user_id' => $user->id,
            'payment_token' => $paymentGateway->getValidTestToken()
        ]);

        $response->assertRedirect();
        $this->assertEquals(1, $event->registrations->count());
        $this->assertEquals(2000, $paymentGateway->getTotalCharges());
    }

    /** @test */
    public function a_user_is_charged_for_registration_and_shirt()
    {
        $this->withoutExceptionHandling();

        $paymentGateway = new FakePaymentGateway();
        $this->app->instance(PaymentGateway::class, $paymentGateway);

        $user = factory(User::class)->create();
        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000,
            'location' => 'BHBL High School',
            'date' => Carbon::parse('+2 months')
        ]);

        $response = $this->registerForEvent($user, $event, [
            'name' => $user->name,
            'email' => $user->email,
            'user_id' => $user->id,
            'payment_token' => $paymentGateway->getValidTestToken(),
            'hasShirt' => true,
            'shirtSize' => 'm'
        ]);

        $response->assertRedirect();
        $this->assertEquals(1, $event->registrations->count());
        $this->assertEquals(3500, $paymentGateway->getTotalCharges());
    }

    /** @test */
    public function if_a_payment_fails_the_registration_is_canceled()
    {
        $this->withoutExceptionHandling();
        $paymentGateway = new FakePaymentGateway();
        $this->app->instance(PaymentGateway::class, $paymentGateway);

        $user = factory(User::class)->create();

        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000,
            'location' => 'BHBL High School',
            'date' => Carbon::parse('+2 months')
        ]);

        $response = $this->registerForEvent($user, $event, [
            'payment_token' => 'invalid_token',
            'name' => $user->name,
            'email' => $user->email,
            'user_id' => $user->id,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('payment_error');
        $this->assertEquals(0, $event->registrations->count());
        $this->assertEquals(0, $paymentGateway->getTotalCharges());
    }

}