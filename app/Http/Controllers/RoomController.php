<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Requests\RoomEntryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
class RoomController extends Controller
{
   public function create(Room $room)
   {
   	return view('pages.entry_room',['room'=>$room]);
   }

   public function store(RoomEntryRequest $request,$r=null)
   {
     if(isset($r))
     {
     $room = Room::find($r);
     }
     else
     {
      $room=new Room();
     }
    $room->room_name=$request->name;
    $room->price=$request->price;
      if($room->save())                           
      {
      
      	return redirect()->action('RoomController@show');
      }
      else
      {
         return view('pages.entry_room')->with('msg','failed');
      }
     
   }

   public function show()
   {
        $rooms = Room::all();
    
    return view('pages.view_room',['rooms'=>$rooms]);                                                               
   }

   public function assign_tenant(Room $room)
   {
    return view('pages.assign_tenant',['room'=>$room]);                                                               
   }

   public function tenantentry(Room $room,Request $request)
   {
     $room->tenant_id=$request->tenant;  
     if($room->save())
     {
      return redirect()->action('RoomController@show');
     }
                                                           
   }
   public function deallocate_tenant(Room $room)
   {
     $room->tenant_id=null;  
     if($room->save())
     {
      return redirect()->action('RoomController@show');
     }
                                                           
   }
    public function del_room( Room $room)
   {
    
     if($room->delete())
     {
      return redirect()->action('RoomController@show');
     }
                                                        
   }

}
