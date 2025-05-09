@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Sales Returns</h4>
            <a href="{{ url('/sales-returns/create') }}" class="btn btn-light">
                <i class="fas fa-plus-circle"></i> Add Return
            </a>
        </div>

        <div class="mb-3 mt-3">
            <form action="{{ url('sales-returns/search') }}" method="get" class="d-flex justify-content-center">
                @csrf
                <div class="input-group" style="max-width: 400px;">
                    <input type="text" name="query" class="form-control rounded" placeholder="Search sales returns..." required>
                    <button type="submit" class="btn btn-warning d-flex align-items-center rounded">
                        <i class="fas fa-search me-2"></i> Search
                    </button>
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Refund Amount</th>
                            <th>Return Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($salesReturns as $return)
                            <tr>
                                <td>{{ $return->id }}</td>
                                <td>{{ $return->customer->name }}</td>
                                <td>{{ $return->refund_amount }}</td>
                                <td>{{ $return->return_date }}</td>
                                <td>
                                    <a href="{{ url("sales-returns/{$return->id}") }}" class="btn btn-sm btn-info">
                                        Show <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url("sales-returns/{$return->id}/edit") }}" class="btn btn-sm btn-warning">
                                        Update <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ url("sales-returns/{$return->id}") }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">No Sales Returns Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    {!! $salesReturns->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
