@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <h2 class="my-4 py-2 text-center rounded card-header bg-primary text-white">Create a New Payment</h2>

    <form action="{{ url('payments') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Left Side -->
            <div class="col-md-6">
                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Account ID</label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" name="account_id" value="{{ old('account_id') }}">
                        @error('account_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Transaction Type</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="transaction_type" value="{{ old('transaction_type') }}">
                        @error('transaction_type')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Debit Amount</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" class="form-control" name="debit" value="{{ old('debit') }}">
                        @error('debit')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Credit Amount</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" class="form-control" name="credit" value="{{ old('credit') }}">
                        @error('credit')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <!-- Right Side -->
            <div class="col-md-6">

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Created By</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="created_by" value="{{ old('created_by') }}">
                        @error('created_by')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            <div class="col-md-6">
                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Account_against</label>
                    <div class="col-lg-8">
                        <input type="text"  class="form-control" name="account_against" value="{{ old('account_against') }}">
                        @error('account_against')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Amount Paid</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" class="form-control" name="amount_paid" value="{{ old('amount_paid') }}">
                        @error('amount_paid')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Payment Date</label>
                    <div class="col-lg-8">
                        <input type="date" class="form-control" name="payment_date" value="{{ old('payment_date') }}">
                        @error('payment_date')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection
