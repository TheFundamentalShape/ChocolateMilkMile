<?php

namespace Tests\Feature;

use App\Registration;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Billing\FakePaymentGateway;
use App\Event;
use App\User;

class FakePaymentGatewayTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /** @test */
    public function can_get_total_charges()
    {
        $paymentGateway = new FakePaymentGateway();
        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000
        ]);
        $registration = $event->register(factory(User::class)->create());

        $paymentGateway->charge($registration, $paymentGateway->getValidTestToken());

        $this->assertEquals($registration->event->price, $paymentGateway->getTotalCharges());
    }
}
