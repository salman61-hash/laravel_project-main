@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Update Expense</h5>
        </div>
        <div class="card-body">
            <form action="{{ url("expense/{$expense->id}") }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Expense Type -->
                <div class="mb-3">
                    <label for="expense_type_id" class="form-label">Expense Type</label>
                    <select name="expense_type_id" class="form-control @error('expense_type_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Select Expense Type</option>
                        @foreach ($expenseTypes as $expenseType)
                            <option value="{{ $expenseType->id }}" {{ old('expense_type_id', $expense->expense_type_id) == $expenseType->id ? 'selected' : '' }}>
                                {{ $expenseType->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('expense_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $expense->amount) }}" placeholder="Enter Expense Amount" required>
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Expense Date -->
                <div class="mb-3">
                    <label for="expense_date" class="form-label">Expense Date</label>
                    <input type="date" name="expense_date" class="form-control @error('expense_date') is-invalid @enderror" value="{{ old('expense_date', $expense->expense_date) }}" required>
                    @error('expense_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
