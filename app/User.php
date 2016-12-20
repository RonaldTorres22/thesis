<?php

namespace App;
use App\Event;
use DB;
use Auth; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Letter;
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
        $user = Auth::user()->events()->where('notif', '=','3')->orWhere('notif','=','5');

                    
         return $user;
    }
    public function orgs()
    {  
        $orgs = Auth::user()->events()->orderBy('approvedate','desc')->get();
                 
         return $orgs;
    }
    public function disapproved()
    {  
        $orgs = Auth::user()->events()->where('status','=','Disapproved')->orderBy('approvedate','desc')->get();
                 
         return $orgs;
    }
    public function alleventdean()
    {  
        $notifications = Event::where('status','=','pending')->orderBy('approvedate','desc')->get();
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

}
