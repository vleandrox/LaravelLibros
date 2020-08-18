<?php

namespace App\Listeners;

use App\Notifications\MensajeNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class MensajeListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = User::whereHas('roles', function ($query) {
            $query->where('nombre', '=', 'administrador'); // this is the role id inside of this callback
        })->get();
        foreach($admin as $admins){
            Notification::send($admins, new MensajeNotification($event->mensaje));
        }
        
    }
}
