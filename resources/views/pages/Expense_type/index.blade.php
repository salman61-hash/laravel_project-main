@extends('layout.backend.main')

@section('page_content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="container mt-4">
        <h2 class="mb-4">Expense Type List</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ url('/expense_type/create') }}" class="btn btn-primary align-items-center gap-2">
                <i class="fas fa-plus-circle"></i>
                <span>Add Expense Type</span>
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
                @forelse ($expenses as $result)
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ url("expense_type/{$result->id}/edit") }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ url("expense_type/{$result->id}") }}" class="btn btn-info btn-sm">Show</a>



                                <form action="{{ url("expense_type/{$result->id}") }}" method="post" class="d-inline">
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
            {!! $expenses->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
