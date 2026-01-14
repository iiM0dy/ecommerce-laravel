@extends('layouts.master')

@push('styles')
    <style>
        /* Wrapper */
        .table-wrapper {
            background: #fff;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        /* Table */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table thead th {
            background: #f8f9fb;
            color: #444;
            font-weight: 600;
            padding: 14px;
            border-bottom: 2px solid #eee;
        }

        .custom-table tbody td {
            padding: 14px;
            vertical-align: middle;
            border-bottom: 1px solid #eee;
        }

        .custom-table tbody tr:hover {
            background-color: #fafafa;
        }

        /* Product Image */
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #eee;
        }

        /* Quantity badge */
        .qty-badge {
            background: #eef2ff;
            color: #4338ca;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        /* Action buttons */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn-edit,
        .btn-delete {
            padding: 6px 14px;
            font-size: 13px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s ease;
        }

        .btn-edit {
            background: #e0f2fe;
            color: #0369a1;
        }

        .btn-edit:hover {
            background: #bae6fd;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        /* DataTables inputs */
        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 6px 10px;
        }

        /* Pagination */
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 15px;
            text-align: center;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 8px !important;
            margin: 0 3px;
        }
    </style>
@endpush

@section('content')
    <div class="container my-5">
        <a href="/addproduct" class="btn-edit"><i class="fas fa-plus"></i> Add Product</a>
        <div class="table-wrapper">
            <table id="myTable" class="custom-table display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="qty-badge">{{ $product->quantity }}</span>
                            </td>
                            <td>
                                <img src="{{ asset($product->imagepath) }}" class="product-img" alt="Product Image">
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="/editproduct/{{ $product->id }}" class="btn-edit">Edit</a>
                                    <a href="/deleteproduct/{{ $product->id }}" class="btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                        Delete
                                    </a>
                                    <a href="/addproductimage/{{ $product->id }}" class="btn-edit">Add Image</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                pageLength: 6,
                lengthChange: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
@endpush
