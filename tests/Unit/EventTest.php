<?php

namespace Tests\Feature;

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
    public function a_user_can_register_for_the_event()
    {
        $user = factory(User::class)->create();
        $event = Event::create([
            'title' => 'The Chocolate Milk Mile',
            'fee' => 2000
        ]);

        $event->register($user);

        $this->assertEquals(1, $event->registrations()->count());
    }
}
