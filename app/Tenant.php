<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
  public function rooms()
    {
        return $this->hasMany('App\Room');
    } 
    public function extras()
    {
        return $this->belongsToMany('App\Extra')->withTimestamps();
    }
     public function payments()
    {
        return $this->hasMany('App\Payment');
    }     
}
