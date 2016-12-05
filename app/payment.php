<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    } 
}
