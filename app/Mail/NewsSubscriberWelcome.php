<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsSubscriberWelcome extends Mailable
{
    use Queueable, SerializesModels;

    private $subscriber;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->subscriber['email'])
                    ->from(config('mail.username'))
                    ->subject('Newsletter Subscription')
                    ->markdown('emails.newssubscriber.newssubscriberwelcome');
    }
}
