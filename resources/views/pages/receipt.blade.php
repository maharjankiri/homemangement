@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')
<style type="text/css">
    #main
    {
        width: 800px;
        height:500px;
        margin:auto;
        padding: 5px;
        border-style: dotted;
        background-image:;

    }
    #p1
    {
        width: 200px;
        float:left;
        height: 100px;
        color:blue;

    }
    #p2
    {
        width:580px;
        float: right;
        height: 100px;
        padding-top: 50px;
    }
    #date
    {
        width:290px;
        float: left;

    }
    #receipt
    {
        width:290px;
        float: right;
        
    }
    #heading
    {
        height: 100px;
    }
    #mid-1
    {
        height: 100px;
    }
    #received
    {
        width: 550px;
        float: left;
    }
    #amount
    {
        width:230px;
        float: right;

    }
    #amount 
    {
        margin-top: 10px;
    }
    #box
    {
        width:160px;
        height:40px;
        border-style: solid;
        border-color: black;
        float: right;
        padding-top: 10px;
    }
    #mid-2
    {
        height: 100px
    }
    #for
    {
        width:600px;
        float: left;
        height: 50px;
    }
    #from
    {
        width:200px;
        float: left;
    }
    #to
    {
        width:200px;
        float:left;

    }
    #info
    {
        width: 250px;
        float: left;
    }
    #tbl
    {
        float:right;

    }
</style>
@php  $t=App\tenant::find($tenant);

 @endphp
<div id="main">
    <div id="heading">
        <div id="p1">
            <h1>RECEIPT</h1>
        </div>
        <div id="p2">
            <div id="date">
                 <b>Date:</b>{{$date = date('Y-m-d')}}
            </div>
            <div id="receipt">
                <b>Receipt NO:</b>{{$number}}
            </div> 
           
           
        </div>   
    </div>
    <div id="mid-1">
        <div id="received">
           <b>Received From:</b><u>{{$t->name}}</u> 
        </div>
        <div id="amount">
            <b>Amount:</b>
            <div id="box">
                <b>Rs</b>{{$received}}
            </div>
        </div>
        
    </div>
    <div id="mid-2">
        <div id="for">
            <b>For Payment of:</b><u>@foreach($t->rooms as $r) {{$r->room_name}}, @endforeach @foreach($t->extras as $e){{$e->title}},@endforeach</u>
        </div>
        <div id="from">
            <b>From:</b><u>@if($from!=0){{date('F',strtotime($from))}}@endif</u>
        </div>
        <div id="to">
            <b>To:</b><u>{{date('F',strtotime('2010-'.$to.'-01'))}}</u>
        </div>
    </div>
    <div id="info">
    <table class="table table-bordered">
    <tr>
    <td><b>Received BY:</b></td>
    <td>Krishna man maharjan </td>
    </tr>

    <tr>
    <td><b>Address:</b></td>
    <td>Bhainsepati,Lalitpur</td>
    </tr>

    <tr>
    <td><b>Phone:</b></td>
    <td>9841742245</td>
    </tr>


    </table>
    
    </div>
    <div id="tbl">
    <table class="table table-bordered">
    <tr>
    <td><b>Total:</b></td>
    <td>{{$total}} </td>
    </tr>

    <tr>
    <td><b>received amount:</b></td>
    <td>{{$received}}</td>
    </tr>

    <tr>
    <td><b>Returned amount:</b></td>
    <td>{{$returned}}</td>
    </tr>

    <tr>
        <td><b>Due Left:</b></td>
        <td>{{$due}}</td>
    </tr>
    <tr>
    <td><b>Balance Left:</b></td>
    <td>{{$balance}}</td>
    </tr>
    </table>
    </div>
</div>

@endsection