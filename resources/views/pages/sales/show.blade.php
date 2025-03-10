<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sales-box {
            padding: 25px;
            border-radius: 12px;
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

        /* Hide print button during printing */
        @media print {
            .btn-process, .print_btn {
                display: none;
            }
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
                    Name: {{$sale->customer->name}} <br>
                    Contact:{{$sale->customer->phone}} <br>
                    Email: {{$sale->customer->email}}
                </div>
                <div class="text-start">
                    @php
                    $subtotal = null;
                    $vat = null;
                    $grandtotal = null;
                    $totaldiscount = null;
                    @endphp
                    <strong>Invoice Details:</strong><br>
                    Invoice #: SAL-100{{$sale->id}}<br>
                    Date: {{ $sale->sale_date }}<br>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr class="table-dark">
                        <th>Sl</th>
                        <th>Item</th>
                        <th>Coupon</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Sub-total</th>
                    </tr>
                    @foreach ($saleDetails as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->cupon->name }}</td>
                        <td> {{ $item->quantity }}</td>
                        <td> {{ $item->price }}</td>
                        <td> {{ $item->quantity * $item->price }}</td>
                        <td> {{ $item->discount }}</td>
                        <td> {{ $item->quantity * $item->price - $item->discount }}</td>
                        @php
                        $subtotal += $item->quantity * $item->price - $item->discount;
                        $totaldiscount += $item->discount;
                        @endphp
                    </tr>
                    @endforeach
                </thead>
            </table>

            <div class="text-end">
                <p>Subtotal:{{$subtotal}}</p>
                <p>Vat (10%):{{$subtotal * .10}} </p>
                <p>Grand Total:{{$subtotal + $subtotal * .10}}</p>

                <div class="container">
                    <p class="total-summary text-start">
                        Total-Discount:{{$totaldiscount}}
                    </p>
                </div>

                <div class="mb-3">
                    <label for="payment_status_id" class="form-label">Payment Status: {{optional($sale->payment_status)->name }}</label>
                </div>
            </div>

            <div class="container text-center mt-5">
                <button class="print_btn btn btn-primary btn-lg px-4 py-2 shadow btn_process" onclick="window.print()">
                    <i class="fas fa-file-invoice"></i> Print
                </button>
            </div>
        </div>
    </div>


    <script>
        function hideButtonAndPrint() {
            // Hide the print button
            document.getElementById("printButton").style.display = "none";
            // Trigger the print dialog
            window.print();
        }
    </script>

</body>

</html>
