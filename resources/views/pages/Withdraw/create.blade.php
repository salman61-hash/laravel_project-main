@extends('layout.backend.main')

@section('page_content')
    <div class="container mt-4">
        <h2 class="mb-4">Withdraw Product</h2>
        <div class="card p-4 shadow-sm">
            <form action="{{ url('withdraw') }}" method="POST">
                @csrf

                <!-- User ID -->
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" class="form-control" required>
                        <option value="" disabled selected>Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Withdraw Type -->
                <div class="mb-3">
                    <label for="withdraw_type_id" class="form-label">Withdraw Type</label>
                    <select name="withdraw_type_id" class="form-control" required>
                        <option value="" disabled selected>Select Withdraw Type</option>
                        @foreach ($withdrawTypes as $type)
                            <option value="{{ $type->id }}"
                                {{ old('withdraw_type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Product ID -->
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select name="product_id" id="product_id" class="form-control">
                        <option value="" disabled selected>Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}"
                        placeholder="Enter Quantity">
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" name="amount" class="form-control amount" value="{{ old('amount') }}"
                        placeholder="Enter Amount" required>
                </div>

                <!-- Withdraw Date -->
                <div class="mb-3">
                    <label for="withdraw_date" class="form-label">Withdraw Date</label>
                    <input type="date" name="withdraw_date" class="form-control" value="{{ old('withdraw_date') }}"
                        required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" id="btn_process">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });


            $('#product_id').on('change', function() {

                // alert();
                let product_id = $(this).val();
                $.ajax({
                    url: '{{ url('find_product') }}',
                    method: 'POST',
                    data: {
                        id: product_id
                    },
                    success: function(res) {
                        $(".amount").val(res.product?.purchase_price);


                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });




            $(document).ready(function() {
                $('#btn_process').on('click', function() {
                    let product_id = $('#product_id').val();
                    let quantity = $('input[name="quantity"]').val();

                    if (!product_id) {
                        alert("Please select a product!");
                        return;
                    }

                    if (!quantity || quantity <= 0) {
                        alert("Please enter a valid quantity!");
                        return;
                    }

                    $.ajax({
                        url: '{{ url('update_stock') }}', // Laravel route (Update this as needed)
                        method: 'POST',
                        data: {
                           
                            product_id: product_id,
                            quantity: quantity
                        },
                        success: function(response) {
                            if (response.success) {
                                alert("Stock updated successfully!");
                            } else {
                                alert("Error updating stock: " + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", error);
                            alert("Something went wrong!");
                        }
                    });
                });
            });







        });
    </script>
@endsection
