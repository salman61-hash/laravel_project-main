@extends('layout.backend.main')

@section('page_content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="container mt-4">
        <h2 class="mb-4">Accounts List</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ url('/accounts/create') }}" class="btn btn-primary align-items-center gap-2">
                <i class="fas fa-plus-circle"></i>
                <span>Add Accounts</span>
            </a>
        </div>





        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($accounts as $result)
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ url("accounts/{$result->id}/edit") }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ url("accounts/{$result->id}") }}" class="btn btn-info btn-sm">Show</a>



                                <form action="{{ url("accounts/{$result->id}") }}" method="post" class="d-inline">
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
            {!! $accounts->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
