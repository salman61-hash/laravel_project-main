@extends('layout.backend.main')

@section('page_content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Supplier List</h2>
        <a href="{{ url('suppliers/create') }}" class="btn btn-primary">Add New Supplier</a>
    </div>

    <div class="mb-3 mt-3 d-flex justify-content-center">
        <form action="{{ url('suppliers/search') }}" method="get">
            @csrf
            <div class="input-group" style="max-width: 350px;">
                <input type="text" name="query" class="form-control form-control-sm rounded-pill" placeholder="Search suppliers..." required>
                <button type="submit" class="btn btn-warning btn-sm rounded-pill">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </form>
    </div>


    <table class="table table-bordered table-striped">
        <thead style="background-color: #1A2942; color: white;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact Person</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->contact_person }}</td>
                    <td>{{ $result->phone }}</td>
                    <td>{{ $result->email }}</td>
                    <td>{{ $result->address }}</td>
                    <td>
                        <a href="{{ url("suppliers/{$result->id}/edit") }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ url("suppliers/{$result->id}") }}" class="btn btn-info btn-sm">Show</a>
                        <form action="{{ url("suppliers/{$result->id}") }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-danger">Data Not Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-4">
        {!! $results->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
