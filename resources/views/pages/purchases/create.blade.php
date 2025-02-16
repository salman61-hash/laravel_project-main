@extends('layout.backend.main')

@section('page_content')
<div class="container mt-4">
    <h2 class="mb-4">Add Purchase</h2>
    <div class="card p-4 shadow-sm">
        <form action="{{ url('purchases') }}" method="POST">
            @csrf

            <!-- Supplier ID -->
            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select name="supplier_id" class="form-control" required>
                    <option value="" disabled selected>Select Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- User ID -->
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" class="form-control" required>
                    <option value="" disabled selected>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Purchase Date -->
            <div class="mb-3">
                <label for="purchase_date" class="form-label">Purchase Date</label>
                <input type="date" name="purchase_date" class="form-control" value="{{ old('purchase_date') }}" required>
            </div>

            <!-- Total Amount -->
            <div class="mb-3">
                <label for="total_amount" class="form-label">Total Amount</label>
                <input type="number" name="total_amount" class="form-control" value="{{ old('total_amount') }}" step="0.01" placeholder="Enter Total Amount" required>
            </div>

            <div class="mb-3">
                <label for="payment_status_id" class="form-label">Payment Status</label>
                <select name="payment_status_id">
                    @foreach($payment_statuses as $status)
                        <option value="{{ $status->id }}" {{ old('payment_status_id', $purchase->payment_status_id ?? '') == $status->id ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>








            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
