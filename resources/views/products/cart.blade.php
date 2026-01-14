<style>
    .cart-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, .08);
        padding: 25px;
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
    }

    .cart-table th {
        color: #666;
        font-weight: 600;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .cart-table td {
        padding: 18px 10px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f1f1;
    }

    .cart-table tr:last-child td {
        border-bottom: none;
    }

    .cart-table img {
        width: 80px;
        height: 80px;
        border-radius: 12px;
        object-fit: cover;
    }

    .product-name {
        font-weight: 600;
        color: #333;
    }

    .product-price {
        color: #666;
    }

    .product-total {
        font-weight: 700;
        color: #f28123;
    }

    .remove-btn {
        color: #e11d48;
        font-size: 18px;
        transition: .2s;
    }

    .remove-btn:hover {
        color: #be123c;
    }

    .total-box {
        position: sticky;
        top: 120px;
        background: #fff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, .08);
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 16px;
    }

    .total-row strong {
        font-size: 18px;
    }

    .checkout-btn {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #f28123, #e96b0c);
        border-radius: 50px;
        color: #fff;
        font-weight: 600;
        text-align: center;
        display: block;
        margin-top: 20px;
    }

    .qty-control {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .qty-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: none;
        background: #f1f5f9;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s;
    }

    .qty-btn:hover {
        background: #e2e8f0;
    }

    .qty-number {
        min-width: 24px;
        text-align: center;
        font-weight: 600;
    }

    .qty-control form {
        display: inline-flex;
        margin: 0;
    }

    .qty-number {
        min-width: 26px;
        text-align: center;
        font-weight: 600;
        line-height: 32px;
    }
</style>

@extends('layout.master')
@section('content')
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">

                <!-- CART ITEMS -->
                <div class="col-lg-8">
                    <div class="cart-card">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>
                                            <a href="/cartproductremove/{{ $item->id }}" class="remove-btn">
                                                <i class="far fa-window-close"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <img src="{{ asset($item->product->imagepath) }}">
                                        </td>

                                        <td class="product-name">
                                            {{ $item->product->name }}
                                        </td>

                                        <td class="product-price">
                                            ${{ number_format($item->product->price, 2) }}
                                        </td>

                                        <td>
                                            <div class="qty-control">
                                                <form action="/cart/decrease/{{ $item->id }}" method="POST">
                                                    @csrf
                                                    <button class="qty-btn">−</button>
                                                </form>

                                                <span class="qty-number">{{ $item->quantity }}</span>

                                                <form action="/cart/increase/{{ $item->id }}" method="POST">
                                                    @csrf
                                                    <button class="qty-btn">+</button>
                                                </form>
                                            </div>
                                        </td>


                                        <td class="product-total">
                                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TOTAL -->
                <div class="col-lg-4">
                    <div class="total-box">
                        <div class="total-row">
                            <span>Subtotal</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>

                        <div class="total-row">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>

                        <hr>

                        <div class="total-row">
                            <strong>Total</strong>
                            <strong>${{ number_format($total, 2) }}</strong>
                        </div>

                        <a href="/checkout" class="checkout-btn">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
