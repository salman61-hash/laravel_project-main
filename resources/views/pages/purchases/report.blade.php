@extends('layout.backend.main')

@section('page_content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">


                        <h2 class="mb-4">Purchase Report</h2>

                        <form method="POST" action="{{ url('/purchase-report') }}">
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
                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Generate Report</button>
                                </div>
                            </div>
                        </form>

                        @if (!empty($purchases))
                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Supplier</th>
                                        <th>User</th>
                                        <th>Purchase Date</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <td>{{ $purchase->id }}</td>
                                <td>{{ $purchase->supplier->name }}</td>
                                <td>{{optional($purchase->user) ->name }}</td>
                                <td>{{ $purchase->purchase_date }}</td>
                                <td>{{ $purchase->total_amount }}</td>
                                <td>{{ $purchase->payment_status->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="mt-4 text-center">No purchases found for the selected date range.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
