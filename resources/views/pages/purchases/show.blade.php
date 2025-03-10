@extends('layout.backend.main')

@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="container mt-4">
                        <div class="invoice-box p-4 border rounded bg-light">
                            <h2 class="text-center text-primary mb-4">💳 Purchase Bill</h2>

                            <div class="d-flex justify-content-between mb-4">
                                <div>
                                    <h5>📦 Supplier Information</h5>
                                    <p>
                                        <strong>Name:</strong> {{ $purchase->supplier->name }}<br>
                                        <strong>Address:</strong> {{ $purchase->supplier->address }}<br>
                                        <strong>Phone:</strong> {{ $purchase->supplier->phone }}
                                    </p>
                                </div>
                                <div class="text-end">
                                    <h5>🧾 Invoice Details</h5>
                                    <p>
                                        <strong>Purchase ID:</strong> INV-{{ $purchase->id }}<br>
                                        <strong>Date:</strong> {{ $purchase->purchase_date }}<br>
                                        <strong>Due Date:</strong> {{ $purchase->due_date }}
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                            <th>Discount</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                            $totaldiscount = 0;
                                        @endphp
                                        @foreach ($purchaseDetails as $key => $item)
                                            @php
                                                $itemTotal = $item->quantity * $item->price;
                                                $itemSubtotal = $itemTotal - $item->discount;
                                                $subtotal += $itemSubtotal;
                                                $totaldiscount += $item->discount;
                                            @endphp
                                            <tr class="text-center">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ optional($item->product)->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->price, 2) }}</td>
                                                <td>{{ number_format($itemTotal, 2) }}</td>
                                                <td>{{ number_format($item->discount, 2) }}</td>
                                                <td>{{ number_format($itemSubtotal, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-end">
                                <p><strong>Subtotal:</strong> {{ number_format($subtotal, 2) }}</p>
                                <p><strong>VAT (10%):</strong> {{ number_format($subtotal * 0.10, 2) }}</p>
                                <p><strong>Grand Total:</strong> {{ number_format($subtotal + ($subtotal * 0.10), 2) }}</p>

                                <p class="mt-3 text-start"><strong>Total Discount:</strong> {{ number_format($totaldiscount, 2) }}</p>

                                <p><strong>Payment Status:</strong> {{ optional($purchase->payment_statuses)->name }}</p>
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-primary btn-lg shadow" onclick="window.print()">
                                    <i class="fas fa-print"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .btn {
                display: none;
            }
        }
    </style>
@endsection
