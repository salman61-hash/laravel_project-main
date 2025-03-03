@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <h2 class="mb-4">Add Expense</h2>
    <div class="card p-4 shadow-sm">
        <form action="{{ url('expense') }}" method="POST">
            @csrf

            <!-- User ID -->
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" class="form-control" required>
                    <option value="" disabled selected>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Expense Type -->
            <div class="mb-3">
                <label for="expense_type_id" class="form-label">Expense Type</label>
                <select name="expense_type_id" class="form-control" required>
                    <option value="" disabled selected>Select Expense Type</option>
                    @foreach ($expense_types as $expense_type)
                        <option value="{{ $expense_type->id }}" {{ old('expense_type_id') == $expense_type->id ? 'selected' : '' }}>
                            {{ $expense_type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Amount -->
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" placeholder="Enter Expense Amount" step="0.01" required>
            </div>

            <!-- Expense Date -->
            <div class="mb-3">
                <label for="expense_date" class="form-label">Expense Date</label>
                <input type="date" name="expense_date" class="form-control" value="{{ old('expense_date') }}" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
