@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Stock List</h4>
            <a href="{{ url('stock/create') }}" class="btn btn-light">
                <i class="fas fa-plus-circle"></i> Add Stock
            </a>
        </div>

        <div class="mb-3 mt-3">
            <!-- Search form centered -->
            <form action="{{ url('stock/search') }}" method="get" class="d-flex justify-content-center">
                @csrf
                <div class="input-group" style="max-width: 400px;">
                    <input type="text" name="query" class="form-control rounded" placeholder="Search stock..." required>
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
                            <th>Product</th>
                            <th>Quantity</th>
                            {{-- <th>Min Stock Level</th> --}}

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stocks as $stock)
                            <tr>
                                <td>{{ $stock->id }}</td>
                                <td>{{ $stock->product->name }}</td>
                                <td>{{ $stock->quantity }}</td>
                                {{-- <td>{{ $stock->min_stock_level }}</td> --}}

                                <td>
                                    <a href="{{ url("stock/{$stock->id}/edit") }}" class="btn btn-sm btn-warning">
                                        Edit <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ url("stock/{$stock->id}") }}" class="btn btn-sm btn-info">
                                        Show <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ url("stock/{$stock->id}") }}" method="post" class="d-inline">
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
                                <td colspan="6" class="text-center text-danger">No Stock Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    {!! $stocks->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
