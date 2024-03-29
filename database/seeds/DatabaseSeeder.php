<?php

use Illuminate\Database\Seeder;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = factory(User::class)->state('admin')->create([
            'email' => 'him@theluigi.com',
            'name' => 'Luigi Battaglioli'
        ]);

        $event = \App\Event::create([
            'title' => 'Chocolate Milk Mile',
            'fee' => 700,
            'location' => "BHBL High School",
            'date' => Carbon\Carbon::parse("+3 months")
        ]);

    }
}
