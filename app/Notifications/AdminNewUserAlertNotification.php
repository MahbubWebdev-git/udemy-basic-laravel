<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNewUserAlertNotification extends Notification
{
    use Queueable;

    public $newUser;

    /**
     * Create a new notification instance.
     * এখানে আমরা কন্ট্রোলার থেকে পাঠানো নতুন ইউজারের অবজেক্টটি গ্রহণ করছি।
     */
    public function __construct($newUser)
    {
        $this->newUser = $newUser;
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
        $loginUrl = url('/login');

        return (new MailMessage)
            ->subject('Alert: New User Registration Pending Approval')
            ->greeting('Hello Admin,')
            ->line('A new user has just registered on your website and is waiting for your review.')
            ->line('**User Details:**')
            ->line('Name: ' . $this->newUser->name)
            ->line('Email: ' . $this->newUser->email)
            ->action('Review and Approve User', $loginUrl)
            ->line('Please login to the admin panel to approve this account.');
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
