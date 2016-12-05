@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')

<h1>@if(isset($tenant->id)) edit @else add @endif tenant </h1>
  <form class="form-horizontal" method="post" action="@if(isset($tenant->id)) /e_tenant/{{ $tenant->id }} @else /c_tenant @endif">
    {{ csrf_field() }}
        <div class="form-group @if($errors->has('name'))has-error @endif">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="name" placeholder="enter name" value="@if(isset($tenant->id)){{$tenant->name}}@else{{old('name')}}@endif" name="name">
                <span>
                  @if ($errors->has('name')) 
                  {{ $errors->first('name') }} 
                  @endif
                </span>
            </div>
        </div>
        
       <div class="form-group @if($errors->has('phone'))has-error @endif">
            <label for="phone" class="col-sm-2 control-label">Mobile NO.</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="phone" placeholder="enter mobile number" value="@if(isset($tenant->id)) {{$tenant->phone}}@else{{old('phone')}}@endif" name="phone">
                <span>
                @foreach ($errors->get('phone') as $message)
                {{ $message }}
                @endforeach
                 
                </span>
            </div>
        </div>
      

        


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
   @endsection