<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    

   public function eventtask()
  {
    return $this->belongsTo('App\Event','event_id','id');
  }

}
