@extends('layouts.masterpage')
@section('title')
rooms
@endsection
@section('content')


<div style="float:right; margin-bottom:5px;"><a href="/c_facility"><button class="btn btn-success" type="button">add more facilities</button></a></div>
<table class="table table-bordered table-striped">
<tr><th>Title</th><th>Price</th><th>tenant</th><th>action</th></tr>
  @foreach ($extras as $extra)

  <tr><td>{{ $extra->title }}</td><td>{{ $extra->price }} <td>
  @if($extra->tenants->isEmpty())
  <button class="btn btn-danger" type="button">N/A</button>
  

@else

@foreach ($extra->tenants as $ex)
<div class="dropdown" style="float:left; margin-left:2px;margin-bottom:2px;">
<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $ex->name }}
      <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/extras/de_tenant/{{$ex->id}}/{{$extra->id}}">deallocate tenant</a></li>
      </ul>
 </div>       
@endforeach

    
@endif
<div style="float:right;"><a href="/extras/a_tenant/{{$extra->id}}"><button class="btn btn-default" type="button">add</button>
  </td>
  <td>
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="/extras/e_facility/{{$extra->id}}">edit facility</a></li> 
    <li><a href="/extras/d_facility/{{$extra->id}}">delete facility</a></li>
  </ul>
</div>
  </td>
  </tr>

@endforeach
</table>



@endsection
