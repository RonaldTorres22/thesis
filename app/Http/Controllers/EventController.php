<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Todolist;
use App\Event;
use Session;
use App\User;
use Auth;
use App\Letter;
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

    public function allevent()
    {
        $auth = Auth::user()->name;
        $user = Event::orderBy('approvedate', 'desc')->where('name','=',$auth)->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

        if(empty(Auth::user()->acc_id))
        {
        return view('event/allevent', $data);
        }
        else
        {
        return view('error404');  
        }
    }

    public function index()
    {
       
        $auth = Auth::user()->name;
        $user = Event::orderBy('approvedate', 'desc')->where('name','=',$auth)->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

        if(empty(Auth::user()->acc_id))
        {
        return view('event/list', $data);
        }
        else
        {
        return view('error404');  
        }

    }

    public function pending()
    {

        $auth = Auth::user()->name;
        $user = Event::orderBy('id','desc')->where('name','=',$auth)->where('status','=','pending')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

        if(empty(Auth::user()->acc_id))
        {
        return view('event/pendinglist', $data);
        }
        else
        {
        return view('error404');  
        }

     
    }

    public function disapproved()
    {
        $auth = Auth::user()->name;
        $user = Event::orderBy('approvedate','desc')->where('name','=',$auth)->where('status','=','Disapproved')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

         if(empty(Auth::user()->acc_id))
        {
        return view('event/disapprovedlist', $data);
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
        
        $data = [
            'page_title' => 'Add new event',
        ];
        if(empty(Auth::user()->acc_id))
        {
        return view('event/create', $data);
         }
        else
        {
        return view('error404');  
        }
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
        'time'    => 'required'
        ]);

        $current = Carbon::now();
        $time = explode(" - ", $request->input('time'));
        $visit = implode(",", $request->input('visitors'));
        $car = implode(",", $request->input('vehicles'));
        $uni = implode(",", $request->input('no_uniforms'));
    

        $event                  = new Event;
        $event->type_activity   = $request->input('type_activity');
        $event->user_id         = Auth::user()->id;
        $event->name            = Auth::user()->name;
        $event->title           = $request->input('title');
        $event->participants    = $request->input('participants');
        $event->venue           = $request->input('venue');
        $event->visitors        = $visit;
        $event->vehicles        = $car;
        $event->no_uniforms     = $uni;
        $event->gym             = $request->get('gym');
        $event->sales           = $request->get('sales');
        $event->film            = $request->get('film');
        $event->registration    = $request->get('registration');
        $event->approvedate     = $this->change_date_format($time[0]);
        // $event->date            = $current->setTimezone('Asia/Singapore')->toDateString();
        $event->date            = $this->date($time[0]);
        $event->start_time      = $this->change_date_format($time[0]);
        $event->end_time        = $this->change_date_format($time[1]);
        $event->save();
        
        $request->session()->flash('success', 'The event was successfully saved!');
        return redirect()->route('pending.events');

    }

    public function Addtodo(Request $request, $id)
    {


        //         $user = User::find($id);
        // $this->validate($request, ['profile_name' => 'required|max:255']);
        // $user->name = $request->profile_name;
        // $user->update();



        $event_id = Event::find($id)->id;
        $todo = Event::find($id);
        $this->validate($request, ['to_do' => 'required|max:255']);
        $todo = new Todolist;
    
        $todo->event_id = $event_id;
        $todo->to_do   = $request->input('to_do');
        $todo->save();
        $todoid = $todo->id; 

        return response($todoid);

        // return response()->json(['to_do' => $todo->to_do], 200);



        // return back();
    }



    public function deletetodo(Request $request, $id)
    {
        $todo = Todolist::find($id);
        //           $response = array(
        //     'status' => 'success',
        //     'msg' => 'zzzz.',
        // );
        // 
        // return back();
        
        $todo->delete();
   

     }


    public function sendletter(Request $request, $id)
    {
        $event_id = Event::find($id)->id;
        $letter = Event::find($id);
        $letter = new Letter;
        $letter->event_id = $event_id;
        $letter->letter   = $request->input('letter');
       
         $letter->save();

         $request->session()->flash('success', 'The letter was successfully sent!');
        return back();
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
        $todo = Event::find($id)->todolist;
        $message = Event::find($id)->message;
        $letter = Event::find($id)->letter()->get();
        $logistic = Event::find($id)->logistic()->get();
        $lettershow = Event::find($id)->letter;
        $first_date = new DateTime($event->start_time);
        $second_date = new DateTime($event->end_time);
        $difference = $first_date->diff($second_date);
        $data = [
            'page_title'    => $event->title,
            'event'         => $event,
            'todos'         => $todo,
            'letter'        => $letter,
            'Letter'        => $lettershow,
            'message'       => $message,
            'logistic'      => $logistic,
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
        'time'  => 'required'  
    ]);
        
        $time = explode(" - ", $request->input('time'));
        $visit = implode(",", $request->input('visitors'));
        $car = implode(",", $request->input('vehicles'));
        $uni = implode(",", $request->input('no_uniforms'));
  

        $event                  = Event::findOrFail($id);
        $event->type_activity   = $request->input('type_activity');
        $event->title           = $request->input('title');
        $event->participants    = $request->input('participants');
        $event->venue           = $request->input('venue');
        $event->visitors        = $visit;
        $event->vehicles        = $car;
        $event->no_uniforms     = $uni;
        $event->gym             = $request->get('gym');
        $event->sales           = $request->get('sales');
        $event->film            = $request->get('film');
        $event->registration    = $request->get('registration');
        $event->approvedate     = $this->change_date_format($time[0]);
        $event->date            = $this->date($time[0]);
        $event->start_time      = $this->change_date_format($time[0]);
        $event->end_time        = $this->change_date_format($time[1]);
        $event->save();
        
        if(empty(Auth::user()->acc_id))
        {      
        $request->session()->flash('success', 'The event was successfully updated!');
        return redirect()->route('pending.events');
        }
        else
        {
        $request->session()->flash('success', 'The event was successfully updated!');
        return redirect()->route('subacc.pending');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function cancelevent(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->start_time = $event->start_time;
        $event->status         = "canceled";     
        $event->save();
        
        $request->session()->flash('success', 'The event was successfully canceled!');
        
        return back();
    }

    public function destroy(Request $request, $id)
    {
        $event = Event::find($id);
        // $event_id = $eventtodo->event_id;
        // $event_id = Todolist::find($event_id);
        $event->delete();       
        $request->session()->flash('success', 'The event was successfully Deleted!');
        if(empty(Auth::user()->acc_id))
        {
         return redirect()->route('pending.events');
        }
        else{
            return redirect()->route('subacc.pending');
        }
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