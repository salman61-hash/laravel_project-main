@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add Accounts</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('accounts') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Account Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter category name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
