<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Event;
use App\User;

class EventTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /** @test */
    public function a_registrant_can_register_for_the_event()
    {
        $user = factory(User::class)->create();

        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000,
            'date' => Carbon::parse("+3 months"),
            'location' => "Burn Hills High School",
        ]);

        $registrantInformation = [
            'name' => $user->name,
            'email' => $user->email,
            'user_id' => $user->id
        ];

        $event->register($registrantInformation);

        $this->assertEquals(1, $event->registrations()->count());
        $this->assertEquals(1, $user->registrations()->count());
    }
}
