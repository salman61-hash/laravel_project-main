@extends('layout.backend.main')

@section('page_content')
    {{-- <div class="container mt-4">
    <h2 class="mb-4">Add Purchase</h2>
    <div class="card p-4 shadow-sm">
        <form action="{{ url('purchases') }}" method="POST">
            @csrf

            <!-- Supplier ID -->
            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select name="supplier_id" class="form-control" required>
                    <option value="" disabled selected>Select Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- User ID -->
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" class="form-control" required>
                    <option value="" disabled selected>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Purchase Date -->
            <div class="mb-3">
                <label for="purchase_date" class="form-label">Purchase Date</label>
                <input type="date" name="purchase_date" class="form-control" value="{{ old('purchase_date') }}" required>
            </div>

            <!-- Total Amount -->
            <div class="mb-3">
                <label for="total_amount" class="form-label">Total Amount</label>
                <input type="number" name="total_amount" class="form-control" value="{{ old('total_amount') }}" step="0.01" placeholder="Enter Total Amount" required>
            </div>

            <div class="mb-3">
                <label for="payment_status_id" class="form-label">Payment Status</label>
                <select name="payment_status_id">
                    @foreach ($payment_statuses as $status)
                        <option value="{{ $status->id }}" {{ old('payment_status_id', $purchase->payment_status_id ?? '') == $status->id ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>








            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div> --}}





    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Purchase Invoice</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>
            body {
                background-color: #f8f9fa;
            }

            .invoice-box {
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
                background-color: #ffffff;
                transition: 0.3s ease-in-out;
            }

            .invoice-box:hover {
                transform: translateY(-5px);
            }

            h2 {
                color: #007bff;
            }

            .table-primary th {
                background-color: #0056b3;
                color: white;
            }

            .btn-success,
            .btn-danger {
                font-weight: bold;
            }
        </style>
    </head>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-5">
                        <div class="invoice-box">
                            <h2 class="text-center mb-4">💳 Purchase Bill</h2>
                            <div class="d-flex justify-content-between mb-4">
                                <div>
                                    <h5>📦 Supplier Information</h5>
                                    <p>
                                    <div class="mb-3">
                                        <label for="supplier_id" class="form-label">Supplier</label>
                                        <select name="supplier_id" class="form-control" id="supplier_id">
                                            <option value="" disabled selected>Select Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}"
                                                    {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    </p>
                                    <strong>Address: <span class="address"></span></strong><br>
                                    <strong>Phone: <span class="phone"></span></strong>
                                </div>
                                <div class="text-end">
                                    <h5>🧾 Invoice Details</h5>
                                    Purchase id #: INV-001<br>
                                    Date: {{ date('d M Y') }}<br>
                                    Due Date: 28 Feb 2025
                                </div>
                            </div>
                            <div class="text-end mt-3 clear_all">
                                <button class="btn btn-danger">Clear All</button>
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                        <th>Discount</th>
                                        <th>Sub Total</th>
                                        <th>Action</th>
                                    </tr>



                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select name="product_id" class="form-control" id="product_id">
                                                <option value="" disabled selected>Select Product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </td>

                                        <td><input type="number" class="form-control qty"></td>
                                        <td><input type="text" disabled class="form-control P_price"></td>
                                        <td><input type="text" disabled class="form-control total"></td>
                                        <td><input type="text" class="form-control discount"></td>
                                        <td><input type="text" disabled class="form-control subtotal"></td>
                                        <td><button class="btn btn-success add_cart_btn"> Add</button></td>

                                    </tr>
                                </thead>
                                <tbody class="dataAppend">


                                </tbody>
                            </table>
                            <div class="text-end">
                                <p><strong>💰 Subtotal:</strong> <span class="subtotal"></p>

                                <p ><strong>💸 Vat (10%): <span class="vat">00</span></strong></p>
                                <p ><strong>💯 Total Amount: <span class="grand_total"></span>00</strong></p>

                                <div class="container">
                                    <p class="total-summary text-start">
                                        Total-Discount:
                                        <span class="Discount"></span>
                                    </p>
                                </div>


                                <div class="mb-3">
                                    <label for="payment_status_id" class="form-label payment_status">Payment Status</label>
                                    <select name="payment_status_id" class="payment_status_button">
                                        @foreach ($payment_statuses as $status)
                                            <option value="{{ $status->id }}" >
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>




                                </p>
                            </div>

                            <div class="container text-center mt-5">
                                <button class="btn btn-primary btn-lg px-4 py-2 shadow btn_process">
                                    <i class="fas fa-file-invoice"></i> Process Invoice
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </html>
@endsection








@section('script')
<script src="{{asset('assets/js/cart.js')}}"></script>
<script>
    $(function() {

        const cart = new Cart("purchase");
          printCart();

        $.ajaxSetup({

            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        // **Supplier Information**
        $("#supplier_id").on("change", function() {


            let supplier_id = $(this).val();
            $.ajax({
                    url: "{{ url('find_supplier') }}",
                    type: 'POST',
                    data: {
                        id: supplier_id
                    },
                    success: function(res) {

                        $(".address").text(res.supplier?.address);
                        $(".phone").text(res.supplier?.phone);

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
        });

        // **Product Selection**
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
                        console.log(res);
                        $(".qty").val(1);
                        $(".P_price").val(res.product?.purchase_price);
                        updateTotalAndSubtotal();

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

        // **Quantity, Price, or Discount Update**
        $('.qty, .P_price, .discount').on('input', function() {
                updateTotalAndSubtotal();
            });
        function updateTotalAndSubtotal() {
            let qty = parseFloat($(".qty").val()) || 0;
            let price = parseFloat($(".P_price").val()) || 0;
            let discount = parseFloat($(".discount").val()) || 0;

            let total = price * qty;
                let total_discount = discount;
                let subtotal = total - total_discount;

            $(".total").val(total.toFixed(2));
            // $(".discount").val(total_discount.toFixed(2));
            $(".subtotal").val(subtotal.toFixed(2));
        }

        // **Add Button Click, Add a New Row**
        $(".add_cart_btn").on('click', function() {

            let product_id = $("#product_id").val();
            let product_name = $("#product_id option:selected").text();
            let qty = parseFloat($(".qty").val()) || 1;
            let price = parseFloat($(".P_price").val()) || 0;
            let discount = parseFloat($(".discount").val()) || 0;

            console.log(product_name.trim());

                let name = product_name.trim();


            // Validation to prevent adding empty products
            if (!product_id) {
                alert("Please select a product and enter a valid quantity and price.");
                return;
            }

            let total = price * qty;
                let total_discount = discount;
                let subtotal = total - total_discount;

            let item = {
                "item_id": product_id,
                "product_name":name,
                "qty": qty,
                "price": price,
                "total": total,
                "discount": discount,
                "total_discount": total_discount,
                "subtotal": subtotal
            };

            cart.save(item);
            printCart();
        });

        function printCart() {
           let cartdata = cart.getCart();
            let htmldata = "";
            let subtotal = 0;
            let discount = 0;
            let grandtotal = 0;



            if(cartdata){

                cartdata.forEach((element, index) => {
                subtotal += element.subtotal;
                discount += element.discount;

                htmldata += `
                <tr>
                    <td>${index + 1}</td>
                    <td><p class="fs-14">${element.product_name}</p></td>
                    <td><span class="fs-14 text-gray">${element.qty}</span></td>
                    <td><span class="fs-14 text-gray">$${element.price}</span></td>
                    <td><span class="fs-14 text-gray">$${element.total}</span></td>
                    <td><span class="fs-14 text-gray">$${element.discount}</span></td>
                    <td><span class="fs-14 text-gray">$${element.subtotal}</span></td>
                    <td><button data-id="${element.item_id}" class='btn btn-danger remove'>❌</button></td>
                </tr>
            `;
            });

        }



            $('.dataAppend').html(htmldata);

            // Calculate VAT (5%) and Grand Total
            subtotal = subtotal.toFixed(2);
                let vat = (subtotal * 0.05).toFixed(2); // Calculate VAT
                grandtotal = (parseFloat(subtotal) + parseFloat(vat)).toFixed(2); // Calculate Grand Total

            // Update UI with calculated values
            $('.subtotal').html(subtotal);
                $('.vat').html(`${vat}`);
                $('.Discount').html(`${discount}`);
                $('.grand_total').html(`${grandtotal}`);
        }

        // **Row Remove **
        $(document).on('click', '.remove', function(){
				let id = $(this).attr('data-id');
				cart.delItem(id);
				printCart();
			})

        // **Clear All Button Click**
        $(document).on('click', '.clear_all', function(){
				cart.clearCart();
				printCart();
			});




            $('.btn_process').on('click', function(){
                let supplier_id = $('#supplier_id').val();
                let total_amount = $('.grand_total').text();
                let payment_status = $('.payment_status_button').val();
                let discount = $('.Discount').text();
                let vat = $('.vat').text();
                let products = cart.getCart();

                // let data = {
                //     supplier_id: supplier_id,
                //          total_amount: total_amount,
                //         payment_status: payment_status,
                //         discount: discount,
                //         vat: vat,
                //         products: products,
                // }

                // console.log(data);





                $.ajax({
                    url: "{{ url('api/purchase') }}",
                    type: 'Post',
                    data: {
                        supplier_id: supplier_id,
                         total_amount: total_amount,
                        payment_status: payment_status,
                        discount: discount,
                        vat: vat,
                        products: products,
                    },
                    success: function(res) {
                       if (res.success) {
                        cart.clearCart();
                        printCart();
                        $('#supplier_id').val("");
                        $(".address").text("");
                        $(".phone").text("");

                       }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });

    });
</script>

@endsection
