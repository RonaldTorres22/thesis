<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Http\Requests;
use App\Event;
use App\Message;
use Session;
use App\User;
use Auth;

class ActivityController extends Controller
{
    public function ISSI(){

    	$user =  Event::where('sales','=','checked')->orderBy('approvedate','desc')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

          return view('activityadmin/index', $data);

    }
     public function mrcc(){

    	$user =  Event::where('film','=','checked')->orderBy('approvedate','desc')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

          return view('activityadmin/mrcc', $data);

    }
     public function gym(){

    	$user =  Event::where('gym','=','checked')->orderBy('approvedate','desc')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

          return view('activityadmin/gym', $data);

    }

     public function sco(){

        $user =  Event::where('visitors','!=',' ')->orWhere('vehicles' ,'!=' ,' ')->orWhere('no_uniforms', '!=',' ')->orderBy('approvedate','desc')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

          return view('activityadmin/sco', $data);

    }
}


