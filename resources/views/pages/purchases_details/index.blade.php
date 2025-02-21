@extends('layout.backend.main')

@section('page_content')

<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Purchase Details List</h4>
            <a href="{{ url('purchase-details/create') }}" class="btn btn-light">
                <i class="fas fa-plus-circle"></i> Add Purchase Detail
            </a>
        </div>

        <div class="mb-3 mt-3">
            <!-- Search form centered -->
            <form action="{{ url('purchase-details/search') }}" method="get" class="d-flex justify-content-center">
                @csrf
                <div class="input-group" style="max-width: 400px;">
                    <input type="text" name="query" class="form-control rounded" placeholder="Search purchase details..." required>
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
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>VAT</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchaseDetails as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->purchase_id }}</td>
                                <td>{{ optional($detail->product)->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->price }}</td>
                                <td>{{ $detail->discount }}</td>
                                <td>{{ $detail->vat }}</td>
                                <td>
                                    <!-- Calculating total amount -->
                                    {{ $totalAmount = ($detail->quantity * $detail->price) - $detail->discount + $detail->vat }}
                                </td>
                                <td>
                                    <a href="{{ url("purchase-details/{$detail->id}/edit") }}" class="btn btn-sm btn-warning">
                                        Edit <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ url("purchase-details/{$detail->id}") }}" class="btn btn-sm btn-info">
                                        Show <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ url("purchase-details/{$detail->id}") }}" method="post" class="d-inline">
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
                                <td colspan="9" class="text-center text-danger">No Purchase Details Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    {!! $purchaseDetails->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
