@extends('layout.backend.main')

@section('page_content')

{{-- <div class="container mt-4">
    <h2 class="mb-4">Add Sale</h2>
    <div class="card p-4 shadow-sm">
        <form action="{{ url('sales') }}" method="POST">
            @csrf

            <!-- Customer ID -->
            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer</label>
                <select name="customer_id" class="form-control" required>
                    <option value="" disabled selected>Select Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
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

            <!-- Sale Date -->
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="date" name="sale_date" class="form-control" value="{{ old('sale_date') }}" required>
            </div>

            <!-- Total Amount -->
            <div class="mb-3">
                <label for="total_amount" class="form-label">Total Amount</label>
                <input type="number" name="total_amount" class="form-control" value="{{ old('total_amount') }}" step="0.01" placeholder="Enter Total Amount" required>
            </div>

            <!-- Payment Status -->
            <div class="mb-3">
                <label for="payment_status" class="form-label">Payment Status</label>
                <select name="payment_status" class="form-control" required>
                    <option value="" disabled selected>Select Payment Status</option>
                    @foreach($payment_statuses as $status)
                        <option value="{{ $status->id }}" {{ old('payment_status') == $status->id ? 'selected' : '' }}>
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
</div> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales Invoice</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    .sales-box {
      padding: 25px;
      border-radius: 12px;
      background: linear-gradient(135deg, #e3f2fd, #bbdefb);
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s;
    }
    .sales-box:hover {
      transform: scale(1.02);
    }
    .table th {
      background-color: #42a5f5;
      color: white;
    }
    .total-summary {
      font-size: 1.2rem;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="sales-box">
      <h2 class="text-center mb-4">Sales Invoice 🧾</h2>
      <div class="d-flex justify-content-between mb-4">
        <div>
          <strong>Customer Information:</strong><br>
          Name:


          <select name="customer_id" class="form-control" required>

            <option value="">Select Customer</option>

       @forelse ($customers as $customer)


       <option value="{{$customer->id}}">{{$customer->name}}</option>


       @empty

       <option value="">No Customer Found</option>

       @endforelse

        </select><br>



          Contact: {{ $customer->phone }}<br>
        </div>
        <div class="text-end">
          <strong>Invoice Details:</strong><br>
          Invoice #: SAL-1001<br>
          Date: 14 Feb 2025<br>

        </div>
      </div>

      <table class="table table-bordered">
        <thead >
          <tr class="table-dark">
            <th>Sl</th>
            <th>Item</th>
            <th>Cupon</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Total</th>
            <th>Discount</th>
            <th>Sub-total</th>
            <th>Action</th>
          </tr>

          <tr class="table-pink">
            <td>1</td>
            <td>Product X</td>
            <td>#SAL10</td>
            <td>2</td>
            <td>$50.00</td>
            <td>$100.00</td>
            <td>$100.00</td>
            <td>$100.00</td>
            <td><button class="btn btn-success">✅ Add</button></td>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>2</td>
            <td>Product Y</td>
            <td>#EE5</td>
            <td>1</td>
            <td>$150.00</td>
            <td>$150.00</td>
            <td>$150.00</td>
            <td>$150.00</td>
            <td><button class="btn btn-danger">❌ Remove</button></td>
          </tr>
        </tbody>
      </table>

      <div class="text-end">
        <p class="total-summary">Subtotal: $250.00</p>
        
        <p class="total-summary">Vat (5%): $12.50</p>
        <p class="total-summary">Grand Total: $262.50</p>
        <p><strong>Payment Status:</strong> Paid ✅</p>
      </div>
    </div>
  </div>
</body>
</html>





@endsection


@section('script')

@section('script')
<script>
    $(function() {
        $('#customer_id').on('change', function() {

        });
    });
</script>
@endsection


@endsection
