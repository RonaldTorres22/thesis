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
        $auth = Auth::user()->name;
        $user = Event::where('name','=',$auth)->orderBy('approvedate','desc')->paginate(10);

        if(empty(Auth::user()->acc_id))
        {
        return view('tasks/list')->with('task', $user);
        }
        else{
        return view('error404');
        }
    }

    public function subaccindex()
    {
        $auth = Auth::user()->acc_id;
        $user = Event::where('name','=',$auth)->orderBy('approvedate','desc')->paginate(10);
        if(!empty(Auth::user()->acc_id))
        {
        return view('tasks/list')->with('task', $user);
        }
        else{
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

    public function backlog(Request $request, $id)
    {
        $event = Task::findOrFail($id);
        $event->position         = 0;   
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
        $task = Event::find($id)->task()->orderBy('updated_at','desc')->where('position','=',0)->get();
        $ongoing = Event::find($id)->task()->orderBy('updated_at','desc')->where('position','=',1)->get();
        $done = Event::find($id)->task()->orderBy('updated_at','desc')->where('position','=',2)->get();
        $data = [
            'page_title'    => $event->title,
            'event'         => $event,
            'task'         => $task,
            'ongoing'      =>$ongoing,
            'done'         => $done

        ];

        if(Auth::user()->name == $event->name || Auth::user()->acc_id == $event->name)
        {
        return view('tasks/index', $data);
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
        $task = Task::find($id);
        $task->delete();
             return back();
    }
}
