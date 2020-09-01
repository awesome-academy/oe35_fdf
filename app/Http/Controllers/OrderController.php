<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Redirect;
use Cart;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function place_order()
    {
        if(isset(Auth::user()->id))
        {
            $data = Cart::content();
            $total = 0;
            $order = new Order();
            foreach ($data as $datum)
            {
                $total += ($datum->price * $datum->qty);
            };
            $order->user_id = Auth::user()->id;
            $order->total_price = $total;
            $order->save();

            $orderdetail = new OrderDetail();
            foreach ($data as $datum)
            {
                $orderdetail->product_id = $datum->id;
                $orderdetail->order_id = $order->id;
                $orderdetail->order_product_name = $datum->name;
                $orderdetail->order_product_totalprice = ($datum->qty * $datum->price);
                $orderdetail->quantity = $datum->qty;

                $orderdetail->save();
                Cart::destroy();

                $orderdetail = new OrderDetail();
            };
            $order->user_id = Auth::user()->id;
            $order->total_price = $total;
            $order->save();

            return Redirect::route('showcart');
        }else {

            return Redirect::route('login');
        }
    }
}
