<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use App\User;
use App\Todolist;
use App\Letter;
use App\Event;
use App\Subaccount;
use Session;
use Auth;
use Hash;
use DateTime;
use App\Http\Requests;
use Carbon\Carbon;

class SubAccountController extends Controller
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
    
    public function allevent(){

        $auth = Auth::user()->acc_id;
        $user = Event::orderBy('approvedate', 'desc')->where('name','=',$auth)->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

        if(!empty(Auth::user()->acc_id))
        {
        return view('subaccview/allevent', $data);
          }
        else
        {
        return view('error404');  
        }

    }

    public function index(){
    
     $users = User::where('acc_id', '=', Auth::user()->name)->orderBy('id','desc')->paginate(10);

      if(empty(Auth::user()->acc_id))
      {
        return view('subaccounts/index')->with('Subacc',$users);
      }
      else
      {
        return view('error404');
      }
    }

    public function approve()
    {
        $auth = Auth::user()->acc_id;
        $user = Event::orderBy('approvedate', 'desc')->where('name','=',$auth)->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];

        if(!empty(Auth::user()->acc_id))
        {
        return view('subaccview/list', $data);
          }
        else
        {
        return view('error404');  
        }

    }

    public function pending()
    {
        $auth = Auth::user()->acc_id;
        $user = Event::orderBy('id', 'desc')->where('name','=',$auth)->where('status','=','pending')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        
        if(!empty(Auth::user()->acc_id))
        {
        return view('subaccview/pendinglist', $data);
        }
        else
        {
        return view('error404');  
        }
     
    }

    public function disapproved()
    {
        $auth = Auth::user()->acc_id;
        $user = Event::where('name','=',$auth)->where('status','=','Disapproved')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(!empty(Auth::user()->acc_id))
        {  
        return view('subaccview/disapprovedlist', $data);
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
        return view('subaccview/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PasswordRequest $request)
    {

        $Subaccount                  = new User;
        $Subaccount->name            = Auth::user()->name.'_'.$request->input('name');
        $Subaccount->Department      = Auth::user()->Department;
        $Subaccount->acc_id          = Auth::user()->name;
        $Subaccount->email           = $request->input('email');
        $Subaccount->password        = Hash::make($request->password); 
        $Subaccount->save(); 
        Session::flash('success', ' Account successfully created!');

        return redirect()->route('accounts.index');
    }

    public function createevent(Request $request)
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
        $event->name            = Auth::user()->acc_id;
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

       return redirect()->route('subacc.pending');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    public function editevent($id){


        $event = Event::findOrFail($id);

        $event->start_time =  $this->change_date_format_fullcalendar($event->start_time);
        $event->end_time =  $this->change_date_format_fullcalendar($event->end_time);
        
        $data = [
            'page_title'    => 'Edit '.$event->title,
            'event'         => $event,
        ];
        
        return view('subaccview/edit', $data);
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
        $user = User::find($id);
        $user->delete();
        Session::flash('success','The Account was successfully deleted.');
        return redirect()->route('accounts.index');
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
