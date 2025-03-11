@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h2>Create a New Payment</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('payments') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Left Side -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Account Name</label>
                            <select class="form-control" name="account_id">
                                <option value="">Select Account</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            </select>
                            @error('account_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Transaction Type</label>
                            <input type="text" class="form-control" name="transaction_type" value="{{ old('transaction_type') }}">
                            @error('transaction_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" step="0.01" class="form-control" name="debit" value="{{ old('debit') }}">
                            @error('debit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label">Credit Amount</label>
                            <input type="number" step="0.01" class="form-control" name="credit" value="{{ old('credit') }}">
                            @error('credit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                    </div>

                    <!-- Right Side -->
                    <div class="col-md-6">
                        {{-- <div class="mb-3">
                            <label class="form-label">Created By</label>
                            <input type="text" class="form-control" name="created_by" value="{{ old('created_by') }}">
                            @error('created_by')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="mb-3">
                            <label class="form-label">Account Against</label>
                            {{-- <input type="text" class="form-control" name="account_against" value="{{ old('account_against') }}"> --}}

                            <select class="form-control" name="account_against">
                                <option value="">Select Account</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            </select>

                            @error('account_against')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label">Amount Paid</label>
                            <input type="number" step="0.01" class="form-control" name="amount_paid" value="{{ old('amount_paid') }}">
                            @error('amount_paid')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="mb-3">
                            <label class="form-label">Payment Date</label>
                            <input type="date" class="form-control" name="payment_date" value="{{ old('payment_date') }}">
                            @error('payment_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
