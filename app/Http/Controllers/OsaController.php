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

class OsaController extends Controller
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
        $user =  Event::where('status', '=' ,'dean')->get();
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "OSA"){
           return view('osa/eventlist', $data);
        }
        else
        {
            return view('error404');
        }

    }
    public function approvelist()
    
    {
        $user =  Event::where('status', '=' ,'approved')->get();
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "OSA"){
           return view('osa/approvedlist', $data);
        }
        else
        {
          return view('error404');
        }

    }

        public function approveEvent(Request $request, $id)
    {

        

        $event = Event::findOrFail($id);
        $event->start_time = $event->start_time;
        $event->status         = "approved";
        $event->notif2          = 2; 
        $event->save();
        
        $request->session()->flash('success', 'The event was successfully approved!');
        
        return back();

    }

    public function disapproveEvent(Request $request, $id)
    { 

        $event_id = Event::find($id)->id;
        $message = Event::find($id);
        $message = new Message;
        $message->event_id = $event_id;
        $message->disapprove_by = Auth::user()->Department;
        $message->message   = $request->input('message');
       
        $event = Event::findOrFail($id);      
        $event->start_time = $event->start_time;
        $event->status         = "Disapproved";
        $event->notif          = 3;      
        $event->save();
        $message->save();
        $request->session()->flash('success', 'The event was successfully disapproved!');
        
        return back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



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
        $first_date = new DateTime($event->start_time);
        $second_date = new DateTime($event->end_time);
        $difference = $first_date->diff($second_date);
        $data = [
            'page_title'    => $event->title,
            'event'         => $event,
            'duration'      => $this->format_interval($difference)
        ];
        
        return view('osa/view', $data);

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
        $event = Event::find($id);
        $event->delete();
        
        return redirect('events');
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