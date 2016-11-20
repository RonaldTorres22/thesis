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
        'participants',
        'activity'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

    // protected $table = "events";

    // public function organization(){
    // 	return $this->belongsTo('App\User', 'id');
    // }
}
