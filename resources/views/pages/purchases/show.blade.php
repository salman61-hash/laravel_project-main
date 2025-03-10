@extends('layout.backend.main')

@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-5">
                        <div class="invoice-box">
                            <h2 class="text-center mb-4">💳 Purchase Bill</h2>
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

                            <table class="table table-hover table-bordered">
                                <thead class="table-primary">
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
                                    @if($purchase->items && $purchase->items->isNotEmpty())
                                        @foreach($purchase->items as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->unit_price, 2) }}</td>
                                                <td>{{ number_format($item->total, 2) }}</td>
                                                <td>{{ number_format($item->discount, 2) }}</td>
                                                <td>{{ number_format($item->subtotal, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">No items found for this purchase.</td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>

                            <div class="text-end">
                                <p><strong>💰 Subtotal:</strong> {{ number_format($purchase->subtotal, 2) }}</p>
                                <p><strong>💸 VAT (10%):</strong> {{ number_format($purchase->vat, 2) }}</p>
                                <p><strong>💯 Total Amount:</strong> {{ number_format($purchase->total_amount, 2) }}</p>
                                <p><strong>💳 Payment Status:</strong> {{ $purchase->payment_status->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
