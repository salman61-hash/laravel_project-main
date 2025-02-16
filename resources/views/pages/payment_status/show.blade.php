@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add Payment Status</h5>
        </div>
        <div class="card-body">



                <div class="mb-3">
                    <label for="name" class="form-label">Payment Status Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$result['name']}}" placeholder="Enter payment status name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


        </div>
    </div>
</div>

@endsection
