@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <h2 class="my-4 py-2 text-center rounded card-header bg-primary text-white">Update Coupon Information</h2>


        <div class="row">
            <!-- Left Side -->
            <div class="col-md-6">
                <!-- Input Fields for the Left Side -->
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="name" value="{{ $cupon->name }}">
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Discount</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="discount" value="{{ $cupon->discount }}">
                        @error('discount')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>


</div>

@endsection
