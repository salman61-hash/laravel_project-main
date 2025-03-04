@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Withdraw List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Withdraw Type</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Withdraw Date</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($withdraws as $withdraw)
            <tr>
                <td>{{ $withdraw->id }}</td>
                <td>{{ $withdraw->user_id }}</td>
                <td>{{ $withdraw->withdraw_type_id }}</td>
                <td>{{ $withdraw->product_id }}</td>
                <td>{{ $withdraw->quantity }}</td>
                <td>{{ $withdraw->amount }}</td>
                <td>{{ $withdraw->withdraw_date }}</td>
                <td>{{ $withdraw->created_at }}</td>
                <td>{{ $withdraw->updated_at }}</td>
                <td>
                    <a href="{{ route('withdraw.edit', $withdraw->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('withdraw.destroy', $withdraw->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
