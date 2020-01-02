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
    use DatabaseMigrations;

    private function registerForEvent($user, $event, $args){
        return $this
            ->actingAs($user)
            ->post('/events/'.$event->id.'/register', $args);
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
            'payment_token' => $paymentGateway->getValidTestToken()
        ]);

        $response->assertStatus(201);
        $this->assertEquals(1, $event->registrations->count());
        $this->assertEquals(2000, $paymentGateway->getTotalCharges());
    }

    /** @test */
    public function if_a_payment_fails_the_registration_is_canceled()
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
            'payment_token' => 'invalid'
        ]);

        $response->assertStatus(422);
        $this->assertEquals(0, $event->registrations->count());
        $this->assertEquals(0, $paymentGateway->getTotalCharges());
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
            'payment_token' => $paymentGateway->getValidTestToken()
        ]);

        $response->assertStatus(201);
        $response->assertSee('confirmation_number');

        $this->assertEquals(1, $event->registrations->count());
        $this->assertEquals(2000, $paymentGateway->getTotalCharges());
    }

    /** @test */
    public function a_failed_payment_does_not_get_a_registration()
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
            'payment_token' => 'tok_invalid'
        ]);

        $response->assertStatus(422);
        $response->assertDontSee('confirmation_number');
        $this->assertEquals(0, $event->registrations->count());
        $this->assertEquals(0, $paymentGateway->getTotalCharges());
    }
}