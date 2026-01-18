<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;

class ProductPhotoController extends Controller
{
    public function create($productid)
    {
        $product = Product::find($productid);
        $productImages = ProductPhoto::where('product_id', $productid)->get();

        return view('products.AddProductImage', ['product' => $product, 'productImages' => $productImages]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $newProductPhoto = new ProductPhoto;

        $newProductPhoto->product_id = $request->product_id;
        if ($request->has('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/'), $filename);
            $newProductPhoto->photo_path = 'assets/img/' . $filename;
        }
        $newProductPhoto->save();

        return redirect('/productstable');
    }

    public function destroy($productid = null)
    {
        if ($productid != null) {
            $productImages = ProductPhoto::find($productid);
            $productImages->delete();

            return redirect('/productstable');
        } else {
            abort(403, 'please enter image id in the route');
        }
    }
}
