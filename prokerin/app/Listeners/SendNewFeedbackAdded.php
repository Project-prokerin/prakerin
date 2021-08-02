<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;
use App\Notifications\NewFeedbackAdded;

use Illuminate\Support\Facades\Notification;
class SendNewFeedbackAdded
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //pilih akun/role yang ingin dikirim notif nya ke tu,kurikulum,kesiswaan,admin
        // $tu = User::whereIn('role',['tu','kurikulum','kesiswaan','admin'])->get();
        $tu = User::where('role','tu')->get();
    Notification::send($tu, new NewFeedbackAdded($event->user));
    }
}
