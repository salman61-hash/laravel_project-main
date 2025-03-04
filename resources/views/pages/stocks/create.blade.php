@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <h2 class="mb-4">Add Stock</h2>
    <div class="card p-4 shadow-sm">
        <form action="{{ url('stock') }}" method="POST">
            @csrf

            <!-- Product ID -->
            <div class="mb-3">
                <label for="product_id" class="form-label">Product</label>
                <select name="product_id" class="form-control" required>
                    <option value="" disabled selected>Select Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Quantity -->
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" placeholder="Enter Stock Quantity" required>
            </div>

            <!-- Min Stock Level -->
            {{-- <div class="mb-3">
                <label for="min_stock_level" class="form-label">Minimum Stock Level</label>
                <input type="number" name="min_stock_level" class="form-control" value="{{ old('min_stock_level') }}" placeholder="Enter Minimum Stock Level" required>
            </div> --}}

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
