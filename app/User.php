<?php

namespace App;
use App\Event;
use DB;
use Auth; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Letter;
use App\User;
use App\Task;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'department',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function events()
    {
        return $this->hasMany('\App\Event', 'user_id');
    }


    public function dean()
    {  
        $notifications = Event::where('notif','=','0');
  
                    
                    
         return $notifications;
    }

    public function osa()
    {  
        $notifications = Event::where('notif','=','2');

                    
         return $notifications;
    }

    public function vpaa()
    {  
        $notifications = Letter::where('notif','=','0');

                    
         return $notifications;
    }

    public function orgNotif()
    {  
        $user = Auth::user()->events()->where('notif', '=','3');

                    
         return $user;
    }

    public function tasknotif()
    {  
        $user = Auth::user()->name;
        $task = Task::where('to_who','=',$user)->where('notif', '=','0');

                    
         return $task;
    }

    public function tasknotifmain()
    {  
        $user = Auth::user()->name;
        $task = Task::where('organization','=',$user)->where('position', '=','2')->where('notif','=','2');

                    
         return $task;
    }


    public function orgs()
    {  
        $orgs = Auth::user()->events()->orderBy('approvedate','desc')->get();
                 
         return $orgs;
    }
    // public function disapproved()
    // {  
    //     $orgs = Auth::user()->events()->where('status','=','Disapproved')->orderBy('approvedate','desc')->get();
                 
    //      return $orgs;
    // }
    public function alleventdean()
    {  
        $notifications = Event::where('status','=','pending')->orderBy('id','desc')->get();
         return $notifications;
    }
    public function alleventosa()
    {  
        $notifications = Event::where('status','=','dean')->orderBy('approvedate','desc')->get();
         return $notifications;
    }
    public function alleventvpaa()
    {  
        $notifications = Letter::where('status','=','pending')->orderBy('id','desc')->get();
         return $notifications;
    }


    // tasks

    public function alltask()
    {   
        $user = Auth::user()->name;
        $notifications = Task::where('to_who','=',$user)->where('position','=', '0')->orderBy('id','desc')->get();
         return $notifications;
    }

    public function alltaskmain()
    {   
        $user = Auth::user()->name;
        $notifications = Task::where('organization','=',$user)->where('position','=', '2')->orderBy('updated_at','desc')->get();
         return $notifications;
    }

}
