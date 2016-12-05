@extends('layouts.masterpage')
@section('title')
rooms
@endsection
@section('content')


<div style="float:right; margin-bottom:5px;"><a href="/c_room"><button class="btn btn-success" type="button">add more rooms</button></a></div>
<table class="table table-bordered table-striped">
<tr><th>Room</th><th>Price</th><th>tenant</th><th>action</th></tr>
  @foreach ($rooms as $room)

  <tr><td>{{ $room->room_name }}</td><td>{{ $room->price }} <td>
	
@if(isset($room->tenant))
 <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $room->tenant->name }}
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="/a_tenant/{{ $room->id }}">change tenant</a></li>
    <li><a href="/d_tenant/{{ $room->id }}">deallocate tenant</a></li>
  </ul>
</div>
@else
   <div class="dropdown">
  <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">vacant
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="/a_tenant/{{ $room->id }}">Assign tenant</a></li>
  </ul>
</div>
@endif
  </td>
  <td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="/e_room/{{ $room->id }}">edit room</a></li> 
    <li><a href="/d_room/{{ $room->id }}">delete room</a></li>
  </ul>
</div>
  </td>
  </tr>

@endforeach
</table>



@endsection
