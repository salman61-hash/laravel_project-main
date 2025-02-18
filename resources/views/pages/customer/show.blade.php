@extends('layout.backend.main')

@section('page_content')

{{-- <div class="container">
    <h2 class="my-4 py-2 text-center rounded card-header bg-primary text-white">Update Customer Information</h2>


        <div class="row">
            <!-- Left Side -->
            <div class="col-md-6">
                <!-- Input Fields for the Left Side -->
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}">
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Phone</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                        @error('phone')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9">
                        <input type="email" class="form-control" name="email" value="{{ $customer->email }}">
                        @error('email')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Address</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="address">{{ $customer->address }}</textarea>
                        @error('address')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>



        </div>


</div> --}}






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Receipt</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center bg-primary text-white">
                <h3>Customer History</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-4">
                        <h3>Customer</h3>
                        <p>Name:xyz</p>
                        <p>Address: 123 Street, City</p>
                        <p>Phone: +123 456 789</p>
                        <p>Email: support@bank.com</p>
                    </div>


                </div>

                <hr>
                <h5>History:</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Accounts Title</th>
                            <th>Amount_receive</th>
                            <th>Due</th>
                            <th>Payment_status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>04-12-2024</td>
                            <td>Purchase</td>
                            <td>1000000</td>
                            <td>1000000</td>
                            <td>On Credit</td>


                        </tr>
                        <tr>
                            <td>2</td>
                            <td>04-01-2025</td>
                            <td>Payment</td>
                            <td>500000</td>
                            <td>500000</td>

                            <td>Cash</td>

                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                <div class="text-end">
                    <h5>Total Paid: 500000</h5>
                    <h5>Remaining Balance: 500000</h5>
                </div>
                <hr>
                <div class="text-center">
                    <p><em>This receipt is generated electronically and does not require a signature.</em></p>
                </div>
            </div>
            <div class="card-footer text-center bg-light">
                <button class="btn btn-primary" onclick="window.print()">Print Receipt</button>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


@endsection
