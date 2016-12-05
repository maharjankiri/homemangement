@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')

<h1>@if(is_null($room->tenant_id))assign @else edit @endif tenant in {{ $room->room_name }}</h1>

  <form class="form-horizontal" method="post" action="/a_tenant/{{ $room->id }}">
    {{ csrf_field() }}
      <div class="form-group">
            <label for="price" class="col-sm-2 control-label">tenants</label>
            <div class="col-sm-2">
            <select class="form-control" name="tenant">
            
            @foreach($tenants=App\Tenant::all() as $t)
            <option value="{{$t->id}}" @if($room->tenant_id==$t->id) selected @endif>{{ $t->id}}.{{ $t->name}}</option>
            @endforeach
            </select>
               
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