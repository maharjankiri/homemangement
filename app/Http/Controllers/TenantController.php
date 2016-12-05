<?php

namespace App\Http\Controllers;
use App\Tenant;
use App\Room;
use App\Extra;
use  App\Http\Requests\TenantRequest;
use Illuminate\Http\Request;


class TenantController extends Controller
{
    public function create(Tenant $tenant)
    {
    	return view('pages.entry_tenant')->with('tenant',$tenant);
    }

    public function store(TenantRequest $request,$t=null)
    {
      //return 'successful'.$request->name.$request->phone;
      if(isset($t))
      {
        $tenant=Tenant::find($t); 
      }
    	else
      {
        $tenant=new Tenant();
      }
    	$tenant->name=$request->name;
    	$tenant->phone=$request->phone;
    	if($tenant->save())                           
      {
      
      	return redirect()->action('TenantController@show');
      }
      else
      {
         return view('pages.entry_tenant')->with('msg','failed');
      }
      

    }
    public function show()
    {
      $tenannts=tenant::all();
       	
    return view('pages.view_tenants')->with('tenants',$tenannts);
    
      }
    public function deallocate_Room(Room $room)
   {
     $room->tenant_id=null;  
     if($room->save())
     {
      return redirect()->action('TenantController@show');
     }
                                                           
   }
    public function assign_room(Tenant $tenant)
   {
      return view('pages.assign_room',['tenant'=>$tenant]);                                                       
   }

   public function roomentry(Tenant $tenant,Request $request)
   {

     $room=Room::find($request->name);
     $room->tenant_id=$tenant->id;
     if($room->save())
     {
      return redirect()->action('TenantController@show');
     }
     

   }
    public function assign_facility(Tenant $tenant)
   {
     $i=0;
     foreach($tenant->extras()->get() as $a)
      {
        $b[$i++]=$a->id;
      }
      if(empty($b))
      {
        $b[0]=0;
      }
      return view('pages.assign_facility')->with('tenant',$tenant)->with('b',$b);                                                       
   }
   public function facility_entry(Request $request,Tenant $tenant)
    {
    
      $tenant->extras()->attach($request->extra);
      return redirect()->action('TenantController@show');                                                              
    }
    public function deallocate_facility(Tenant $tenant,Extra $extra)
   {
      $extra->tenants()->detach($tenant->id);
     return redirect()->action('TenantController@show'); 
   }
   public function del_tenant(Tenant $tenant)
   {
     if($tenant->delete())
     {
      return redirect()->action('TenantController@show');
     }
     

   }


}
