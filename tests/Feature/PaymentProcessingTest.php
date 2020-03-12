<?php

namespace Tests\Feature;

use App\Billing\StripePaymentGateway;
use App\ShirtOrder;
use App\User;
use App\Event;

use Carbon\Carbon;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class PaymentProcessingTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    private function registerForEvent($user, $event, $args){
        return $this
            ->actingAs($user)
            ->post('/events/'.$event->id.'/register', $args);
    }

    /** @test */
    public function a_user_is_charged_upon_registration()
    {
        $paymentGateway = new StripePaymentGateway();
        $this->app->instance(PaymentGateway::class, $paymentGateway);

        $user = factory(User::class)->create();
        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000,
            'date' => Carbon::parse('+2 months'),
            'location' => 'BHBL High School'
        ]);

        $response = $this->registerForEvent($user, $event, [
            'payment_token' => 'tok_amex',
            'name' => $user->name,
            'email' => $user->email,
            'hasShirt' => false,
            'shirtSize' => null
        ]);

        $response->assertRedirect();
        $this->assertEquals(1, $event->registrations->count());
    }

    /** @test */
    public function a_user_is_charged_if_they_have_a_shirt_upon_registration()
    {
        $paymentGateway = new StripePaymentGateway();
        $this->app->instance(PaymentGateway::class, $paymentGateway);

        $user = factory(User::class)->create();
        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000,
            'date' => Carbon::parse('+2 months'),
            'location' => 'BHBL High School'
        ]);

        $response = $this->registerForEvent($user, $event, [
            'payment_token' => 'tok_amex',
            'name' => $user->name,
            'email' => $user->email,
            'token' => "tok_amex",
            'hasShirt' => true,
            'shirtSize' => 'lg'
        ]);

        $response->assertRedirect();
        $this->assertEquals(1, $event->registrations->count());
        $this->assertEquals(1, ShirtOrder::all()->count());
    }

    /** @test */
    public function if_a_payment_fails_the_registration_is_canceled()
    {
        $this->withoutExceptionHandling();
        $paymentGateway = new StripePaymentGateway();

        $this->app->instance(PaymentGateway::class, $paymentGateway);

        $user = factory(User::class)->create();
        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000,
            'date' => Carbon::parse('+2 months'),
            'location' => 'BHBL High School'
        ]);

        $response = $this->registerForEvent($user, $event, [
            'payment_token' => 'tok_chargeDeclined',
            'name' => $user->name,
            'email' => $user->email,
            'hasShirt' => false,
            'shirtSize' => null
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('payment_error');

        $this->assertEquals(0, $event->registrations->count());
    }
}