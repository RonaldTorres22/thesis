<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
	    protected $fillable=
    [
        'to_do',
     
  ];

      public function user()
  {
    return $this->belongsTo('App\Event');
  }
}
