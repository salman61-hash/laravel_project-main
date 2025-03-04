@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4">Sales Report</h2>

                    <form method="POST" action="{{ url('/expense-report') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-control"
                                    value="{{ old('start_date', $startDate ?? '') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="form-control"
                                    value="{{ old('end_date', $endDate ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="user_id" class="form-label">User</label>
                                <select name="user_id" class="form-control">
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="expense_type_id" class="form-label">Expense Type</label>
                                <select name="expense_type_id" class="form-control">
                                    <option value="">Select Expense Type</option>
                                    @foreach ($expense_types as $expense_type)
                                        <option value="{{ $expense_type->id }}"
                                            {{ old('expense_type_id') == $expense_type->id ? 'selected' : '' }}>
                                            {{ $expense_type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                            </div>
                        </div>
                    </form>

                    @if(session('message'))
                        <p class="mt-4 text-center text-danger">{{ session('message') }}</p>
                    @endif

                    @if (!empty($expenses) && count($expenses) > 0)
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Expense Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->id }}</td>
                                        <td>{{ $expense->user->name }}</td>
                                        <td>{{ $expense->expense_type->name }}</td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>{{ $expense->expense_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Total:</th>
                                    <th>{{ $totalAmount }}</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="mt-4 text-center">No expenses found for the selected date range.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
