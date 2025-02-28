@extends('layout.backend.main')

@section('page_content')
<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Sales Return Details</h4>
            <a href="{{ url('/sales-return-details/create') }}" class="btn btn-light">
                <i class="fas fa-plus-circle"></i> Add Sales Return Detail
            </a>
        </div>

        <div class="mb-3 mt-3">
            <form action="{{ url('sales-return-details/search') }}" method="get" class="d-flex justify-content-center">
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
                            <th>Sales Return ID</th>
                            <th>Product ID</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>VAT</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($SaleReturnDetails as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->salereturn_id }}</td>
                                <td>{{ $detail->product_id }}</td>
                                <td>{{ $detail->description }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->price }}</td>
                                <td>{{ $detail->discount }}</td>
                                <td>{{ $detail->vat }}</td>
                                <td>
                                    <a href="{{ url("sale-return-details/{$detail->id}") }}" class="btn btn-sm btn-info">
                                        Show <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url("sale-return-details/{$detail->id}/edit") }}" class="btn btn-sm btn-warning">
                                        Update <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ url("sale-return-details/{$detail->id}") }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-danger">No Purchase Return Details Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    {!! $SaleReturnDetails->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
