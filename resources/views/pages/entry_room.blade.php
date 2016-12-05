@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')

<h1>@if(isset($room->id)) edit @else Create @endif Room </h1>
@if(!empty($msg))
{{ $msg }}
@endif
  <form class="form-horizontal" method="post" action="@if(isset($room->id))/e_room/{{$room->id}} @else /c_room @endif">
    {{ csrf_field() }}
        <div class="form-group  @if($errors->has('name'))has-error @endif">
            <label for="name" class="col-sm-2 control-label">Room Name</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="name" placeholder="enter name" value="@if(isset($room->id)){{ $room->room_name}} @else{{old('name') }}@endif" name="name">
                <span>
                  
                  @if ($errors->has('name'))
                  
                  {{ $errors->first('name') }} 
                  

                  @endif
                </span>

            </div>

        </div>
        <div class="form-group  @if($errors->has('price'))has-error @endif">
            <label for="price" class="col-sm-2 control-label">price</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="price" placeholder="price per month" value="@if(isset($room->id)){{ $room->price}} @else{{old('price') }}@endif" name="price">
                <span>
                  
                  @if ($errors->has('price'))
                  
                  {{ $errors->first('price') }} 
                  

                  @endif
                </span>

            </div>

        </div>
        



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">submit</button>
            </div>
        </div>
    </form>
@endsection