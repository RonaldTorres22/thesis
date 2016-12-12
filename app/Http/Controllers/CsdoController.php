<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Event;
use DateTime;
use Carbon\Carbon;

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
