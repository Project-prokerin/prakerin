<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\feedback;
use App\Models\guru;
use Carbon\Carbon;

class NewFeedbackAdded extends Notification
{
    use Queueable;



    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('Feedback dari Pokja telah dikirim.')
    //                 ->action('Notification Action', routel('feed'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // di ambil dari event yang ada di feedback_Store disposisi controller
        $untuk = guru::where('id_user',$this->feedback->id_untuk)->first();
        $dari = guru::where('id_user',$this->feedback->id_dari)->first();

        return [
            // 'dari' => 
            'description_feedback' => $this->feedback->description_feedback,
            'untuk' => $untuk->nama,
            'dari' => $dari->nama,
            'dari_jabatan' => $dari->jabatan,
            'id_detail_surat' => $this->feedback->id_detail_surat,

        ];
    }
}
