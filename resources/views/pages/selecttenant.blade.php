@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')
  <form class="form-horizontal" method="get" action="/payment">
    {{ csrf_field() }}
      <div class="form-group">
            <label for="tenant" class="col-sm-2 control-label">tenant</label>
            <div class="col-sm-2">
            <select class="form-control" name="tenant">
            @foreach($tenants=App\Tenant::all() as $t)
            <option value="{{$t->id}}" @if($t->id==old('tenant')) selected @endif>{{ $t->id}}.{{ $t->name}}</option>
            @endforeach
            </select>
                </div>
        </div>
         <div class="form-group @if ($errors->has('dd'))
         has-error
                  @endif">
            <label for="year" class="col-sm-2 control-label">Year</label>
            <div class="col-sm-2">
            <input type="text" class="form-control" id="year" placeholder="" value="{{date('Y')}}" name="year">
               <span>
                  @if ($errors->has('dd'))
                  {{ $errors->first('dd') }} 
                  @endif
                </span>
                </div>
        </div>
        <div class="form-group">
            <label for="month" class="col-sm-2 control-label">Month</label>
            <div class="col-sm-2">
            <select class="form-control" name="month">
            <option value="1"@if(old('month')==1) selected @endif>january</option>
            <option value="2"@if(old('month')==2) selected @endif>febuary</option>
            <option value="3"@if(old('month')==3) selected @endif>march</option>
            <option value="4"@if(old('month')==4) selected @endif>april</option>
            <option value="5"@if(old('month')==5) selected @endif>may</option>
            <option value="6"@if(old('month')==6) selected @endif>june</option>
            <option value="7"@if(old('month')==7) selected @endif>july</option>
            <option value="8"@if(old('month')==8) selected @endif>august</option>
            <option value="9"@if(old('month')==9) selected @endif>september</option>
            <option value="10"@if(old('month')==10) selected @endif>october</option>
            <option value="11"@if(old('month')==11) selected @endif>november</option>
            <option value="12"@if(old('month')==12) selected @endif>december</option>
            </select>
            </div>
        </div>
        



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </div>
    </form>
@endsection