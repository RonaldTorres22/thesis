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


class DeansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CBApendinglist()
    {
         $user = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'SBA');
        })->orderBy('id','desc')->where('status','=','pending')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "SBADEAN"){
           return view('deans/cbapending', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function CBAeventslist()
    {
        $user = Event::whereHas('user', function($q) {
         $q->where('Department','=', 'SBA');
        })->orderBy('approvedate','desc')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "SBADEAN"){
           return view('deans/cbalist', $data);
        }
        else
        {
            return view('error404');
        }
    }

    public function CNAMSpendinglist()
    {
        $user = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'CNAMS');
        })->orderBy('id','desc')->where('status','=','pending')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "CNAMSDEAN"){
           return view('deans/cnamspending', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function CNAMSeventslist()
    {
        $user = Event::whereHas('user', function($q) {
         $q->where('Department','=', 'CNAMS');
        })->orderBy('approvedate','desc')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "CNAMSDEAN"){
           return view('deans/cnamslist', $data);
        }
        else
        {
            return view('error404');
        }
    }

    public function CASEDpendinglist()
    {
        $user = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'SAS');
        })->orderBy('id','desc')->where('status','=','pending')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "SASDEAN"){
           return view('deans/casedpending', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function CASEDeventslist()
    {
         $user = Event::whereHas('user', function($q) {
         $q->where('Department','=', 'SAS');
        })->orderBy('approvedate','desc')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "SASDEAN"){
           return view('deans/casedlist', $data);
        }
        else
        {
            return view('error404');
        }
    }

    public function SEDpendinglist()
    {
        $user = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'SED');
        })->orderBy('id','desc')->where('status','=','pending')->paginate(10);
        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "SEDDEAN"){
           return view('deans/sedpending', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function SEDeventslist()
    {
         $user = Event::whereHas('user', function($q) {
         $q->where('Department','=', 'SED');
        })->orderBy('approvedate','desc')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "SEDDEAN"){
           return view('deans/sedlist', $data);
        }
        else
        {
            return view('error404');
        }
    }

    public function CEApendinglist()
    {
        $user = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'SEA');
        })->orderBy('id','desc')->where('status','=','pending')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "SEADEAN"){
           return view('deans/ceapending', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function CEAeventslist()
    {
         $user = Event::whereHas('user', function($q) {
         $q->where('Department','=', 'SEA');
        })->orderBy('approvedate','desc')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "SEADEAN"){
           return view('deans/cealist', $data);
        }
        else
        {
            return view('error404');
        }
    }

    public function CHTMpendinglist()
    {
          $user = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'CHTM');
        })->orderBy('id','desc')->where('status','=','pending')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "CHTMDEAN"){
           return view('deans/chtmpending', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function CHTMeventslist()
    {
         $user = Event::whereHas('user', function($q) {
         $q->where('Department','=', 'CHTM');
        })->orderBy('approvedate','desc')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "CHTMDEAN"){
           return view('deans/chtmlist', $data);
        }
        else
        {
            return view('error404');
        }
    }

    public function CCJEFpendinglist()
    {
          $user = Event::whereHas('user', function($q) {
        $q->where('Department','=', 'CCJEF');
        })->orderBy('id','desc')->where('status','=','pending')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "CCJEFDEAN"){
           return view('deans/ccjefpending', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function CCJEFeventslist()
    {
         $user = Event::whereHas('user', function($q) {
         $q->where('Department','=', 'CCJEF');
        })->orderBy('approvedate','desc')->paginate(10);

        $data = [
            'page_title' => 'Events',
            //'events'     => Event::orderBy('start_time')->get(),
            'events'  => $user,
            
          
        ];
        if(Auth::User()->Department == "CCJEFDEAN"){
           return view('deans/ccjeflist', $data);
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
    public function showcba($id)
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
         if(Auth::User()->Department == "SBADEAN" && $event->user->Department == "SBA"){
        return view('deans/cbashow', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function showcnams($id)
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
         if(Auth::User()->Department == "CNAMSDEAN" && $event->user->Department == "CNAMS" ){
        return view('deans/cnamsshow', $data);
        }
        else
        {
           return view('error404');
        }
    }
    public function showcased($id)
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
         if(Auth::User()->Department == "SASDEAN" && $event->user->Department == "SAS" ){
        return view('deans/casedshow', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function showsed($id)
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
         if(Auth::User()->Department == "SEDDEAN" && $event->user->Department == "SED" ){
        return view('deans/sedshow', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function showcea($id)
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
         if(Auth::User()->Department == "SEADEAN" && $event->user->Department == "SEA" ){
        return view('deans/ceashow', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function showchtm($id)
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
         if(Auth::User()->Department == "CHTMDEAN" && $event->user->Department == "CHTM"){
        return view('deans/chtmshow', $data);
        }
        else
        {
           return view('error404');
        }
    }

    public function showccjef($id)
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
         if(Auth::User()->Department == "CCJEFDEAN" && $event->user->Department == "CCJEF" ){
        return view('deans/ccjefshow', $data);
        }
        else
        {
           return view('error404');
        }
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
