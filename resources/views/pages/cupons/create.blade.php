@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <h2 class="my-4 py-2 text-center rounded card-header bg-primary text-white">Create a New Coupon</h2>

    <form action="{{ url('cupons') }}" method="post">
        @csrf
        <div class="row">
            <!-- Left Side -->
            <div class="col-md-6">
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-md-6">
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Discount</label>
                    <div class="col-lg-9">
                        <input type="number" step="0.01" class="form-control" name="discount" value="{{ old('discount') }}">
                        @error('discount')
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
