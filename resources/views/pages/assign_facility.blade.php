@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')

<h1>assign facility for {{ $tenant->name }}</h1>

  <form class="form-horizontal" method="post" action="/a_facility/{{$tenant->id}}">
    {{ csrf_field() }}
      <div class="form-group">
            <label for="name" class="col-sm-2 control-label">facility</label>
            <div class="col-sm-2">
            <select class="form-control" name="extra">
            
             @foreach(App\Extra::whereNotIn('id',$b)->get() as $t)
              {
                <option value="{{$t->id}}">{{$t->id}}.{{$t->title}}</option>
              }
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