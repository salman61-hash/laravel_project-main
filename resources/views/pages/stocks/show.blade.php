@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Update Stock</h5>
        </div>
        <div class="card-body">


                <!-- Product ID -->
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select name="product_id" class="form-control @error('product_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id', $stock->product_id) == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $stock->quantity) }}" placeholder="Enter Stock Quantity" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Minimum Stock Level -->
                <div class="mb-3">
                    <label for="min_stock_level" class="form-label">Minimum Stock Level</label>
                    <input type="number" name="min_stock_level" class="form-control @error('min_stock_level') is-invalid @enderror" value="{{ old('min_stock_level', $stock->min_stock_level) }}" placeholder="Enter Minimum Stock Level" required>
                    @error('min_stock_level')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Payment Status -->



        </div>
    </div>
</div>

@endsection
