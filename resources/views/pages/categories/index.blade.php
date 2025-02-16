@extends('layout.backend.main')

@section('page_content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="container mt-4">
        <h2 class="mb-4">Category List</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ url('/categories/create') }}" class="btn btn-primary align-items-center gap-2">
                <i class="fas fa-plus-circle"></i>
                <span>Add Product</span>
            </a>
        </div>

        {{-- <div class="mb-3 mt-3">
            <!-- Search form centered -->
            <form action="{{ url('categories/search') }}" method="get" class="d-flex justify-content-center">
                @csrf
                <div class="input-group" style="max-width: 400px;">
                    <input type="text" name="query" class="form-control rounded" placeholder="Search products..."
                        required>
                    <button type="submit" class="btn btn-warning d-flex align-items-center rounded">
                        <i class="fas fa-search me-2"></i> Search
                    </button>
                </div>
            </form>
        </div> --}}



        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($results as $result)
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ url("categories/{$result->id}/edit") }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ url("categories/{$result->id}") }}" class="btn btn-info btn-sm">Show</a>



                                <form action="{{ url("categories/{$result->id}") }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-danger">Data Not Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-4">
            {!! $results->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
