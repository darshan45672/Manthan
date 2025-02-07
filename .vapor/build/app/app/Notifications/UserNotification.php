<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected int $type;

    public function __construct(int $type)
    {
        $this->type = $type;
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
    public function toMail(object $notifiable): MailMessage
    {
        if ($this->type === 0) {
                return (new MailMessage)
                ->subject('Welcome to Our Platform!')
                ->greeting('Hello, ' . $notifiable->name)
                ->line('Your account has been created successfully.')
                ->line('You can now log in using your registered email address and password.')
                ->action('Login', url('/login'))
                ->line('Thank you for joining us!');
        }else if($this->type === 1) {
            return (new MailMessage)
            ->subject('Your Account Details Have Been Updated')
            ->greeting('Hello, ' . $notifiable->name)
            ->line('Your account details have been updated successfully.')
            ->line('If you did not request this change, please contact support immediately.')
            ->action('View Account', url('/profile'))
            ->line('Thank you for using our platform!');
        }else{
            return (new MailMessage)
            ->subject('Your Account Has Been Deleted')
            ->greeting('Hello, ' . $notifiable->name)
            ->line('We regret to inform you that your account has been deleted from our system.')
            ->line('If this was a mistake or you have any questions, please contact our support team.')
            ->line('Thank you for being a part of our platform!');
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
