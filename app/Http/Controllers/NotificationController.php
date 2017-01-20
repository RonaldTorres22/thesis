<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logistic;
use App\Http\Requests;
use App\Event;
use App\User;
use App\Letter;
use Auth;
use App\Task;
use App\Personalmessage;

class NotificationController extends Controller
{
    public function getNotification(){

        $event = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'CICT');
        })->where('notif',0)->update(array('notif' => 1));
     
		return response('sdfsdf');
    }
    public function getNotificationsba(){

        $event = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'SBA');
        })->where('notif',0)->update(array('notif' => 1));
     
        return response('sdfsdf');
    }
    public function getNotificationcnams(){

         $event = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'CNAMS');
        })->where('notif',0)->update(array('notif' => 1));

        return response('sdfsdf');
    }
    public function getNotificationsas(){
        $event = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'SAS');
        })->where('notif',0)->update(array('notif' => 1));
     
        return response('sdfsdf');
    }
    public function getNotificationsed(){
        $event = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'SED');
        })->where('notif',0)->update(array('notif' => 1));
     
        return response('sdfsdf');
    }
    public function getNotificationsea(){
        $event = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'SEA');
        })->where('notif',0)->update(array('notif' => 1));
     
        return response('sdfsdf');
    }
    public function getNotificationchtm(){
        $event = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'CHTM');
        })->where('notif',0)->update(array('notif' => 1));
     
        return response('sdfsdf');
    }
    public function getNotificationccjef(){
        $event = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'CCJEF');
        })->where('notif',0)->update(array('notif' => 1));
     
        return response('sdfsdf');
    }



//others
    public function getNotificationosa(){
    	 $event = Event::where("notif",2)->update(array('notif' => 3));

		return response('sdfsdf');
    }

    public function getNotificationcsdo(){
         $event = Logistic::where("notif",0)->update(array('notif' => 1));

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

    public function getNotificationtask(){
    $user = Auth::user()->name;
     $event = Task::where('to_who','=',$user)->where("notif",0)->update(array('notif' => 1));
        return response('sdfsdf');
    }
  
    public function getNotificationtaskmain(){
    $user = Auth::user()->name;
     $event = Task::where('organization','=',$user)->where("notif",2)->update(array('notif' =>3 ));
        return response('sdfsdf');
    }   

    public function getNotificationPM(){
    $user = Auth::user()->name;
     $event = Personalmessage::where('send_to','=',$user)->where("notif",0)->update(array('notif' =>1 ));
        return response('sdfsdf');
    } 
  
}
