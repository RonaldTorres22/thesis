<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Participant;
use App\Http\Requests;
use Auth;
use Session;
use App\User;

class EventRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $event_id = Event::find($id)->id;
        $register = Event::find($id);
        $register = new Participant;
        $register->event_id = $event_id;
        $register->name   = $request->input('name');
        $register->email   = $request->input('email');
        $register->contact   = $request->input('contact');
        $register->organization   = $request->input('organization');
        $register->save();
        $request->session()->flash('success', 'Registration Successful!');
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
        $data = [
            'page_title'    => $event->title,
            'event'         => $event

        ];
        return view('registeronline/register', $data);
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
