@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <h2 class="my-4 py-2 text-center rounded card-header bg-primary text-white">Create a new Product</h2>

    <form action="{{url('product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Left Side -->
            <div class="col-md-6">
                <!-- Input Fields for the Left Side -->
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @error('name')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Category</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($category as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Supplier</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="supplier_id" value="{{old('supplier_id')}}">
                        @error('supplier_id')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div> --}}

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Photo</label>
                    <div class="col-lg-9">
                        <input type="file" class="form-control" name="photo">
                        @error('photo')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">SKU</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="sku" value="{{old('sku')}}">
                        @error('sku')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Barcode</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="barcode" value="{{old('barcode')}}">
                        @error('barcode')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-md-6">
                <!-- Input Fields for the Right Side -->
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Purchase Price</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="purchase_price" value="{{old('purchase_price')}}">
                        @error('purchase_price')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Selling Price</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="selling_price" value="{{old('selling_price')}}">
                        @error('selling_price')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Stock</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="stock" value="{{old('stock')}}">
                        @error('stock')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div> --}}

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Min. Stock</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="min_stock" value="{{old('min_stock')}}">
                        @error('min_stock')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Unit</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="unit" value="{{old('unit')}}">
                        @error('unit')
                        <span style="color: red">{{$message}}</span>
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
