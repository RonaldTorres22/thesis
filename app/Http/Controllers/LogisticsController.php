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
use App\Equip;

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

        $cflag = Equip::findOrFail(1)->CollegeFlag;
        $Rostrum = Equip::findOrFail(1)->Rostrum;
        $WoodenPanel = Equip::findOrFail(1)->WoodenPanel;
        $DecorativePlants = Equip::findOrFail(1)->DecorativePlants;
        $SchoolFlag = Equip::findOrFail(1)->SchoolFlag;
        $MonoblockChairs = Equip::findOrFail(1)->MonoblockChairs;
        $StandingBoards = Equip::findOrFail(1)->StandingBoards;
        $PhilippineFlag = Equip::findOrFail(1)->PhilippineFlag;
        $Platform = Equip::findOrFail(1)->Platform;
        $WhitePanel = Equip::findOrFail(1)->WhitePanel;
        $WoodenChairs = Equip::findOrFail(1)->WoodenChairs;
        $SoundsSystem = Equip::findOrFail(1)->SoundsSystem;
        $Projector = Equip::findOrFail(1)->Projector;
        $ExtensionCord = Equip::findOrFail(1)->ExtensionCord;
        $ProjectorScreen = Equip::findOrFail(1)->ProjectorScreen;
        $Microphone = Equip::findOrFail(1)->Microphone;
        $DvdPlayer = Equip::findOrFail(1)->DvdPlayer;
        $WirelessMic = Equip::findOrFail(1)->WirelessMic;
        $MicStand = Equip::findOrFail(1)->MicStand;

        $sumflag = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->where('status','=','approved')->sum('CollegeFlag');
        $sumrostrum = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('Rostrum');
        $sumwoodenpanel = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('WoodenPanel');
        $sumdecorativeplants = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('DecorativePlants');
        $sumschoolflag = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('SchoolFlag');
        $summonoblockchairs = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('MonoblockChairs');
        $sumstandingboards = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('StandingBoards');
        $sumphilippineflag = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('PhilippineFlag');
        $sumplatform = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('Platform');
        $sumwhitepanel = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('WhitePanel');
        $sumwoodenchairs = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('WoodenChairs');
        $sumsoundssystem = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('SoundsSystem');
        $sumprojector = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('Projector');
        $sumexcord= Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('ExtensionCord');
        $sumprojscreen = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('ProjectorScreen');
        $summic= Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('Microphone');
        $sumdvdplayer= Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('DvdPlayer');
        $sumwiremic= Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('WirelessMic');
        $summicstand = Logistic::where('approvedate','=', $event->date)->where('status','=','approved')->sum('MicStand');

        $cflag = $cflag - $sumflag;
        $rost = $Rostrum - $sumrostrum;
        $woodpanel = $WoodenPanel - $sumwoodenpanel;
        $decplants = $DecorativePlants - $sumdecorativeplants;
        $sflag = $SchoolFlag - $sumschoolflag;
        $monochairs = $MonoblockChairs - $summonoblockchairs;
        $standboards = $StandingBoards - $sumstandingboards;
        $pflag = $PhilippineFlag - $sumphilippineflag;
        $platform = $Platform - $sumplatform;
        $wpanel = $WhitePanel - $sumwhitepanel;
        $wchairs = $WoodenChairs - $sumwoodenchairs;
        $ssystem = $SoundsSystem - $sumsoundssystem;

        $projector = $Projector - $sumprojector; 
        $excords = $ExtensionCord - $sumexcord; 
        $screen = $ProjectorScreen - $sumprojscreen;
        $mic = $Microphone - $summic; 
        $player = $DvdPlayer - $sumdvdplayer; 
        $wimic = $WirelessMic - $sumwiremic;
        $micstand = $MicStand - $summicstand;

        $data = [
            'page_title'    => $event->title,
            'event'         => $event,
            'cflag'         => $cflag,
            'rost'         => $rost,
            'wpannel'         => $woodpanel,
            'plants'         => $decplants,
            'mchairs'         => $monochairs,
            'sbaords'         => $standboards,
            'pflag'         => $pflag,
            'platform'         => $platform,
            'wpanel'         => $wpanel,
            'wchairs'         => $wchairs,
            'ssystem'         => $ssystem,
            'sflag'         => $sflag,
            'projector'   => $projector,
            'excord' => $excords,
            'screen' => $screen,
            'mic' => $mic,
            'player' => $player,
            'wimic' => $wimic,
            'micstand' => $micstand

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
        $eventdate = Event::find($id)->date;
        $logistic = Event::find($id);
        $logistic = new Logistic;
        $logistic->event_id             = $event_id;
        $logistic->by                   = Auth::user()->name;
        $logistic->approvedate          = $eventdate;
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
    public function approverequest(Request $request, $id)
    {
        $event = Logistic::findOrFail($id);
        $event->status         = "Approved";     
        $event->save();
        
        $request->session()->flash('success', 'The equipmets was successfully approved!');
        
        return back();

    }
    public function equipments()
    {
        $log = Equip::count();
        $quipment = Equip::all();
        return view('equipments/index')->with('equip',$log)->with('equipment',$quipment);
    }
    public function equipmentsstore(Request $request)
    {
         $logistic = new Equip;
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
        return back();
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
