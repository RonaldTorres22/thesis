<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\User;
use App\Letter;
use Auth;

class NotificationController extends Controller
{
    public function getNotification(){
    	 $event = Event::where("notif",0)->update(array('notif' => 1));
     
		return response('sdfsdf');
    }

    public function getNotificationosa(){
    	 $event = Event::where("notif",2)->update(array('notif' => 3));

		return response('sdfsdf');
    }

    public function getNotificationuser(){
    	 $event = Auth::user()->events()->where("notif",3)->update(array('notif' => 4));
         // $event = Auth::user()->events()->where("notif",5)->update(array('notif' => 6));
		return response('sdfsdf');
    }

    public function getNotificationvpaa(){
     $event = Letter::where("notif",0)->update(array('notif' => 1));
        return response('sdfsdf');
    }
     
}
