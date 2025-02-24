@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add Purchase Return</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('purchase_return') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier</label>
                    <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
                        <option value="">Select Supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="purchase_id" class="form-label">Purchase ID</label>
                    <input type="text" name="purchase_id" class="form-control @error('purchase_id') is-invalid @enderror" value="{{ old('purchase_id') }}" placeholder="Enter Purchase ID">
                    @error('purchase_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="return_reason" class="form-label">Return Reason</label>
                    <textarea name="return_reason" class="form-control @error('return_reason') is-invalid @enderror" placeholder="Enter reason for return">{{ old('return_reason') }}</textarea>
                    @error('return_reason')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="return_amount" class="form-label">Return Amount</label>
                    <input type="text" name="return_amount" class="form-control @error('return_amount') is-invalid @enderror" value="{{ old('return_amount') }}" placeholder="Enter return amount">
                    @error('return_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
