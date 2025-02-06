<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentNotification extends Notification
{
    use Queueable;

    protected $student;
    protected $action;

    /**
     * Create a new notification instance.
     */
    public function __construct($student, $action)
    {
        $this->student = $student;
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
                ->subject('Welcome ' . $this->student->user->name)
                ->greeting('Hello ' . $this->student->user->name . ',')
                ->line('You have been successfully registered as a student in the system.')
                ->line('USN: ' . $this->student->usn)
                ->line('Semester: ' . $this->student->semester)
                ->action('View Your Profile', url('/user-dashboard/profile'))  
                ->line('Thank you for being a part of our institution!');
        }
        if($this->action === 'updated'){
            return (new MailMessage)
                ->subject('Profile Updated ' . $this->student->user->name)
                ->greeting('Hello ' . $this->student->user->name . ',')
                ->line('Your student profile has been successfully updated in the system.')
                ->line('USN: ' . $this->student->usn)
                ->line('Semester: ' . $this->student->semester)
                ->action('View Your Profile', url('/user-dashboard/profile'))
                ->line('Thank you for being a part of our institution!');
        }
    }
}
