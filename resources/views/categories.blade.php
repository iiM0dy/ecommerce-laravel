<style>
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .single-product-item {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .single-product-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .product-image img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        display: block;
    }

    .product-details {
        padding: 15px 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .product-details h3 {
        font-size: 18px;
        margin: 0;
        color: #333;
    }

    .product-desc {
        font-size: 14px;
        color: #666;
        flex: 1;
        /* pushes price and button down */
    }

    .product-price {
        font-weight: 600;
        color: #f28123;
        margin-bottom: 10px;
    }

    .cart-btn {
        background: #f28123;
        color: #fff;
        text-align: center;
        padding: 10px 0;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .cart-btn:hover {
        background: #e06f12;
        transform: translateY(-2px);
    }

    /* Product filters style */
    .product-filters {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .product-filters li {
        cursor: pointer;
        padding: 8px 18px;
        border-radius: 50px;
        background: #f1f1f1;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .product-filters li.active,
    .product-filters li:hover {
        background: #f28123;
        color: #fff;
    }

    .single-product-item {
        background: #fff;
        border-radius: 16px;
        padding: 22px;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .single-product-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
    }

    .product-image img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 15px;
    }

    .single-product-item h3 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .product-desc {
        font-size: 14px;
        color: #777;
        margin-bottom: 15px;
        line-height: 1.6;
        overflow: hidden;
    }

    .product-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .product-price {
        font-size: 20px;
        font-weight: 700;
        color: #f28123;
    }

    .product-qty {
        font-size: 13px;
        color: #888;
    }

    .cart-btn {
        display: inline-block;
        padding: 12px 28px;
        background: linear-gradient(135deg, #f28123, #e96b0c);
        color: #fff;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .cart-btn:hover {
        background: linear-gradient(135deg, #e96b0c, #f28123);
        color: #fff;
        box-shadow: 0 8px 20px rgba(242, 129, 35, 0.35);
    }

    .single-product-item {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .product-image-wrapper img {
        width: 100%;
        height: 250px;
        display: block;
    }

    .product-details {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    /* PAGINATION */

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .pagination {
        display: flex;
        gap: 8px;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination li a,
    .pagination li span {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 16px;
        border-radius: 50px;
        background: #f28123;
        color: #fff;
        font-weight: 600;
        min-width: 42px;
        text-align: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .pagination li a:hover {
        background: #e96b0c;
        box-shadow: 0 4px 12px rgba(242, 129, 35, 0.35);
    }

    .pagination li.active span {
        background: #e96b0c;
        cursor: default;
    }

    .pagination li.disabled span {
        background: #ddd;
        color: #888;
        cursor: not-allowed;
    }

    .pagination li a[rel="prev"],
    .pagination li a[rel="next"] {
        background: #3498db;
        color: #fff;
        font-size: 16px;
        font-weight: 700;
    }

    .pagination li a[rel="prev"]:hover,
    .pagination li a[rel="next"]:hover {
        background: #2980b9;
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.35);
    }
</style>

@extends('layouts.master')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <!-- Section title -->
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Fresh products, directly from farm to your table</p>
                    </div>
                </div>
            </div>

            <!-- Product filters -->
            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <ul class="product-filters">
                        <li class="active" data-filter="*">All</li>
                        @foreach ($categories as $category)
                            <li data-filter=".category-{{ $category->id }}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($products as $product)
                    <div class="  col-lg-4 col-md-6 mb-4 category-{{ $product->category_id }}">
                        <div class="single-product-item">

                            <div class="product-image-wrapper">
                                <img src="{{ asset($product->imagepath) }}" alt="{{ $product->name }}">
                            </div>

                            <div class="product-details">
                                <h3>{{ $product->name }}</h3>

                                <p class="product-desc">
                                    {{ Str::limit($product->description, 80) }}
                                </p>

                                <div class="product-meta">
                                    <span class="product-price">${{ $product->price }}</span>
                                    <span class="product-qty">{{ $product->quantity }} in stock</span>
                                </div>

                                <a href="cart.html" class="cart-btn">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrapper">

                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection



{{-- pages --}}

{{-- <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
