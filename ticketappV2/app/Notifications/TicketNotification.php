<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketNotification extends Notification
{
    use Queueable;
    private $ticket;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Greetings, Mr/Ms. '.$this->ticket->last_name)
                    ->line('Thank you for raising your concern to the university. 
                                The university authority will look into this matter as soon as possible. 
                                    It may also approach you for further information.')
                    ->line('Your' .$this->ticket->category.' ticket ID will be '.$this->ticket->id.'.') 
                    ->line('Please use that ID to access the '.$this->ticket->category.' ticket raised via the portal search engine.
                                You may also use the link provided below to access you ticket at any time if need.')
                    ->action('View '.$this->ticket->category, url('/ticket/'.$this->ticket->id))
                    ->line('Thank you for using our complaint portal!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
