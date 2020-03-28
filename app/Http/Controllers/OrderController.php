<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\StoreOrder;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orderBy('created_at', 'desc')
        ->get();

        return view('order.index', compact('orders'));
    }

    public function store(StoreOrder $request, $id)
    {
        $order = new Order();

        $order->count = $request->count;
        $order->user_id = $request->user()->id;
        $order->menu_id = $id;

        $request->session()->put('key', 'value');

        $order->save();

        return redirect('order/index');
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $order->status = $request->status;

        $order->save();

        return redirect('order/index');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect('order/index');
    }
}
