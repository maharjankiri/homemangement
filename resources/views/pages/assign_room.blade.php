@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')

<h1>assign room for {{ $tenant->name }}</h1>

  <form class="form-horizontal" method="post" action="/a_room/{{$tenant->id}}">
    {{ csrf_field() }}
      <div class="form-group">
            <label for="name" class="col-sm-2 control-label">tenants</label>
            <div class="col-sm-2">
            <select class="form-control" name="name">
            
            @foreach(App\Room::all()->where('tenant_id',null) as $r)
            <option value="{{$r->id}}">{{ $r->room_name }}</option>
            @endforeach
            </select>


            </div>

        </div>
        



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">submit</button>
            </div>
        </div>
    </form>
@endsection