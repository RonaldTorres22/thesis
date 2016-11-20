<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use Session;
use App\User;
use Auth;
use DateTime;
use Carbon\Carbon;

class EventController extends Controller
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
       
        $user = Auth::user()->events()->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        
        return view('event/list', $data);
     
    }

    public function pending()
    {

        $user = Auth::user()->events()->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        
        return view('event/pendinglist', $data);
     
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = [
            'page_title' => 'Add new event',
        ];
        
        return view('event/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
        'type_activity' => 'required',
        'title' => 'required',
        'participants' => 'required',
        'activity' => 'required',
        'time'    => 'required'
        ]);

        $current = Carbon::now();
        $time = explode(" - ", $request->input('time'));
        $activity = implode(",\n", $request->get('activity'));

        $event                  = new Event;
        $event->type_activity   = $request->input('type_activity');
        $event->user_id         = Auth::user()->id;
        $event->name            = Auth::user()->name;
        $event->title           = $request->input('title');
        $event->participants    = $request->input('participants');
        $event->venue           = $request->input('venue');
        $event->visitors        = $request->input('visitors');
        $event->vehicles        = $request->input('vehicles');
        $event->no_uniforms     = $request->input('no_uniforms');
        $event->activity        = $activity;
        $event->approvedate     = $this->change_date_format($time[0]);
        // $event->date            = $current->setTimezone('Asia/Singapore')->toDateString();
        $event->date            = $this->date($time[0]);
        $event->start_time      = $this->change_date_format($time[0]);
        $event->end_time        = $this->change_date_format($time[1]);
        $event->save();
        
        $request->session()->flash('success', 'The event was successfully saved!');
        return redirect('events/create');

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
        
        return view('event/view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $event->start_time =  $this->change_date_format_fullcalendar($event->start_time);
        $event->end_time =  $this->change_date_format_fullcalendar($event->end_time);
        
        $data = [
            'page_title'    => 'Edit '.$event->title,
            'event'         => $event,
        ];
        
        return view('event/edit', $data);
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
            $this->validate($request, [
        'type_activity' => 'required',
        'title' => 'required',
        'participants' => 'required',
        'activity' => 'required',
        'time'  => 'required'  
    ]);
        
        $time = explode(" - ", $request->input('time'));
        $activity = implode(", ", $request->get('activity'));

        $event                  = Event::findOrFail($id);
        $event->type_activity   = $request->input('type_activity');
        $event->title           = $request->input('title');
        $event->participants    = $request->input('participants');
        $event->venue           = $request->input('venue');
        $event->visitors        = $request->input('visitors');
        $event->vehicles        = $request->input('vehicles');
        $event->no_uniforms     = $request->input('no_uniforms');
        $event->activity        = $activity;
        $event->approvedate     = $this->change_date_format($time[0]);
        $event->date            = $this->date($time[0]);
        $event->start_time      = $this->change_date_format($time[0]);
        $event->end_time        = $this->change_date_format($time[1]);
        $event->save();
        
        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $event = Event::find($id);
        $event->delete();

         $request->session()->flash('success', 'The event was successfully Deleted!');
         return back();
    }
    
    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $time->format('Y-m-d H:i:s');
    }
    
     public function date($date)
    {
        $time = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $time->format('Y-m-d');
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