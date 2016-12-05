<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
	public function tenants()
	{
		return $this->belongsToMany('App\Tenant')->withTimestamps();
	}
	
   
}
