<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
     public function eventregistration()
  {
    return $this->belongsTo('App\Event','event_id','id');
  }
}
