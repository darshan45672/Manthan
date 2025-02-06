<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FacultyNotification extends Notification
{
    use Queueable;

    protected $faculty;
    protected $action;

    /**
     * Create a new notification instance.
     */
    public function __construct($faculty, $action)
    {
        $this->faculty = $faculty;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail']; // You can also add other channels like 'database' if required
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        if($this->action === 'created'){
            return (new MailMessage)
                ->subject('Welcome ' . $this->faculty->user->name)
                ->greeting('Hello ' . $this->faculty->user->name . ',')
                ->line('You have been successfully registered as a faculty in the system.')
                ->action('View Your Profile', url('/user-dashboard/profile'))
                ->line('Thank you for being a part of our institution!');
        }
        if($this->action === 'updated'){
            return (new MailMessage)
                ->subject('Profile Updated ' . $this->faculty->user->name)
                ->greeting('Hello ' . $this->faculty->user->name . ',')
                ->line('Your faculty profile has been successfully updated in the system.')
                ->action('View Your Profile', url('/user-dashboard/profile'))
                ->line('Thank you for being a part of our institution!');
        }
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
