<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function Cart()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('products.cart', compact('cartItems', 'total'));
    }
    public function CartProductRemove($cartId)
    {
        $cartItem = Cart::find($cartId);

        if ($cartItem && $cartItem->user_id == auth()->id()) {
            $cartItem->delete();
            return redirect('/cart')->with('success', 'Product removed from cart successfully!');
        }

        return redirect('/cart')->with('error', 'Unable to remove product from cart.');
    }


    public function AddProductToCart($productId)
    {
        $user_id = auth()->user()->id;

        $result = Cart::where('user_id', $user_id)->where('product_id', $productId)->first();
        if ($result) {
            $result->quantity += 1;
            $result->save();
            return redirect('/cart')->with('success', 'Product quantity updated in cart successfully!');
        } else {

            $newCartItem = new Cart();
            $newCartItem->product_id = $productId;
            $newCartItem->user_id = $user_id;
            $newCartItem->quantity = 1;

            $newCartItem->save();

            return redirect('/cart')->with('success', 'Product added to cart successfully!');
        }
    }

    public function IncreaseCartQuantity($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem && $cartItem->user_id == auth()->id()) {
            $cartItem->quantity += 1;
            $cartItem->save();
            return redirect('/cart')->with('success', 'Cart quantity increased successfully!');
        }

        return redirect('/cart')->with('error', 'Unable to increase cart quantity.');
    }

    public function DecreaseCartQuantity($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem && $cartItem->user_id == auth()->id()) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
                return redirect('/cart')->with('success', 'Cart quantity decreased successfully!');
            } else {
                $cartItem->delete();
                return redirect('/cart')->with('success', 'Product removed from cart successfully!');
            }
        }

        return redirect('/cart')->with('error', 'Unable to decrease cart quantity.');
    }
    public function storeSingleProduct(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);
        $user_id = auth()->user()->id;
        $cartItem = new Cart;
        $cartItem->user_id = $user_id;
        $cartItem->quantity = $request->quantity;
        $cartItem->product_id = $request->product_id;
        $cartItem->save();
        return redirect('/singleproduct/' . $request->product_id);
    }
}
