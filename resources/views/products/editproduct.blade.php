<style>
    .contact-wrapper {
        max-width: 720px;
        margin: 80px auto;
        padding: 40px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    }

    .form-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 30px;
        color: #333;
        text-align: center;
    }

    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .form-row {
        display: flex;
        gap: 20px;
    }

    .form-row.full {
        flex-direction: column;
    }

    .contact-form input,
    .contact-form textarea,
    .contact-form select {
        width: 100%;
        padding: 14px 16px;
        border-radius: 10px;
        border: 1px solid #e2e2e2;
        font-size: 15px;
        background: #fafafa;
        outline: none;
        transition: all 0.25s ease;
    }

    .contact-form textarea {
        min-height: 160px;
        resize: vertical;
    }

    .contact-form input:focus,
    .contact-form textarea:focus,
    .contact-form select:focus {
        background: #fff;
        border-color: #f28123;
        box-shadow: 0 0 0 4px rgba(242, 129, 35, 0.15);
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }

    .contact-form button {
        padding: 14px 42px;
        background: linear-gradient(135deg, #f28123, #e96b0c);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .contact-form button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(242, 129, 35, 0.35);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }

        .form-actions {
            justify-content: stretch;
        }

        .contact-form button {
            width: 100%;
        }
    }
</style>
@extends('layouts.master')

@section('content')
    <div class="contact-wrapper">

        <h2 class="form-title">{{ __('messages.edit_product') }}</h2>

        <form class="contact-form" method="POST" enctype="multipart/form-data" action="{{ url('/updateproduct') }}">
            @csrf

            <div class="form-row">
                <input type="hidden" name="productid" value="{{ $product->id }}">
                <input type="text" value="{{ session('locale') == 'ar' ? $product->name : $product->name_en }}" name="name"
                    placeholder="{{ __('messages.product_title') }}">
                <input type="number" value="{{ $product->price }}" name="price" placeholder="{{ __('messages.price') }}">
                <input type="number" value="{{ $product->quantity }}" name="quantity"
                    placeholder="{{ __('messages.quantity') }}">
            </div>

            <div class="form-row full">
                <textarea name="description"
                    placeholder="{{ __('messages.product_description') }}">{{ session('locale') == 'ar' ? $product->description : $product->description_en }}</textarea>
            </div>

            <div class="form-row full">
                <select name="category_id">
                    <option disabled selected>{{ __('messages.select_category') }}</option>
                    @foreach ($categories as $category)
                        <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ session('locale') == 'ar' ? $category->name : $category->name_en }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Current image preview --}}
            <div class="form-row full">
                <label>{{ __('messages.current_image') }}</label>
                <img src="{{ asset($product->imagepath) }}"
                    style="width:120px;height:120px;object-fit:cover;border-radius:12px;">
            </div>

            {{-- New image upload --}}
            <div class="form-row full">
                <input type="file" name="image">

                <small style="color:#888">{{ __('messages.leave_empty_image') }}</small>
            </div>

            <div class="form-actions">
                <button type="submit">{{ __('messages.edit_product') }}</button>
            </div>

        </form>
    </div>
@endsection