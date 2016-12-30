<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    
   public function eventlogistic()
  {
    return $this->belongsTo('App\Event','event_id','id');
  }
}
