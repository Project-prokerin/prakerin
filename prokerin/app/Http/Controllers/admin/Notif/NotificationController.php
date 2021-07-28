<?php

namespace App\Http\Controllers\admin\Notif;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  

    public function ajax(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications;
        // return view('home', compact('notifications'));

        return response()->json( $notifications );
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
