@extends('layouts.masterpage')
@section('title')
rooms
@endsection
@section('content')


<div style="float:right; margin-bottom:5px;"><a href="/c_tenant"><button class="btn btn-success" type="button">add more tenants</button></a></div>
<table class="table table-bordered table-striped">
  <tr>
  <th>S.N</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Room</th>
    <th>facility</th>
    <th>action</th>
  </tr>
@php $sn=1 @endphp
   @foreach ($tenants as $tenant)
  <tr>
    <td>{{$sn++}}</td>
    <td>{{ $tenant->name }}</td>
    <td>{{ $tenant->phone }}</td>
    
    <td>
     
     @if(!($tenant->rooms->isEmpty()))
    @foreach ($tenant->rooms as $r)
    <div class="dropdown" style="float:left; margin-left:2px;margin-bottom: 2px;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $r->room_name }}
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="/de_room/{{ $r->id }}">deallocate room</a></li>
      </ul>
      </div>
      @endforeach
     
     @else
     <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">N/A</button>
      
    @endif
    <div style="float:right;"><a href="/a_room/{{ $tenant->id }}"><button class="btn btn-default" type="button">add</span></button></a></div>

    
   
    </td>
    <td>
       
     @if(!($tenant->extras->isEmpty()))
    @foreach ($tenant->extras as $r)
    <div class="dropdown" style="float:left; margin-left:2px; margin-bottom: 2px;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $r->title }}
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="/de_facility/{{$tenant->id}}/{{ $r->id }}">deallocate facility</a></li>
      </ul>
      </div>
      @endforeach
     
     @else
     <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">N/A</button>
      
    @endif
    <div style="float:right;"><a href="/a_facility/{{ $tenant->id }}"><button class="btn btn-default" type="button">add</span></button></a></div>

    </td>
    <td>
    <div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="/e_tenant/{{ $tenant->id }}">edit tenant</a></li> 
    <li><a href="/del_tenant/{{ $tenant->id }}">delete tenant</a></li>
  </ul>
</div>
	  </td>
  </tr>
    @endforeach
</table>


@endsection