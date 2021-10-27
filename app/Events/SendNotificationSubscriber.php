<?php

namespace App\Events;

use App\Mail\EmailBlog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNotificationSubscriber
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function sendEmail()
    {
        $email = 'bhavins@gmail.com';

        $mailData = [
            'blogTitle' => 'Demo Email',
            'blogDescription' => 'Blod Description'
        ];

        Mail::to($email)->send(new EmailBlog($mailData));

        return response()->json(['message' => 'Email has been sent.'], 200);
    }
}
