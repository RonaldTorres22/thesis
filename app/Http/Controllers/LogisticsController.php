<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\Task;
use App\Logistic;
use Auth;
use Session;
use App\User;

class LogisticsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $event = Event::findOrFail($id);
        $data = [
            'page_title'    => $event->title,
            'event'         => $event

        ];
        if(Auth::user()->name == $event->name || Auth::user()->acc_id == $event->name)
        {
                    
                if($event->type_activity == "Indoor")
                {
                return view('logistics/create', $data);
                }
                else{
                    return view('error404');
                }
        }
        else{
            return view('error404');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $event_id = Event::find($id)->id;
        $logistic = Event::find($id);
        $logistic = new Logistic;
        $logistic->event_id             = $event_id;
        $logistic->by                   = Auth::user()->name;
        $logistic->CollegeFlag          = $request->input('CollegeFlag');
        $logistic->Rostrum              = $request->input('Rostrum');
        $logistic->WoodenPanel          = $request->input('WoodenPanel');
        $logistic->DecorativePlants     = $request->input('DecorativePlants');
        $logistic->SchoolFlag           = $request->input('SchoolFlag');
        $logistic->MonoblockChairs      = $request->input('MonoblockChairs');
        $logistic->StandingBoards       = $request->input('StandingBoards');
        $logistic->PhilippineFlag       = $request->input('PhilippineFlag');
        $logistic->Platform             = $request->input('Platform');
        $logistic->WhitePanel           = $request->input('WhitePanel');
        $logistic->WoodenChairs         = $request->input('WoodenChairs');
        $logistic->SoundsSystem         = $request->input('SoundsSystem');
        $logistic->Projector            = $request->input('Projector');
        $logistic->ExtensionCord        = $request->input('ExtensionCord');
        $logistic->ProjectorScreen      = $request->input('ProjectorScreen');
        $logistic->Microphone           = $request->input('Microphone');
        $logistic->DvdPlayer            = $request->input('DvdPlayer');
        $logistic->WirelessMic          = $request->input('WirelessMic');
        $logistic->MicStand             = $request->input('MicStand');
        $logistic->others               = $request->input('others');
        $logistic->othersName           = $request->input('othersName');
        $logistic->save();
        $request->session()->flash('success', 'The logistics was successfully saved!');
        
        return redirect()->route('event.view',$event_id);
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

    public function viewlogistic($id)
    {
        $event = Event::findOrFail($id);
        $logistic = Event::find($id)->logistic;
        $data = [
            'page_title'    => $event->title,
            'logistic'      => $logistic
        ];

        return view('logistics/view', $data);
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
}
