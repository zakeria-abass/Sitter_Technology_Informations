<?php

namespace App\Http\Controllers\Admin\NotificationsDataBase;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{

    //========================================{{ Read  Notifications}}

    public function read($id){

        DB::table('notifications')->where('id',$id)->update([
            'read_at'=>date('Y-m-d'),
        ]);

        return back();
    }

    //========================================{{ Read All Notifications}}

    public function read_all(){

        $read_all=auth()->user()->unreadNotifications;

        if ($read_all){
            $read_all->markAsRead();
            return back();
        }


    }

    //=================================notification_all

    public function notification_all(){

        return view('admin_dashboard.Notifications.ViewAllNotification');
    }

    //=================================deletenotification

    public function deletenotification(Request  $request){

        $checkbox=$request->checkbox;

        DB::table('notifications')->whereIn('id',$checkbox)->delete();
        return back()->with('delete',__('messages.Delete successfully'));



    }
}
