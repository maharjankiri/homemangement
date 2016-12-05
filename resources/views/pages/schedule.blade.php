@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')
    <form class="form-horizontal">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Person</label>
            <div class="col-sm-2">
                <input type="email" class="form-control" id="name" placeholder="from">

            </div>

        </div>
        <div class="form-group">
            <label for="month" class="col-sm-2 control-label">month</label>
            <div class="col-sm-2">
                <input type="email" class="form-control" id="month" placeholder="from">

            </div>

        </div>
        <div class="form-group">
            <label for="channel" class="col-sm-2 control-label">Channel</label>
            <div class="col-sm-2">
                <input type="email" class="form-control" id="channel" placeholder="from">

            </div>

        </div>
        <div class="form-group">
            <label for="efrom" class="col-sm-2 control-label">Electriciy Unit</label>
            <div class="col-sm-2">
                <input type="email" class="form-control" id="efrom" placeholder="from">

            </div>
            <div class="col-sm-2">
                <input type="email" class="form-control" id="eto" placeholder="to">

            </div>

        </div>
        <div class="form-group">
            <label for="ebill" class="col-sm-2 control-label">Electricity bill</label>
            <div class="col-sm-2">
                <input type="email" class="form-control" id="ebill" placeholder="from">

            </div>

        </div>
        <div class="form-group">
            <label for="wdisposal" class="col-sm-2 control-label">waste Disposal</label>
            <div class="col-sm-2">
                <input type="email" class="form-control" id="wdisposal" placeholder="from">

            </div>

        </div>
        <div class="form-group">
            <label for="rent" class="col-sm-2 control-label">Rent</label>
            <div class="col-sm-2">
                <input type="email" class="form-control" id="rent" placeholder="from">

            </div>

        </div>
        <div class="form-group">
            <label for="total" class="col-sm-2 control-label">Total</label>
            <div class="col-sm-2">
                <input type="email" class="form-control" id="total" placeholder="from">

            </div>

        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">pay</button>
            </div>
        </div>
    </form>
@endsection