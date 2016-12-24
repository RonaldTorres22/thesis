<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events'; // you may change this to your name table
    public $timestamps = false; // set true if you are using created_at and updated_at
    protected $primaryKey = 'id';

    protected $fillable=
    [
        'type_activity',
        'name',
        'title',
        'venue',
        'participants'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function todolist()
  {
    return $this->hasMany('\App\Todolist', 'event_id');
  }

 public function letter()
  {
   return $this->hasOne('App\Letter', 'event_id');
  }

  public function message()
  {
   return $this->hasOne('App\Message', 'event_id');
  }

  public function task()
  {
   return $this->hasMany('App\Task', 'event_id');
  }

    // protected $table = "events";

    // public function organization(){
    // 	return $this->belongsTo('App\User', 'id');
    // }
}
