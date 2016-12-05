<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Tenant;

class PaymentController extends Controller
{
    public function select(Request $request)
    {
    	$tenant=$request->tenant;
    	$year=$request->year;
    	$month=$request->month;
    	$ps=Payment::where('tenant_id',$tenant)->latest('month')->first();
    	if(!empty($ps))
    	{
    		if($year<=date("Y",strtotime($ps->month))  and $month<=date("m",strtotime($ps->month)))
    		{
    		$a=array("dd"=>"payment for this month has already been cleared");
    		 return redirect('/select')
                        ->withErrors($a)
                        ->withInput();
    		}
    	}
    	
    
       	$t=Tenant::find($tenant);
    
    	//$ps=Payment::where('tenant_id',$tenant)->whereMonth('month',$month-1==0?12:$month-1)->whereYear('month', $month-1==0?$year-1:$year)->get();
    	
    	return view('pages.bill')->with('tenant',$t)->with('year',$year)->with('month',$month)->with('payment',$ps);
    }
 	public function store(Request $request)
    {
    	$this->validate($request, [
        'received' => 'required',
    ]);
     	$payment=new Payment();
     	$payment->tenant_id=$request->tenant;
     	$payment->month=$request->year.'-'.$request->month.'-01';
     	$payment->received_amount=$request->received;
     	$due=$balance=0;

     	if($request->insufficient!=0 and $request->excessive==0)
     	{
     		$payment->due_amount=$request->insufficient;
     		$due=$request->insufficient;
     	}
     	else
     	{
     		if($request->excessive>$request->returned)
     		{
     			$payment->excess_amount=$request->excessive-$request->returned;
     			$balance=$request->excessive-$request->returned;
     		}
     		else
     		{
     			$payment->due_amount=$request->returned-$request->excessive;
     			$due=$request->returned-$request->excessive;
     		}
     		    
     	}

     	if($payment->save())
     	{
     		$number=$payment->id;
     		return view('pages.receipt')->with('number',$number)
     		->with('received',$request->received)
     									->with('total',$request->total)
     									->with('returned',$request->returned)
     									->with('due',$due)
     									->with('balance',$balance)
     									->with('tenant',$request->tenant)
     									->with('from',$request->pmonth)
     									->with('to',$request->month);
     	}
     		

    }
     	
}
