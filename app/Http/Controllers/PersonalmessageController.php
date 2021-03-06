<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personalmessage;
use App\Event;
use App\Http\Requests;
use Auth;
use App\User;
use App\Inbox;

class PersonalmessageController extends Controller
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
        $name = Auth::user()->name;
        $orgs = User::where('role','=','user')->where('name','!=',$name)->get();
        $admin = User::where('role','=','admin')->where('name','!=',$name)->get();
        $subacc = User::where('acc_id','=',$name)->where('name','!=',$name)->get();
        $message = Personalmessage::where('sender','=',$name)->orderBy('id','desc')->paginate(10);
        return view('messages/index')->with('orgs', $orgs)->with('message',$message)->with('admin',$admin)->with('subacc', $subacc);
    }

    public function inbox()
    {
        $name = Auth::user()->name;
        $message = Inbox::where('send_to','=',$name)->orderBy('id','desc')->paginate(10);
        return view('messages/inbox')->with('message',$message);
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
        $personalmessage = new Personalmessage;
        $personalmessage->sender    = Auth::user()->name;
        $personalmessage->send_to   = $request->input('send_to');
        $personalmessage->message   = $request->input('message');

        $Inbox = new Inbox;
        $Inbox->sender    = Auth::user()->name;
        $Inbox->send_to   = $request->input('send_to');
        $Inbox->message   = $request->input('message');

        $personalmessage->save();
        $Inbox->save();

         $request->session()->flash('success', 'The message was successfully sent!');
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
        $pm = Personalmessage::findOrFail($id);

        $data = [
            'pm'            => $pm
        ];

          if(Auth::user()->name == $pm->sender)
        {
         return view('messages/view', $data);
        }
        else
        {
        return view('error404');
        }
    }

    public function inboxview($id)
    {
        $pm = Inbox::findOrFail($id);

        $data = [
            'pm'            => $pm
        ];

        if(Auth::user()->name == $pm->send_to)
        {
         return view('messages/inboxview', $data);
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
    public function destroy(Request $request, $id)
    {
        $Personalmessage = Personalmessage::find($id);
        $Personalmessage->delete();
        $inbox = Inbox::find($id);
        $inbox->delete();     
        $request->session()->flash('success', 'The message was successfully Deleted!');
        return back();
    }

    public function destroyInbox(Request $request, $id)
    {
        $Personalmessage = Inbox::find($id);
        $Personalmessage->delete();   
        $request->session()->flash('success', 'The message was successfully Deleted!');
        return back();
    }

    public function selectall(Request $request)
    {
        Personalmessage::destroy($request->message);
        Inbox::destroy($request->message);
        $request->session()->flash('success', 'The message was successfully Deleted!');
        return back();
    }

    public function selectinbox(Request $request)
    {
        Inbox::destroy($request->message);
        $request->session()->flash('success', 'The message was successfully Deleted!');
        return back();
    }
}
