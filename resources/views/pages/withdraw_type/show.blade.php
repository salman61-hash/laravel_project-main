@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Update WithdrawType</h5>
        </div>
        <div class="card-body">

                <input type="hidden"  name="_method"  value="put">

                <div class="mb-3">
                    <label for="name" class="form-label">WithdrawType Name</label>
                    <input type="text" name="name" class="form-control" value="{{$result['name']}}" placeholder="Enter WithdrawType name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Update
                    </button>
                </div>

        </div>
    </div>
</div>

@endsection
