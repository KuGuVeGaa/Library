<?php

namespace App\Listeners;

use App\Events\UserAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class sendUserAddedMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserAdded  $event
     * @return void
     */
    public function handle(UserAdded $event)
    {
        Log::info('Here tricket');
    }
}
