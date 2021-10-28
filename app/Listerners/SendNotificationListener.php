<?php

namespace App\Listerners;

use App\Events\SendNotificationEvent;
use App\Mail\SendNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationListener implements ShouldQueue
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
     * @param  SendNotificationEvent  $event
     * @return void
     */
    public function handle(SendNotificationEvent $event)
    {
        $email = $event->subscriber->email;
        Mail::to($email)->send(new SendNotification($event->subscriber, $event->blog, $event->website));
    }
}
