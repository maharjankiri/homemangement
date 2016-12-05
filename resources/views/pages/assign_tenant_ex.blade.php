@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')


<h1>asign tenant for {{$extra->title}}</h1>
  <form class="form-horizontal" method="post" action="/extras/a_tenant/{{$extra->id}}">
    {{ csrf_field() }}
      <div class="form-group">
            <label for="price" class="col-sm-2 control-label">tenants</label>
            <div class="col-sm-2">
            <select class="form-control" name="tenant">
              @foreach(App\Tenant::whereNotIn('id',$b)->get() as $t)
              {
                <option value="{{$t->id}}">{{$t->id}}.{{$t->name}}</option>
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