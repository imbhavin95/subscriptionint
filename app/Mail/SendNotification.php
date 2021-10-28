<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;
    public $blog;
    public $website;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriber, $blog, $website)
    {
        $this->subscriber = $subscriber;
        $this->blog = $blog;
        $this->website = $website;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New blog added in website {$this->website->name}")->view('emails.blog.notification', ['subscriber' => $this->subscriber, 'blog' => $this->blog, 'website' => $this->website]);
    }
}
