@extends('layout.backend.main')

@section('page_content')

{{-- <div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Update Purchase</h5>
        </div>
        <div class="card-body">

                <!-- Supplier ID -->
                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier</label>
                    <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Select Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id', $purchase->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- User ID -->
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $purchase->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Purchase Date -->
                <div class="mb-3">
                    <label for="purchase_date" class="form-label">Purchase Date</label>
                    <input type="date" name="purchase_date" class="form-control @error('purchase_date') is-invalid @enderror" value="{{ old('purchase_date', $purchase->purchase_date) }}" required>
                    @error('purchase_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Total Amount -->
                <div class="mb-3">
                    <label for="total_amount" class="form-label">Total Amount</label>
                    <input type="number" name="total_amount" class="form-control @error('total_amount') is-invalid @enderror" value="{{ old('total_amount', $purchase->total_amount) }}" step="0.01" placeholder="Enter Total Amount" required>
                    @error('total_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Payment Status -->
                <div class="mb-3">
                    <label for="payment_status_id" class="form-label">Payment Status</label>
                    <select name="payment_status_id">
                        @foreach($payment_statuses as $status)
                            <option value="{{ $status->id }}" {{ old('payment_status_id', $purchase->payment_status_id ?? '') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('payment_status_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

        </div>
    </div>
</div>
 --}}








<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Purchase Invoice</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body { background-color: #f8f9fa; }
    .invoice-box {
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
      background-color: #ffffff;
      transition: 0.3s ease-in-out;
    }
    .invoice-box:hover { transform: translateY(-5px); }
    h2 { color: #007bff; }
    .table-primary th { background-color: #0056b3; color: white; }
    .btn-success, .btn-danger { font-weight: bold; }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="invoice-box">
      <h2 class="text-center mb-4">💳 Purchase Bill</h2>
      <div class="d-flex justify-content-between mb-4">
        <div>
          <h5>📦 Supplier Information</h5>
          Name: ABC Supplier<br>
          Address: 123 Main St, Cityville<br>
          Phone: (123) 456-7890
        </div>
        <div class="text-end">
          <h5>🧾 Invoice Details</h5>
          Invoice #: INV-001<br>
          Date: 14 Feb 2025<br>
          Due Date: 28 Feb 2025
        </div>
      </div>
      <table class="table table-hover table-bordered">
        <thead class="table-primary">
          <tr>
            <th>Sl</th><th>Item</th><th>Quantity</th><th>Unit Price</th><th>Total</th><th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td><td>Product B</td><td>5</td><td>$20.00</td><td>$100.00</td>
            <td><button class="btn btn-success">✅ Add</button></td>
          </tr>
          <tr>
            <td>2</td><td>Product A</td><td>10</td><td>$15.00</td><td>$150.00</td>
            <td><button class="btn btn-danger">❌ Remove</button></td>
          </tr>
        </tbody>
      </table>
      <div class="text-end">
        <p><strong>💰 Subtotal:</strong> $250.00</p>
        <p><strong>💳 Discount:</strong> $25.00</p>
        <p><strong>💸 Tax (10%):</strong> $25.00</p>
        <p><strong>💯 Total Amount:</strong> $275.00</p>
        <p><strong>💲 Payment Status:</strong> <span class="badge bg-warning">Pending</span></p>
      </div>
    </div>
  </div>
</body>
</html>


@endsection
