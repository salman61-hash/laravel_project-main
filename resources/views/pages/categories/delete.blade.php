@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Delete Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ url("categories/{$result['id']}") }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" value="{{$result['name']}}" placeholder="Enter category name">
                    <input type="hidden" name="id" class="form-control" value="{{$result['id']}}" placeholder="Enter category id">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
