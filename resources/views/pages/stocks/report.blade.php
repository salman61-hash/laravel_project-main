@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="mb-4">Stock Report</h2>

                    <!-- Print Button (Initially hidden) -->
                    <button id="printButton" onclick="printReport()" class="btn btn-secondary mb-4" style="display: none;">Print Report</button>

                    <form method="POST" action="{{ url('/stocks-report') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-control"
                                    value="{{ old('start_date', $startDate ?? '') }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="form-control"
                                    value="{{ old('end_date', $endDate ?? '') }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="product_id" class="form-label">Select Product</label>
                                <select id="product_id" name="product_id" class="form-control">
                                    <option value="">All Products</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id', $selectedProduct ?? '') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="remarks" class="form-label">Select Remarks</label>
                            <select id="remarks" name="remarks" class="form-control">
                                <option value="">All</option>
                                <option value="Sales" {{ old('remarks', $remarks ?? '') == 'Sales' ? 'selected' : '' }}>Sales</option>
                                <option value="Purchase" {{ old('remarks', $remarks ?? '') == 'Purchase' ? 'selected' : '' }}>Purchase</option>
                                <option value="Sales Return" {{ old('remarks', $remarks ?? '') == 'Sales Return' ? 'selected' : '' }}>Sales Return</option>
                                <option value="Purchase Return" {{ old('remarks', $remarks ?? '') == 'Purchase Return' ? 'selected' : '' }}>Purchase Return</option>
                                <option value="withdraw" {{ old('remarks', $remarks ?? '') == 'withdraw' ? 'selected' : '' }}>withdraw</option>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                            </div>
                        </div>
                    </form>

                    @if (!empty($stocks))
                        <!-- Show Print Button after report generation -->
                        <script>
                            // Show the print button after generating the report
                            window.onload = function() {
                                document.getElementById('printButton').style.display = 'inline-block';
                            };
                        </script>

                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Remarks</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr class="{{ $stock->remarks == 'Sales' ? 'table-danger' : ($stock->remarks == 'Purchase' ? 'table-success' : ($stock->remarks == 'Sales Return' ? 'table-warning' : 'table-info')) }}">
                                        <td>{{ $stock->id }}</td>
                                        <td>{{ optional($stock->product)->name }}</td>
                                        <td>{{ $stock->quantity }}</td>
                                        <td>{{ $stock->remarks }}</td>
                                        <td>{{ $stock->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="mt-4 text-center">No stocks found for the selected filters.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Function to hide the Print button after printing
    function printReport() {
        document.getElementById('printButton').style.display = 'none'; // Hide the print button
        window.print(); // Trigger the print dialog
    }
</script>
@endsection
