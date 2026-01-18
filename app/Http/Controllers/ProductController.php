<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productid = null)
    {
        if ($productid == null) {
            $products = Product::paginate(6);
            return view('products.allproducts', ['products' => $products]);
        } elseif ($productid != null) {
            $products = Product::where('category_id', $productid)->paginate(6);
            return view('products.allproducts', ['products' => $products]);
        }
    }

    public function categories()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('categories', ['categories' => $categories, 'products' => $products]);
    }

    public function show($productId)
    {
        $product = Product::with(['category', 'productPhotos'])->findOrFail($productId);

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $productId)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('products.singleproduct', compact('product', 'relatedProducts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.addproduct', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/'), $filename);
            $product->imagepath = 'assets/img/' . $filename;
        }

        $product->save();

        return redirect('/products')->with('success', 'Product added successfully!');
    }

    public function edit($productid)
    {
        $product = Product::find($productid);
        $categories = Category::all();

        return view('products.editproduct', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::find($request->productid);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->imagepath && file_exists(public_path($product->imagepath))) {
                unlink(public_path($product->imagepath));
            }

            // Save new image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/'), $filename);

            $product->imagepath = 'assets/img/' . $filename;
        }

        $product->save();

        return redirect('/products')->with('success', 'Product updated successfully!');
    }

    public function destroy($productid)
    {
        $product = Product::find($productid);
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted successfully!');
    }

    public function adminIndex()
    {
        $products = Product::all();
        return view('products.productstable', ['products' => $products]);
    }
}
