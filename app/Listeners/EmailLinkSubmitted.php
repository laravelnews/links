<?php

namespace App\Listeners;

use App\Events\LinkWasSubmitted;
use App\Links;
use Illuminate\Contracts\Mail\Mailer;

class EmailLinkSubmitted
{
    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * Create the event listener.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        //
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param LinkWasSubmitted $event
     */
    public function handle(LinkWasSubmitted $event)
    {
        $this->mailer->send('emails.new_link', ['link' => $event->link], function($message){
            $message->subject('New Link Submitted');
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->to('eric@ericlbarnes.com'); // hard code for now.
        });
    }
}
