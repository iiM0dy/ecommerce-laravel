<style>
    /* Container */
.container {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 20px;
    font-family: 'Arial', sans-serif;
}

/* Heading */
h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Form */
.photo-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    background-color: #f9f9f9;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

.photo-form label {
    font-weight: bold;
    color: #555;
}

.photo-form input[type="file"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.photo-form small {
    color: #888;
    font-size: 0.9rem;
}

.photo-form button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.photo-form button:hover {
    background-color: #45a049;
}

/* Gallery */
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 40px;
}

.gallery-item {
    position: relative;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff;
}

.gallery-item img {
    width: 100%;
    display: block;
    border-bottom: 1px solid #ddd;
}

.delete-btn {
    display: block;
    text-align: center;
    padding: 8px 0;
    background-color: #f44336;
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.2s ease;
}

.delete-btn:hover {
    background-color: #d32f2f;
    color: #333
}

</style>
@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Add Product Photo</h2>

    <!-- Upload Form -->
    <form action="{{ url('/storeproductphoto') }}" enctype="multipart/form-data" method="post" class="photo-form">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        
        <label for="photo">Choose Image</label>
        <input type="file" name="image" id="image">


        <button type="submit">Add Photo</button>
    </form>

    <!-- Product Images Gallery -->
    <div class="gallery">
        @foreach ($productImages as $photo)
            <div class="gallery-item">
                <img src="{{ asset($photo->photo_path) }}" alt="Product Photo">
                <a href="/deleteproductphoto/{{ $photo->id }}" class="delete-btn"
                   onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
