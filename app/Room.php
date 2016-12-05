<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    } 
}
