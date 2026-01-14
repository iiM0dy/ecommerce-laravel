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
@extends('layout.master')

@section('content')
    <div class="contact-wrapper">

        <h2 class="form-title">Add Review</h2>

        <form class="contact-form" method="POST" action="{{ url('/storereview') }}">
            @csrf

            <div class="form-row">
                <input type="text" name="name" placeholder="Your Name">
                <input type="email" name="email" placeholder="Email Address">
            </div>
            <div class="form-row">
                <input type="text" name="phone" placeholder="Phone Number">
                <input type="text" name="subject" placeholder="Subject">
            </div>

            <div class="form-row full">
                <textarea name="review" placeholder="Enter your review"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit">Add Review</button>
            </div>

        </form>
    </div>
@endsection
