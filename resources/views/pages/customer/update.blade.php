@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <h2 class="my-4 py-2 text-center rounded card-header bg-primary text-white">Update Customer Information</h2>

    <form action="{{ url("customers/{$customer->id}") }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Left Side -->
            <div class="col-md-6">
                <!-- Input Fields for the Left Side -->
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}">
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Phone</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                        @error('phone')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9">
                        <input type="email" class="form-control" name="email" value="{{ $customer->email }}">
                        @error('email')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Address</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="address">{{ $customer->address }}</textarea>
                        @error('address')
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
