<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Event;
use Session;
use App\User;
use Auth;
use App\Letter;
use App\Http\Requests;

class VpaaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function __construct()
    {

        $this->middleware('auth');
    }  
    
    public function index()
    {
        $user =  Letter::Where('status','=','pending')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "VPAA"){
           return view('vpaa/letters', $data);
        }
        else
        {
            return view('error404');
        }
    }

    public function approvedlist()
    {
        $user =  Letter::Where('status','=','approved')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "VPAA"){
           return view('vpaa/approvelist', $data);
        }
        else
        {
            return view('error404');
        }
    }

    public function disapprovedlist()
    {
        $user =  Letter::Where('status','=','disapproved')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "VPAA"){
           return view('vpaa/disapprovelist', $data);
        }
        else
        {
            return view('error404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $letter = Event::find($id)->letter;
        $first_date = new DateTime($event->start_time);
        $second_date = new DateTime($event->end_time);
        $difference = $first_date->diff($second_date);
        $data = [
            'page_title'    => $event->title,
            'event'         => $event,
            'letter'        => $letter,
            'duration'      => $this->format_interval($difference)
        ];
         if(Auth::User()->Department == "VPAA"){
        return view('vpaa/view', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function approveletter(Request $request, $id)
    {
        $letter = Letter::findOrFail($id);
        $letter->status         = "approved";
        // $letter->notif          = 2;      
        $letter->save();
        
        $request->session()->flash('success', 'The letter was successfully approved!');
        
        return back();

    }

    public function disapproveletter(Request $request, $id)
    {
        $letter = Letter::findOrFail($id);
        $letter->status         = "disapproved";
        // $letter->notif          = 2;      
        $letter->save();
        
        $request->session()->flash('success', 'The letter was successfully disapproved!');
        
        return back();

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
