<style>
    .cart-btn {
    padding: 12px 25px;
    background-color: #F28123;       /* Main green color */
    color: #fff;                     /* White text */
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 8px;              /* Rounded corners */
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    box-shadow: 0 4px 8px rgba(0,0,0,0.15); /* Subtle shadow */
    display: block
}

.cart-btn:hover {
    background-color: #e67519;       /* Darker green on hover */
    transform: translateY(-2px);     /* Slight lift effect */
}

.cart-btn:active {
    transform: translateY(0);        /* Pressed effect */
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

</style>
@extends('layouts.master')
@section('content')
    <div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ asset($product->imagepath) }}" width="400" height="400" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{ $product->name }}</h3>
						<p class="single-product-pricing"><span>Price</span> ${{ $product->price }}</p>
						<p>{{ $product->description }}</p>
						<div class="single-product-form">
							<form action="/singleproducttocart" class="fo" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
								<input type="number" name="quantity" value="1" placeholder="0">
                                <p>quantity: {{ $product->quantity }}</p>
                                <button class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
							</form>
							<p><strong>Category: </strong>{{ $category->name }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection