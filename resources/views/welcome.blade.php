@extends('layout.master')

@section('content')
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh & Organic</p>
                                <h1>Delicious Seasonal Fruits</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Fruit Collection</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh Everyday</p>
                                <h1>100% Organic Collection</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Visit Shop</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h1>Get December Discount</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Visit Shop</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CATEGORIES DESIGN --}}
    <style>
        .category-card {
            display: block;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .category-image-wrapper img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .category-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px 0;
            background: rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .category-overlay h3 {
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            text-transform: capitalize;
        }
    </style>

    <div class="category-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Categories</h3>
                        <p>Explore products by categories and find what you need quickly</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="/products/{{ $category->id }}" class="category-card">
                            <div class="category-image-wrapper">
                                <img src="{{ asset($category->imagepath) }}" alt="{{ $category->name }}">
                                <div class="category-overlay">
                                    <h3>{{ $category->name }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- REVIEWS SECTION --}}
    <style>
        .testimonial-sliders .single-testimonial-slider {
            background: #fff;
            border-radius: 16px;
            padding: 30px 25px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
            margin: 10px;
        }

        .client-avatar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #f28123;
        }

        .client-meta h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .client-meta h3 span {
            display: block;
            font-size: 14px;
            font-weight: 400;
            color: #f28123;
        }

        .testimonial-body {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
            margin: 15px 0;
        }

        .last-icon {
            font-size: 24px;
            color: #f28123;
        }

        /* Owl Carousel nav styling */
        .owl-nav button {
            background: #3498db;
            color: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            line-height: 36px;
            font-size: 18px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .owl-nav button.owl-prev {
            left: -20px;
        }

        .owl-nav button.owl-next {
            right: -20px;
        }

        .owl-nav button:hover {
            background: #2980b9;
        }

        .client-avatar {
            width: 90px;
            height: 90px;
            margin: 0 auto 15px;
            border-radius: 50%;
            overflow: hidden;
            /* CRITICAL */
            border: 3px solid #f28123;
            flex-shrink: 0;
        }

        .client-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* PREVENTS STRETCH */
            display: block;
        }
    </style>
    <script>
        $(document).ready(function() {
            $(".testimonial-sliders").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000, // 4 seconds
                smartSpeed: 800,
                nav: true,
                dots: true,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
    </script>

    <div class="testimonial-section mt-150 mb-150">
        <div class="container">
            <div class="testimonial-sliders owl-carousel owl-theme">
                @foreach ($reviews as $review)
                    <div class="single-testimonial-slider">
                        <div class="client-avatar">
                            <img src="assets/img/avaters/avatar1.png" alt="{{ $review->name }}">
                        </div>
                        <div class="client-meta">
                            <h3>{{ $review->name }} <span>{{ $review->subject }}</span></h3>
                            <p class="testimonial-body">{{ $review->review }}</p>
                            <div class="last-icon"><i class="fas fa-quote-right"></i></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
