<?php

namespace App\Notifications;

use App\Models\Program;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventRegistered extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $program;

    public function __construct(Program $program)
    {
        $this->program = $program;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Event Registration Confirmation')
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('You have successfully registered for the event: ' . $this->program->name)
                    ->action('View Event', route('events.show', $this->program->id))
                    ->line('Thank you for registering!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
