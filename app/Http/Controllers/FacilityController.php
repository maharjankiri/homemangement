<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extra;
use App\Tenant;
use Illuminate\Support\Facades\DB;

class FacilityController extends Controller
{
    public function create(Extra $extra)
    {
     return view('pages.add_facility')->with('extra',$extra);
    }
    public function store(Request $request,$ex=null)
    {
      $this->validate($request, [
        'name' => "required|unique:extras,title,$ex|max:100",
        'price' => 'required|integer',
    ]);
       if(isset($ex))
     {
   
     $extra = Extra::find($ex);
     }
     else
     {

      $extra=new Extra();
     }
      $extra->title=$request->name;
      $extra->price=$request->price;
      if($extra->save())
      {
      	return redirect()->action('FacilityController@show');
      }
    }
    public function show()
      {
        $extras = Extra::all();
        return view('pages.view_facility',['extras'=>$extras]);                                                               
      }
    public function assign_tenant(Extra $extra)
    {
      $i=0;
     foreach($extra->tenants()->get() as $a)
      {
        $b[$i++]=$a->id;
      }
      if(empty($b))
      {
        $b[0]=0;
      }
      return view('pages.assign_tenant_ex')->with('extra',$extra)->with('b',$b);                                                               
    }
    public function tenant_entry(Request $request,Extra $extra)
    {
    
      $extra->tenants()->attach($request->tenant);
      return redirect()->action('FacilityController@show');                                                              
    }
   public function deallocate_tenant(Tenant $tenant,Extra $extra)
   {
      $extra->tenants()->detach($tenant->id);
     return redirect()->action('FacilityController@show'); 
   }
   public function del_facility(Extra $extra)
   {
      if($extra->delete())
     {
      return redirect()->action('FacilityController@show');
     } 
   }

}

