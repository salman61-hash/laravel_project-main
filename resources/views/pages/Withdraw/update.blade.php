@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Update Withdrawal</h5>
        </div>
        <div class="card-body">
            <form action="{{ url("withdraw/{$withdraw->id}") }}" method="POST">
                @csrf
                @method('PUT')

                <!-- User ID -->
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $withdraw->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Withdraw Type -->
                <div class="mb-3">
                    <label for="withdraw_type_id" class="form-label">Withdraw Type</label>
                    <select name="withdraw_type_id" class="form-control @error('withdraw_type_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Select Withdraw Type</option>
                        @foreach ($withdrawTypes as $type)
                            <option value="{{ $type->id }}" {{ old('withdraw_type_id', $withdraw->withdraw_type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->type_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('withdraw_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product ID -->
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
                        <option value="" disabled selected>Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id', $withdraw->product_id) == $product->id ? 'selected' : '' }}>
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
                    <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $withdraw->quantity) }}" placeholder="Enter Withdraw Quantity">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $withdraw->amount) }}" placeholder="Enter Withdraw Amount" required>
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Withdraw Date -->
                <div class="mb-3">
                    <label for="withdraw_date" class="form-label">Withdraw Date</label>
                    <input type="date" name="withdraw_date" class="form-control @error('withdraw_date') is-invalid @enderror" value="{{ old('withdraw_date', $withdraw->withdraw_date) }}" required>
                    @error('withdraw_date')
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
