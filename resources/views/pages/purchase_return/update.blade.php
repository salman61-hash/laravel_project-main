@extends('layout.backend.main')

@section('page_content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Update Purchase Return</h5>
            </div>
            <div class="card-body">
                <form action="{{ url("purchase-returns/{$purchaseReturn->id}") }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Purchase ID -->
                    <div class="input-block mb-3 row">
                        <label class="col-lg-3 col-form-label">Purchase ID</label>
                        <div class="col-lg-9">
                            <input type="number" class="form-control" name="purchase_id"
                                value="{{ old('purchase_id', $purchaseReturn->purchase_id) }}">
                            @error('purchase_id')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <!-- Product ID -->
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select name="product_id" class="form-control @error('product_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('product_id', $purchaseReturn->product_id) == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Refund Amount -->
                    <div class="mb-3">
                        <label for="refund_amount" class="form-label">Refund Amount</label>
                        <input type="number" name="refund_amount"
                            class="form-control @error('refund_amount') is-invalid @enderror"
                            value="{{ old('refund_amount', $purchaseReturn->refund_amount) }}" step="0.01"
                            placeholder="Enter Refund Amount" required>
                        @error('refund_amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Return Date -->
                    <div class="mb-3">
                        <label for="return_date" class="form-label">Return Date</label>
                        <input type="date" name="return_date"
                            class="form-control @error('return_date') is-invalid @enderror"
                            value="{{ old('return_date', $purchaseReturn->return_date) }}" required>
                        @error('return_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
