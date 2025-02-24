@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Purchase List</h4>
            <a href="{{ url('purchases/create') }}" class="btn btn-light">
                <i class="fas fa-plus-circle"></i> Add Purchase
            </a>
        </div>

        <div class="mb-3 mt-3">
            <!-- Search form centered -->
            <form action="{{ url('purchases/search') }}" method="get" class="d-flex justify-content-center">
                @csrf
                <div class="input-group" style="max-width: 400px;">
                    <input type="text" name="query" class="form-control rounded" placeholder="Search purchases..." required>
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
                            <th>Supplier</th>
                            <th>User</th>
                            <th>Purchase Date</th>
                            <th>Total Amount</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchases as $purchase)
                            <tr>
                                <td>{{ $purchase->id }}</td>
                                <td>{{ $purchase->supplier->name }}</td>
                                {{-- <td>{{ $purchase->user->name }}</td> --}}
                                <td>{{ $purchase->purchase_date }}</td>
                                <td>{{ $purchase->total_amount }}</td>
                                <td>{{ $purchase->payment_status->name }}</td>
                                <td>
                                    <a href="{{ url("purchases/{$purchase->id}/edit") }}" class="btn btn-sm btn-warning">
                                        Edit <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ url("purchases/{$purchase->id}") }}" class="btn btn-sm btn-info">
                                        Show <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ url("purchases/{$purchase->id}") }}" method="post" class="d-inline">
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
                                <td colspan="7" class="text-center text-danger">No Purchases Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    {!! $purchases->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
