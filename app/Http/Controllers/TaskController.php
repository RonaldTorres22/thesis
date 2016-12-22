<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\Task;
use Auth;
use Session;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->events()->paginate(10);
        return view('tasks/list')->with('task', $user);
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

    public function movetask(Request $request, $id)
    {

        $event = Task::findOrFail($id);
        $event->position         = 1;   
        $event->save();

        $todoid = $event->id; 


        
    }

    public function donetask(Request $request, $id)
    {
        $event = Task::findOrFail($id);
        $event->position         = 2;   
        $event->save();

        $todoid = $event->id; 

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
        $task = Event::find($id);
        $task = new Task;
        $task->event_id = $event_id;
        $task->to_who   = $request->input('to_who');
        $task->task   = $request->input('task');
        $task->save();

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
        $task = Event::find($id)->task()->orderBy('id','desc')->where('position','=',0)->get();
        $ongoing = Event::find($id)->task()->orderBy('id','desc')->where('position','=',1)->get();
        $done = Event::find($id)->task()->orderBy('id','desc')->where('position','=',2)->get();
        $data = [
            'page_title'    => $event->title,
            'event'         => $event,
            'task'         => $task,
            'ongoing'      =>$ongoing,
            'done'         => $done

        ];

        return view('tasks/index', $data);

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
        $task = Task::find($id);
        $task->delete();
             return back();
    }
}
