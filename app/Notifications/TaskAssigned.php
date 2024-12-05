<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TaskAssigned extends Notification
{
    use Queueable;

    protected $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nouvelle tâche assignée')
                    ->line('Une nouvelle tâche vous a été assignée : ' . $this->task->title)
                    ->action('Voir la tâche', url('/tasks/' . $this->task->id))
                    ->line('Merci d’utiliser Project Manager !');
    }


    public function toArray($notifiable)
    {
        return [
            'task_id' => $this->task->id,
            'title' => $this->task->title,
            'description' => $this->task->description,
            'assigned_by' => auth()->user()->name,
            'user_id' => $notifiable->id,
        ];
    }
    
}
