<?php


namespace App\Http\Controllers\Driver;


use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class DriverController extends Controller
{
public function dashboard()
{
return view('driver.dashboard',[
'availableCount' => Order::where('status','pending')->count(),
'activeCount' => Order::where('driver_id',auth()->id())
->where('status','in_progress')->count(),
'completedCount' => Order::where('driver_id',auth()->id())
->where('status','completed')->count(),
]);
}


public function available()
{
$orders = Order::where('status','pending')->get();
return view('driver.available',compact('orders'));
}


public function myOrders()
{
$orders = Order::where('driver_id',auth()->id())
->where('status','!=','completed')
->get();


return view('driver.my-orders',compact('orders'));
}


public function take(Order $order)
{
$order->update([
'driver_id'=>auth()->id(),
'status'=>'in_progress'
]);
return back();
}


public function updateStatus(Request $request, Order $order)
{
$order->update(['status'=>$request->status]);
return back();
}
}