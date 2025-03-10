@extends('layout.backend.main')

@section('page_content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Debit Note</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f3f4f6;
            }

            .invoice-box {
                background: linear-gradient(135deg, #ffffff, #f8f9fa);
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                border: 2px solid #007bff;
            }

            .table th {
                background: #007bff;
                color: white;
                border-color: #0056b3;
                text-transform: uppercase;
                text-align: center;
            }

            .table td {
                border-color: #dee2e6;
            }

            .header-text {
                font-size: 26px;
                font-weight: bold;
                color: #007bff;
                text-transform: uppercase;
            }

            .debit-note-btn {
                background: #007bff;
                color: white;
                font-size: 20px;
                font-weight: bold;
                padding: 10px 20px;
                border-radius: 6px;
                border: none;
                transition: 0.3s;
            }

            .debit-note-btn:hover {
                background: #0056b3;
            }

            .print-btn {
                background: #28a745;
                color: white;
                font-size: 18px;
                padding: 8px 20px;
                border-radius: 6px;
                border: none;
                transition: 0.3s;
            }

            .print-btn:hover {
                background: #218838;
            }

            textarea {
                border: 1px solid #ced4da;
                border-radius: 4px;
                padding: 8px;
                width: 100%;
                height: 100px;
                /* Ensure proper height */
                resize: vertical;
                /* Allow vertical resizing */
                font-size: 14px;
                /* Improve text readability */
            }

            .table td button {
                background: #dc3545;
                color: white;
                font-size: 14px;
                border-radius: 6px;
                border: none;
                padding: 5px 10px;
                transition: 0.3s;
            }

            .table td button:hover {
                background: #c82333;
            }

            .table td button.add-btn {
                background: #007bff;
            }

            .table td button.add-btn:hover {
                background: #0056b3;
            }
        </style>
    </head>

    <body>

        {{-- @php
        print_r($item);
    @endphp --}}

        <div class="container mt-5">
            <div class="invoice-box">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Debit Note No:</strong> <span class="text-primary">{{ $purchaseReturn->id }}</span></p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p><strong>Date:</strong>{{ $purchaseReturn->return_date }}</p>
                    </div>
                </div>

                <div class="text-center">
                    <h2 class="header-text">Imran Brothers</h2>
                    <p class="text-muted">Matitola, Bangladesh</p>
                    <button class="debit-note-btn">Debit Note</button>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h5><strong>Supplier:</strong> <span
                                class="text-primary">{{ $purchaseReturn->suppliers->name }}</span></h5>
                        <p><strong>Address:</strong>{{ $purchaseReturn->suppliers->address }}</p>
                        <p><strong>Reference No:</strong> SUP-{{ $purchaseReturn->suppliers->id }}</p>
                    </div>

                </div>

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr class="table-success text-dark">
                            <th>Sl. No</th>
                            <th>Product</th>
                            <th>Description of Goods & Reason for Return</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>Sub-Total</th>

                        </tr>

                        @foreach ($purchasereturnDetails as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$item->products->name}}</td>
                                <td>
                                    <textarea rows="3" placeholder="Enter reason for return...">{{$item->description}}</textarea>
                                </td>
                                <td>{{$item->quantity}}</td>

                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity*$item->price}}</td>
                                <td>{{$item->discount}}</td>
                                <td>{{$item->quantity*$item->price-$item->discount}}</td>

                            </tr>
                        @endforeach

                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">Total Amount (Taka)</th>
                            <th>11,000</th>
                        </tr>
                    </tfoot>
                </table>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <p><strong>Amount (in words):</strong> <span class="text-primary">Twelve Thousand Only</span></p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p><strong>Manager:</strong> Business Executive</p>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="print-btn" onclick="window.print()">Print</button>
                </div>

            </div>
        </div>

    </body>

    </html>
@endsection
