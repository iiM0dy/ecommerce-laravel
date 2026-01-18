<style>
    /* Product card */
    .single-product-item {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .single-product-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
    }

    .product-image-wrapper img {
        width: 100%;
        height: 250px;
        display: block;
        object-fit: cover;
    }

    .product-details {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .single-product-item h3 {
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }

    .product-desc {
        font-size: 14px;
        color: #777;
        line-height: 1.5;
        min-height: 44px;
        overflow: hidden;
    }

    .product-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product-price {
        font-size: 18px;
        font-weight: 700;
        color: #f28123;
    }

    .product-qty {
        font-size: 13px;
        color: #888;
    }

    /* Buttons */
    .cart-btn {
        padding: 10px 28px;
        border-radius: 50px;
        background: linear-gradient(135deg, #f28123, #e96b0c);
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-align: center;
        transition: all 0.3s ease;
        margin-top: 12px;
    }

    .cart-btn:hover {
        background: linear-gradient(135deg, #e96b0c, #f28123);
        box-shadow: 0 6px 15px rgba(242, 129, 35, 0.35);
    }

    /* Edit/Delete buttons */
    .edit-delete-group {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .edit-delete-group .edit-btn,
    .edit-delete-group .delete-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        height: 42px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-align: center;
        transition: all 0.3s ease;
        min-width: 100px;
        text-decoration: none;
    }

    .edit-btn {
        background: #3498db;
        color: #fff;
    }

    .edit-btn:hover {
        background: #2980b9;
    }

    .delete-btn {
        background: #e74c3c;
        color: #fff;
        border: none;
    }

    .delete-btn:hover {
        background: #c0392b;
    }

    /* Pagination */
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

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>{{ __('messages.allproducts') }}</h3>
                        <p>{{ __('messages.allproductsdesc') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="single-product-item">

                            <div class="product-image-wrapper">
                                <a href="/singleproduct/{{ $product->id }}"><img src="{{ asset($product->imagepath) }}"
                                        alt="{{ $product->name }}"></a>

                            </div>

                            <div class="product-details">
                                <h3>{{ session('locale') == 'ar' ? $product->name : $product->name_en }}</h3>

                                <p class="product-desc">
                                    {{ session('locale') == 'ar' ? Str::limit($product->description, 80) : Str::limit($product->description_en, 80) }}
                                </p>

                                <div class="product-meta">
                                    <span class="product-price">${{ $product->price }}</span>
                                    <span class="product-qty">{{ $product->quantity }} {{ __('messages.instock') }}</span>
                                </div>

                                <!-- Action buttons centered -->
                                <div class="product-actions">

                                    <!-- Add to Cart button on the left -->


                                    <!-- Edit and Delete buttons on the right -->
                                    <div class="edit-delete-group" style="display: flex; gap: 10px; ">
                                        <a href="{{ url('/editproduct/' . $product->id) }}"
                                            class="edit-btn">{{ __('messages.edit') }}</a>
                                        <a href="/deleteproduct/{{ $product->id }}"
                                            class="delete-btn">{{ __('messages.delete') }}</a>
                                    </div>
                                    <a href="/addproducttocart/{{ $product->id }}"
                                        class="cart-btn">{{ __('messages.addtocart') }}</a>
                                </div>



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