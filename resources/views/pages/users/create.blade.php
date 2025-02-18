@extends('layout.backend.main')

@section('page_content')

<div class="container">
    <h2 class="my-4 py-2 text-center rounded card-header bg-primary text-white">Create a New User</h2>

    <form action="{{ url('users') }}" method="post" enctype="multipart/form-data">
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

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Password</label>
                    <div class="col-lg-9">
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-md-6">
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Role</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="role_id">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Photo</label>
                    <div class="col-lg-9">
                        <input type="file" class="form-control" name="photo">
                        @error('photo')
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
