@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Purchase Return List</h4>
            <a href="{{ url('purchase_return/create') }}" class="btn btn-light">
                <i class="fas fa-plus-circle"></i> Add Purchase Return
            </a>
        </div>

        <div class="mb-3 mt-3">
            <!-- Search form centered -->
            <form action="{{ url('purchase_return/search') }}" method="get" class="d-flex justify-content-center">
                @csrf
                <div class="input-group" style="max-width: 400px;">
                    <input type="text" name="query" class="form-control rounded" placeholder="Search purchase returns..." required>
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
                            <th>Purchase ID</th>
                            <th>Product</th>
                            <th>Refund Amount</th>
                            <th>Return Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchase_returns as $return)
                            <tr>
                                <td>{{ $return->id }}</td>
                                <td>{{ $return->purchase_id }}</td>
                                <td>{{ $return->product->name }}</td>
                                <td>{{ number_format($return->refund_amount, 2) }}</td>
                                <td>{{ $return->return_date }}</td>
                                <td>
                                    <a href="{{ url("purchase-returns/{$return->id}/edit") }}" class="btn btn-sm btn-warning">
                                        Edit <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ url("purchase-returns/{$return->id}") }}" class="btn btn-sm btn-info">
                                        Show <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ url("purchase-returns/{$return->id}") }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            Delete <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">No Purchase Returns Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    {!! $purchase_returns->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
