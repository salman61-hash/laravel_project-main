@extends('layout.backend.main')

@section('page_content')
<div class="container mt-4">
    <h2 class="mb-4">Add Supplier</h2>
    <div class="card p-4 shadow-sm">
        <form action="{{ url("suppliers/{$result['id']}") }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden"  name="_method"  value="put">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{$result['name']}}" placeholder="Enter Your Name" required>
            </div>

            <div class="mb-3">
                <label for="contact_person" class="form-label">Contact Person</label>
                <input type="text" name="contact_person" class="form-control" value="{{$result['contact_person']}}" placeholder="Enter Contact Person" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{$result['phone']}}" placeholder="Enter Phone Number" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$result['email']}}" placeholder="Enter Email" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{$result['address']}}" placeholder="Enter Address" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
