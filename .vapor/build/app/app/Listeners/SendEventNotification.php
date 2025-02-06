<?php

namespace App\Listeners;

use App\Events\EventCreated;
use App\Models\User;
use App\Notifications\NewEventNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEventNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventCreated $program)
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->notify(new NewEventNotification($program->program));
        }
    }
}
