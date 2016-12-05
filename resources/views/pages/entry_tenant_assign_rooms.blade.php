@extends('layouts.masterpage')

@section('title')
loadsheddingschedule 
@endsection

@section('content')

<h1>Add tenant </h1>
@if(!empty($msg))
{{ $msg }}
@endif


  <form class="form-horizontal" method="post" action="/c_tenant">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="name" placeholder="name" value="{{old('name') }}" name="name">
                <span>
                  @if ($errors->has('name')) 
                  {{ $errors->first('name') }} 
                  @endif
                </span>
            </div>
        </div>
        
       <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Mobile NO.</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="phone" placeholder="enter mobile number" value="{{ old('phone') }}" name="phone" maxlength="10">
                <span>
                  @if ($errors->has('phone'))
                  {{ $errors->first('phone') }} 
                  @endif
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