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
        /*
        factory(User::class)->state('admin')->create([
            'email' => 'him@theluigi.com',
        ]);
        */

        \App\Event::create([
            'title' => 'Chocolate Milk Mile',
            'fee' => 1500,
            'location' => "BHBL High School",
            'date' => Carbon\Carbon::parse("+3 months")
        ]);
    }
}
