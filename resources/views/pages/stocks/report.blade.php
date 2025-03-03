@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="mb-4">Stock Report</h2>

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

                        <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                            </div>
                        </div>
                    </form>

                    @if (!empty($stocks))
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Min.stock Leve</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->id }}</td>
                                        <td>{{ optional($stock->product)->name }}</td>
                                        <td>{{ $stock->quantity }}</td>
                                        <td>{{ $stock->min_stock_leve }}</td>
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
