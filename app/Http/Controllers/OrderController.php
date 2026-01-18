<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        $cartProducts = Cart::where('user_id', $user->id)->get();
        $orders = Order::with('orderDetails')->where('user_id', $user->id)->get();
        $totalPrice = $cartProducts->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        return view('products.previousorders', compact('orders', 'cartItems', 'cartProducts', 'totalPrice'));
    }

    public function checkout()
    {
        $user_id = auth()->user()->id;
        $cartProducts = Cart::where('user_id', $user_id)->get();
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $totalPrice = $cartProducts->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('products.checkout', compact('cartProducts', 'totalPrice', 'cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'note' => 'nullable|string',
        ]);
        $user_id = auth()->user()->id;

        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->note = $request->note;
        $order->user_id = $user_id;
        $order->save();

        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        foreach ($cartItems as $item) {
            $newOrderDetail = new OrderDetails();
            $newOrderDetail->product_id = $item->product_id;
            $newOrderDetail->price = $item->product->price;
            $newOrderDetail->quantity = $item->quantity;
            $newOrderDetail->order_id = $order->id;
            $newOrderDetail->save();
        }

        Cart::where('user_id', $user_id)->delete();

        return redirect()->back()->with('success', 'Your order has been placed successfully!');
    }
}
