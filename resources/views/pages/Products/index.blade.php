@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Product List</h4>
            <a href="{{ url('/product/create') }}" class="btn btn-light">
                <i class="fas fa-plus-circle"></i> Add Product
            </a>
        </div>

        <div class="mb-3 mt-3">
            <!-- Search form centered -->
            <form action="{{ url('product/search') }}" method="get" class="d-flex justify-content-center">
                @csrf
                <div class="input-group" style="max-width: 400px;">
                    <input type="text" name="query" class="form-control rounded" placeholder="Search products..." required>
                    <button type="submit" class="btn btn-warning d-flex align-items-center rounded">
                        <i class="fas fa-search me-2"></i> Search
                    </button>
                </div>
            </form>
        </div>




        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Category Id</th>
                            {{-- <th>Supplier</th> --}}
                            <th>Photo</th>
                            <th>SKU</th>
                            <th>Barcode</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                            {{-- <th>Stock</th> --}}
                            <th>Min. Stock</th>
                            <th>Unit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->categories->name }}</td>
                                {{-- <td>{{ $purchase->supplier->name }}</td> --}}
                                <td>
                                    <img src="{{ asset('photo/' . $product->photo) }}" alt="{{ $product->name }}"
                                        class="img-thumbnail" width="50">
                                </td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->barcode }}</td>
                                <td>${{ number_format($product->purchase_price, 2) }}</td>
                                <td>${{ number_format($product->selling_price, 2) }}</td>
                                {{-- <td><span class="badge bg-success">{{ $product->stock }}</span></td> --}}
                                <td><span class="badge bg-danger">{{ $product->min_stock }}</span></td>
                                <td>{{ $product->unit }}</td>
                                <td>
                                    <a href="{{ url("product/{$product->id}") }}" class="btn btn-sm btn-info">
                                        Show<i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url("product/{$product->id}/edit") }}" class="btn btn-sm btn-warning">
                                        Update<i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ url("product/{$product->id}") }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center text-danger">No Products Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    {!! $products->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
