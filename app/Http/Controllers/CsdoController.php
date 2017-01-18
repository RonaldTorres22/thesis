<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Event;
use App\Logistic;
use DateTime;
use Carbon\Carbon;
use Auth;

class CsdoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $current = Carbon::now();

          $time = $current->setTimezone('Asia/Singapore')->toDateString();
        $event = Event::Where('date', '=', $time)->Where('status', '=', 'approved')->get();

        $approve = Event::Where('status', '=', 'approved')->Where('date', '!=', $time)->Where('date', '>', $time)->get();
        $past = Event::Where('status', '=', 'approved')->Where('date','!=', $time)->Where('date','<',$time)->get();

        // $user =  Event::all();
       
        // $current->setTimezone('Asia/Singapore');
        
        return view('csdo/home')->with('time',$time)->with('event',$event)->with('approve', $approve)->with('past',$past);
    }

    public function logistics()
    {

        $user =  Logistic::orderBy('id','desc')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
                     
        ];


           return view('csdo/logistic', $data);

    }

    public function viewevents()
    {
        $user = Event::orderBy('approvedate','desc')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "CSDO"){
           return view('csdo/eventlist', $data);
        }
        else
        {
            return view('error404');
        }

    }

    public function showevent($id)
    {
        $event = Event::findOrFail($id);
        $first_date = new DateTime($event->start_time);
        $second_date = new DateTime($event->end_time);
        $difference = $first_date->diff($second_date);
        $data = [
            'page_title'    => $event->title,
            'event'         => $event,
            'duration'      => $this->format_interval($difference)
        ];
         if(Auth::User()->Department == "CSDO"){
        return view('csdo/show', $data);
        }
        else
        {
           return view('error404');
        }
    }

        public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $time->format('Y-m-d H:i:s');
    }
    
    public function change_date_format_fullcalendar($date)
    {
        $time = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $time->format('d/m/Y H:i:s');
    }
    
    public function format_interval(\DateInterval $interval)
    {
        $result = "";
        if ($interval->y) { $result .= $interval->format("%y year(s) "); }
        if ($interval->m) { $result .= $interval->format("%m month(s) "); }
        if ($interval->d) { $result .= $interval->format("%d day(s) "); }
        if ($interval->h) { $result .= $interval->format("%h hour(s) "); }
        if ($interval->i) { $result .= $interval->format("%i minute(s) "); }
        if ($interval->s) { $result .= $interval->format("%s second(s) "); }
        
        return $result;
    }
}
