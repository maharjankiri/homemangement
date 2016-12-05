@extends('layouts.masterpage')

@section('title')
loadshedding schedule
@endsection

@section('content')
@php
    $total=0;
    $d=1;
    if(isset($payment))
    {
    $d1=$year.'-'.$month.'-01';
    $d2=$payment->month;

    $m1=date("m",strtotime($d1));
    $m2=date("m",strtotime($d2));

    $y1=date("Y",strtotime($d1));
    $y2=date("Y",strtotime($d2));

    echo $m1.'<br>';
    echo $m2.'<br>';
    echo $y1.'<br>';echo $y2.'<br>';
    
    if($y1>$y2)
    {
      $d=(12-$m1)+($m2);
    }
    else
    {
    $d=$m1-$m2;
    }
    echo $d;

    $total=$payment->due_amount-$payment->excess_amount;
     
    }
    
    @endphp
<div style="margin: auto;"><h1><p align="center">{{date("F",strtotime("2012-".$month."-01"))}} {{$year}}</p></h1></div>
 <form class="form-horizontal" method="post" action="/confirmpayment">
    {{ csrf_field() }}
    <h3><u>@if(isset($payment)) {{ date('F' , strtotime($payment->month)) }} {{ date('Y' , strtotime($payment->month)) }} @endif </u></h3>
     <div class="form-group">
     <input type="hidden"  value="@if(isset($payment)){{$payment->month}} @endif" name="pmonth" >
     <input type="hidden"  value="{{$year}}" name="year" >
     <input type="hidden"  value="{{$month}}" name="month" >
     <input type="hidden" value="{{$tenant->id}}" name="tenant">
            <label for="previousdue" class="col-sm-2 control-label">previous due</label>
            <div class="col-sm-5">
            <div class="input-group">
            <div class="input-group-addon">Rs</div>
                <input type="text" class="form-control" id="previousdue" placeholder="" value="@if(isset($payment)) {{$payment->due_amount}} @endif" name="previousdue" readonly>
                <span>
                  @if ($errors->has('name')) 
                  {{ $errors->first('name') }} 
                  @endif
                </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="previousbalance" class="col-sm-2 control-label">previous balance</label>
            <div class="col-sm-5">
            <div class="input-group">
            <div class="input-group-addon">Rs</div>
                <input type="text" class="form-control" id="previousbalance" placeholder="" value="@if(isset($payment)){{$payment->excess_amount}} @endif" name="previousbalance" readonly>
                <span>
                  @if ($errors->has('name')) 
                  {{ $errors->first('name') }} 
                  @endif
                </span>
                </div>
            </div>
        </div>
        <h3><u>Extras</u></h3>
     @foreach($tenant->extras as $ext)
     <div class="form-group">
            <label for="name" class="col-sm-2 control-label">{{$ext->title}}</label>
            <div class="col-sm-5">
            <div class="input-group">
            <div class="input-group-addon">Rs</div>
                <input type="text" class="form-control" id="name" placeholder="enter name" value="{{$d*$ext->price}}" name="name" readonly>
                <span>
                  @if ($errors->has('name')) 
                  {{ $errors->first('name') }} 
                  @endif
                </span>
                </div>
            </div>
        </div>
       @php $total=$total+$d*$ext->price; @endphp</br>
     @endforeach
     <h3><u>Rooms</u></h3>
      @foreach($tenant->rooms as $rm)
      <div class="form-group">
            <label for="name" class="col-sm-2 control-label">{{$rm->room_name}}</label>
            <div class="col-sm-5">
            <div class="input-group">
            <div class="input-group-addon">Rs</div>
                <input type="text" class="form-control" id="name" placeholder="enter name" value="{{$d*$rm->price}}" name="name" readonly>
                <span>
                  @if ($errors->has('name')) 
                  {{ $errors->first('name') }} 
                  @endif
                </span>
            </div>
            </div>
        </div>
       @php $total=$total+$d*$rm->price; @endphp</br>
     @endforeach

     <h3><u>Payment</u></h3>
     <div class="form-group">
            <label for="total" class="col-sm-2 control-label">Total Amount</label>
            <div class="col-sm-5">
            <div class="input-group">
            <div class="input-group-addon">Rs</div>
                <input type="text" class="form-control" id="total" placeholder="" value="{{$total}}" name="total" readonly>
                <span>
                  @if ($errors->has('name')) 
                  {{ $errors->first('name') }} 
                  @endif
                </span>
            </div>
            </div>
        </div>
         <div class="form-group  @if ($errors->has('received'))
                  has-error
                  @endif">
            <label for="received" class="col-sm-2 control-label">Received amount</label>
            <div class="col-sm-5">
            <div class="input-group">
            <div class="input-group-addon">Rs</div>
                <input type="text" class="form-control" id="received" placeholder=""  name="received" onchange="calculate()">
                </div>
                 <span>
                  @if ($errors->has('received'))
                  {{ $errors->first('received') }} 
                  @endif
                </span>
            </div>
        </div>
        <div class="form-group">
            <label for="excessive" class="col-sm-2 control-label">Excessive amount</label>
            <div class="col-sm-5">
            <div class="input-group">
            <div class="input-group-addon">Rs</div>
                <input type="text" class="form-control" id="excessive" placeholder=""  name="excessive" readonly>
                <span>
                  @if ($errors->has('name')) 
                  {{ $errors->first('name') }} 
                  @endif
                </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="insufficient" class="col-sm-2 control-label">Insufficient amount</label>
            <div class="col-sm-5">
            <div class="input-group">
            <div class="input-group-addon">Rs</div>
                <input type="text" class="form-control" id="insufficient" placeholder=""  name="insufficient" readonly>
                <span>
                  @if ($errors->has('name')) 
                  {{ $errors->first('name') }} 
                  @endif
                </span>
                </div>
            </div>
        </div>
         <div class="form-group">
            <label for="retruned" class="col-sm-2 control-label">Returned amount</label>
            <div class="col-sm-5">
            <div class="input-group">
            <div class="input-group-addon">Rs</div>
                <input type="text" class="form-control" id="returned" placeholder=""  name="returned">
                </div>
            </div>
        </div>
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">confirm</button>
            </div>
        </div>

    </form>
    <script>
    function calculate() {
    var received1= document.getElementById("received").value;
    var total1=document.getElementById("total").value;
    var received=parseInt(received1);
    var total=parseInt(total1);

    if(received>total)
    {
     document.getElementById('excessive').value=received-total;
     document.getElementById('insufficient').value=0;
     document.getElementById("returned").readOnly = false;
     document.getElementById("returned").value = received-total;  
    }
    else if(received==total)
     {
      document.getElementById('excessive').value=0;
      document.getElementById('insufficient').value=0;
      document.getElementById("returned").readOnly = true;
      document.getElementById("returned").value =0;
     } 
     else
     {
       document.getElementById('excessive').value=0;
       document.getElementById('insufficient').value=total-received;
       document.getElementById("returned").readOnly = true;
       document.getElementById("returned").value =0;
     }
   
    
        
}
</script>
@endsection