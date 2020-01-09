<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\RegistrantCheckedIn;

class RegistrantCheckedInListener
{
    /**
     * Create the event listener.
     *
     * @param $event
     * @return void
     */
    public function __construct(RegistrantCheckedIn $event)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(RegistrantCheckedIn $event)
    {
        //
    }
}
