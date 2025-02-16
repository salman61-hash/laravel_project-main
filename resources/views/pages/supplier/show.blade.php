@extends('layout.backend.main')

@section('page_content')
{{-- <div class="container mt-4">
    <h2 class="mb-4">Add Supplier</h2>
    <div class="card p-4 shadow-sm">

            <input type="hidden"  name="_method"  value="put">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{$result['name']}}" placeholder="Enter Your Name" required>
            </div>

            <div class="mb-3">
                <label for="contact_person" class="form-label">Contact Person</label>
                <input type="text" name="contact_person" class="form-control" value="{{$result['contact_person']}}" placeholder="Enter Contact Person" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{$result['phone']}}" placeholder="Enter Phone Number" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$result['email']}}" placeholder="Enter Email" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{$result['address']}}" placeholder="Enter Address" required>
            </div>

            <div class="d-grid">
               <a href="{{url('suppliers')}}" class="btn btn-primary">Back</a>
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
                <h3>Supplier History</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-4">
                        <h3>Supplier</h3>
                        <p>Name:</p>
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
                            <th>Amount_paid</th>
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
