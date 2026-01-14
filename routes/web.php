<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;

Auth::routes();
Route::get('/', function () {
    $categories = Category::all();
    $reviews = Review::all();
    return view('welcome',['categories'=>$categories, 'reviews'=>$reviews]);
});

Route::get('/products/{productid?}',function($productid=null){
        if($productid == null){
        $products = Product::paginate(6);
        return view('products.allproducts',['products'=>$products]);
    }else if ($productid != null){
        $products = Product::where('category_id', $productid)->paginate(6);;
        return view('products.allproducts',['products'=>$products]);
    }
});

Route::get('/categories',function(){
    $categories = Category::paginate(6);
    $products = Product::paginate(6);
    return view('categories',['categories'=>$categories, 'products'=>$products]);
});

Route::get('/addproduct',function(){
    $categories = Category::all();
    return view('products.addproduct',['categories'=>$categories]);
})->middleware('auth');

Route::post('/storeproduct', function(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $product = new Product();
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
})->middleware('auth');

Route::get('/editproduct/{productid}',function($productid){
    $product = Product::find($productid);
    $categories = Category::all();
    return view('products.editproduct',['product'=>$product, 'categories'=>$categories]);
});

Route::get('/deleteproduct/{productid}',function($productid){
    $product = Product::find($productid);
    $product->delete();
    return redirect('/products')->with('success', 'Product deleted successfully!');
});

Route::post('/updateproduct',function(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    ]);

    $product = Product::find($request->productid);

    $product -> name = $request -> name;
    $product -> price = $request -> price;
    $product -> quantity = $request -> quantity;
    $product -> description = $request -> description;
    $product -> category_id = $request -> category_id;

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
});

Route::get('/addreview',function(){
    return view('addreview');
});

Route::post('/storereview',function(Request $request){

     $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'required|string|max:255',
        'review' => 'required|string',
    ]);
    $newReview = new Review();

    $newReview -> name = $request -> name;
    $newReview -> email = $request -> email;
    $newReview -> phone = $request -> phone;
    $newReview -> subject = $request -> subject;
    $newReview -> review = $request -> review;

    $newReview->save();

    return redirect('/')->with('success', 'Review added successfully!');

});

Route::get('/productstable',function(){
    $products = Product::all();
    return view('products.productstable',['products'=>$products]);
});

Route::get('/cart',[CartController::class, 'Cart'])->middleware('auth');
Route::get('/addproducttocart/{productId?}',[CartController::class, 'AddProductToCart'])->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cartproductremove/{cartId?}', [CartController::class, 'CartProductRemove'])->middleware('auth');
Route::post('/cart/increase/{id?}', [CartController::class, 'IncreaseCartQuantity'])->middleware('auth');
Route::post('/cart/decrease/{id?}', [CartController::class, 'DecreaseCartQuantity'])->middleware('auth');

Route::get('/addproductimage/{productid}',function($productid){
    $product = Product::find($productid);
    $productImages = ProductPhoto::where('product_id', $productid)->get();
    return view('products.AddProductImage',['product'=>$product, 'productImages'=>$productImages]);
})->middleware('auth');
