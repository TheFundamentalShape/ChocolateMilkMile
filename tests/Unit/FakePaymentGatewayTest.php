<?php

namespace Tests\Feature;

use App\Registration;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Carbon\Carbon;

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
            'fee' => 2000,
            'date' => Carbon::parse("+3 months"),
            'location' => "Burn Hills High School",
        ]);
        $user = factory(User::class)->create();
        $registrantInformation = [
            'name' => $user->name,
            'email' => $user->email,
            'user_id' => $user->id
        ];
        $registration = $event->register($registrantInformation);

        $paymentGateway->charge($registration, $paymentGateway->getValidTestToken());

        $this->assertEquals($registration->event->fee, $paymentGateway->getTotalCharges());
    }
}
