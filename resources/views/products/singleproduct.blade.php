@extends('layouts.master')

@section('content')
    <style>
        .product-page {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px;
            font-family: system-ui, sans-serif;
        }

        /* PRODUCT LAYOUT */
        .product-layout {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 70px;
        }

        /* SLIDER */
        .product-images {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-images img {
            width: 370px;
            height: 370px;
            object-fit: cover;
            border-radius: 20px;
        }

        .product-slider .owl-dots {
            margin-top: 15px;
        }

        /* INFO */
        .product-details h1 {
            font-size: 34px;
            font-weight: 700;
        }

        .price {
            display: block;
            font-size: 26px;
            color: #f28123;
            margin: 15px 0;
        }

        .description {
            color: #555;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        /* BUY */
        .buy-row {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .buy-row input {
            width: 90px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .buy-row button {
            background: #f28123;
            color: #fff;
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* META */
        .meta {
            margin-top: 25px;
            color: #333;
            font-size: 14px;
        }

        /* RELATED */
        .related-products {
            margin-top: 100px;
        }

        .related-products h2 {
            font-size: 28px;
            margin-bottom: 35px;
        }

        .related-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 30px;
        }

        .related-item {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .07);
            text-decoration: none;
            color: inherit;
            transition: transform .25s ease;
        }

        .related-item:hover {
            transform: translateY(-6px);
        }

        .related-item img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .related-item .info {
            padding: 18px;
            text-align: center;
        }

        .related-item h3 {
            font-size: 17px;
            margin-bottom: 6px;
        }

        .related-item span {
            color: #f28123;
            font-weight: 600;
        }

        /* PRODUCT IMAGES SECTION */
        .product-images-section {
            margin-top: 80px;
            padding: 40px 0;
        }

        .product-images-section h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #222;
        }

        .images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .image-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .image-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .image-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .no-images {
            color: #888;
            font-size: 16px;
            padding: 20px;
            text-align: center;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .product-layout {
                grid-template-columns: 1fr;
            }

            .product-images img {
                height: 420px;
            }
        }
    </style>
    <div class="product-page">

        <!-- PRODUCT -->
        <div class="product-layout">

            <!-- LEFT : SLIDER -->
            <div class="product-images">
                <img src="{{ asset($product->imagepath) }}"
                    alt="{{ session('locale') == 'ar' ? $product->name : $product->name_en }}">
            </div>

            <!-- RIGHT : INFO -->
            <div class="product-details">
                <h1>{{ session('locale') == 'ar' ? $product->name : $product->name_en }}</h1>

                <span class="price">${{ $product->price }}</span>

                <p class="description">{{ session('locale') == 'ar' ? $product->description : $product->description_en }}
                </p>

                <form method="POST" action="/singleproducttocart">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="buy-row">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit">
                            <i class="fas fa-cart-plus"></i>
                            {{ __('messages.add_to_cart') }}
                        </button>
                    </div>
                </form>

                <div class="meta">
                    {{ __('messages.category') }}:
                    <strong>{{ session('locale') == 'ar' ? $product->category->name : $product->category->name_en }}</strong><br>
                    {{ __('messages.stock') }}: {{ $product->quantity }}
                </div>
            </div>

        </div>

        <!-- PRODUCT IMAGES -->
        <section class="product-images-section">
            <h2>{{ __('messages.product_images') }}</h2>
            @if ($product->productPhotos->count() > 0)
                <div class="images-grid">

                    @foreach ($product->productPhotos as $photo)
                        <div class="image-card">
                            <img src="{{ asset($photo->photo_path) }}"
                                alt="{{ session('locale') == 'ar' ? $product->name : $product->name_en }}">
                        </div>
                    @endforeach
                </div>
            @else
                <p class="no-images">{{ __('messages.no_additional_images') }}</p>
            @endif
        </section>

        <!-- RELATED PRODUCTS -->
        <section class="related-products">
            <h2>{{ __('messages.you_may_also_like') }}</h2>

            <div class="related-list">
                @foreach ($relatedProducts as $item)
                    <a href="/singleproduct/{{ $item->id }}" class="related-item">
                        <img src="{{ asset($item->imagepath) }}"
                            alt="{{ session('locale') == 'ar' ? $item->name : $item->name_en }}">

                        <div class="info">
                            <h3>{{ session('locale') == 'ar' ? $item->name : $item->name_en }}</h3>
                            <span>${{ $item->price }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

    </div>
@endsection