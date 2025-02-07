<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewEventNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('New Event Created: ' . $this->event->name)
        ->line('A new event "' . $this->event->name . '" has been created.')
        ->action('View Event', url('events/' . $this->event->id))
        ->line('Thank you for being part of our platform!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'title' => $this->event->name,
            'description' => $this->event->description,
            'url' => url('events/' . $this->event->id),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => $this->event->name,
            'description' => $this->event->description,
            'url' => url('events/' . $this->event->id),
        ]);
    }
}
