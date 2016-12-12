<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
   protected $fillable=
    [
        'letter',
     
  ];

  public function eventletter()
  {
    return $this->belongsTo('App\Event','event_id','id');
  }
}
