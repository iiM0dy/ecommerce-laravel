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

    .product-name>a {
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

    /* ORDER DETAILS STYLING */
    .order-details-wrap {
        position: sticky;
        top: 120px;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 16px;
        padding: 28px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid #f0f0f0;
    }

    .order-details {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .order-details thead tr {
        background: linear-gradient(135deg, #f28123, #e96b0c);
        color: #fff;
    }

    .order-details th {
        padding: 14px 12px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.5px;
    }

    .order-details-body tr {
        border-bottom: 1px solid #e8e8e8;
        transition: background-color 0.3s ease;
    }

    .order-details-body tr:hover {
        background-color: #f9f9f9;
    }

    .order-details td {
        padding: 12px;
        font-size: 14px;
        color: #333;
    }

    .order-details td:last-child {
        text-align: right;
        font-weight: 600;
        color: #f28123;
    }

    .checkout-details tr {
        background-color: #fff3e0;
        border-top: 2px solid #f28123;
    }

    .checkout-details td {
        padding: 16px 12px;
        font-size: 16px;
        font-weight: 700;
    }

    .checkout-details td:first-child {
        color: #333;
    }

    .checkout-details td:last-child {
        color: #f28123;
        font-size: 18px;
    }

    .boxed-btn {
        width: 100%;
        display: block;
        padding: 14px 20px;
        background: linear-gradient(135deg, #f28123, #e96b0c);
        color: #fff;
        text-align: center;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: 15px;
        border: none;
        cursor: pointer;
        font-size: 15px;
        box-shadow: 0 6px 20px rgba(242, 129, 35, 0.3);
    }

    .boxed-btn:hover {
        background: linear-gradient(135deg, #e96b0c, #d85a05);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(242, 129, 35, 0.4);
        text-decoration: none;
        color: #fff;
    }

    .boxed-btn:active {
        transform: translateY(0);
        box-shadow: 0 4px 12px rgba(242, 129, 35, 0.3);
    }
</style>

@extends('layouts.master')
@section('content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            @if ($orders->count() > 0)
                                @foreach ($orders as $order)
                                    <div class="card single-accordion">
                                        <div class="card-header" id="heading{{ $order->id }}">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse{{ $order->id }}" aria-expanded="false"
                                                    aria-controls="collapse{{ $order->id }}">
                                                    {{ __('messages.order_number') }} #{{ $order->id }}
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse{{ $order->id }}" class="collapse"
                                            aria-labelledby="heading{{ $order->id }}" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="billing-address-form mb-4">
                                                    <h5 class="mb-3">{{ __('messages.billing_information') }}</h5>
                                                    <form action="">
                                                        <p><input type="text" value="{{ $order->name }}" readonly name="name"
                                                                placeholder="{{ __('messages.name') }}"></p>
                                                        <p><input type="email" value="{{ $order->email }}" readonly name="email"
                                                                placeholder="{{ __('messages.email') }}"></p>
                                                        <p><input type="text" value="{{ $order->address }}" readonly name="address"
                                                                placeholder="{{ __('messages.address') }}"></p>
                                                        <p><input type="tel" value="{{ $order->phone }}" readonly name="phone"
                                                                placeholder="{{ __('messages.phone') }}"></p>
                                                        <p><input type="tel" value="{{ $order->created_at }}" readonly
                                                                name="created_at" placeholder="{{ __('messages.created_at') }}"></p>
                                                        <p>
                                                            <textarea name="note" readonly cols="30" rows="5"
                                                                placeholder="{{ __('messages.note') }}">{{ $order->note }}</textarea>
                                                        </p>
                                                    </form>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="card-details">
                                                            <h5 class="mb-3">{{ __('messages.order_items') }}</h5>
                                                            <div class="cart-card">
                                                                <table class="cart-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{{ __('messages.product') }}</th>
                                                                            <th>{{ __('messages.name') }}</th>
                                                                            <th>{{ __('messages.price') }}</th>
                                                                            <th>{{ __('messages.quantity') }}</th>
                                                                            <th>{{ __('messages.total') }}</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php
                                                                            $orderTotal = 0;
                                                                        @endphp
                                                                        @foreach ($order->orderDetails as $detail)
                                                                            @php
                                                                                $lineTotal = $detail->product->price * $detail->quantity;
                                                                                $orderTotal += $lineTotal;
                                                                            @endphp
                                                                            <tr>
                                                                                <td>
                                                                                    <img src="{{ asset($detail->product->imagepath) }}"
                                                                                        alt="">
                                                                                </td>
                                                                                <td class="product-name">
                                                                                    <a
                                                                                        href="/singleproduct/{{ $detail->product->id }}">{{ $detail->product->name }}</a>
                                                                                </td>
                                                                                <td class="product-price">
                                                                                    ${{ number_format($detail->product->price, 2) }}
                                                                                </td>
                                                                                <td>
                                                                                    <div class="qty-control">
                                                                                        <span
                                                                                            class="qty-number">{{ $detail->quantity }}</span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="product-total">
                                                                                    ${{ number_format($lineTotal, 2) }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="order-details-wrap">
                                                            <table class="order-details">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{{ __('messages.order_details') }}</th>
                                                                        <th>{{ __('messages.price') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="order-details-body">
                                                                    <tr>
                                                                        <td>{{ __('messages.product') }}</td>
                                                                        <td>{{ __('messages.total') }}</td>
                                                                    </tr>
                                                                    @foreach ($order->orderDetails as $detail)
                                                                        <tr>
                                                                            <td>{{ $detail->product->name }}</td>
                                                                            <td>${{ number_format($detail->product->price * $detail->quantity, 2) }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tbody class="checkout-details">
                                                                    <tr>
                                                                        <td>{{ __('messages.total') }}</td>
                                                                        <td>${{ number_format($orderTotal, 2) }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info text-center" role="alert">
                                    <h3>You have no previous orders</h3>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection