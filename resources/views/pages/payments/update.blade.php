@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <h2 class="my-4 py-2 text-center rounded card-header bg-primary text-white">Update Payment Information</h2>

    <form action="{{ url("payments/{$payment->id}") }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Left Side -->
            <div class="col-md-6">
                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Account ID</label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" name="account_id" value="{{ $payment->account_id }}">
                        @error('account_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Transaction Type</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="transaction_type" value="{{ $payment->transaction_type }}">
                        @error('transaction_type')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Debit Amount</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" class="form-control" name="debit" value="{{ $payment->debit }}">
                        @error('debit')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Credit Amount</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" class="form-control" name="credit" value="{{ $payment->credit }}">
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
                        <input type="text" class="form-control" name="created_by" value="{{ $payment->created_by }}">
                        @error('created_by')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Account Against</label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" name="account_against" value="{{ $payment->account_against }}">
                        @error('account_against')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Amount Paid</label>
                    <div class="col-lg-8">
                        <input type="number" step="0.01" class="form-control" name="amount_paid" value="{{ $payment->amount_paid }}">
                        @error('amount_paid')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-4 col-form-label">Payment Date</label>
                    <div class="col-lg-8">
                        <input type="date" class="form-control" name="payment_date" value="{{ $payment->payment_date }}">
                        @error('payment_date')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection
