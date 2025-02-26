@extends('layout.backend.main')

@section('page_content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sales Invoice</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            .sales-box {
                padding: 25px;
                border-radius: 12px;

                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
                transition: transform 0.3s;
            }

            .sales-box:hover {
                transform: scale(1.02);
            }

            .table th {
                background-color: #42a5f5;
                color: white;
            }

            .total-summary {
                font-size: 1.2rem;
                font-weight: bold;
            }
        </style>
    </head>


    <div class="row"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">



                <div class="container mt-5">
                    <div class="sales-box">
                        <h2 class="text-center mb-4">Sales Invoice 🧾</h2>
                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <strong>Customer Information:</strong><br>
                                Name:
                                <select class="form-control" name="customer_id" id="customer_id">
                                    <option value="">Select Customer</option>
                                    @forelse ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @empty
                                        <option value="">No Customer Found</option>
                                    @endforelse
                                </select><br>
                                Contact: <span class="phone"></span><br>
                                Email: <span class="email"></span><br>
                            </div>
                            <div class="text-end">
                                <strong>Invoice Details:</strong><br>
                                Invoice #: SAL-1001<br>
                                Date: {{ date('d M Y') }}<br>
                            </div>
                        </div>
                        <div class="text-end mt-3 clear_all">
                            <button class="btn btn-danger">Clear All</button>
                        </div>


                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-dark">
                                    <th>Sl</th>
                                    <th>Item</th>
                                    <th>Coupon</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Sub-total</th>
                                    <th>Action</th>
                                </tr>
                                <tr class="table-blue">

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
                                    <td>
                                        <select name="cupon_id" class="form-control" id="cupon_id">
                                            {{-- <option value="" disabled selected>Select Coupon</option> --}}
                                            @foreach ($cupons as $cupon)
                                                <option value="{{ $cupon->id }}">
                                                    {{ $cupon->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control qty"></td>
                                    <td><input type="text" disabled class="form-control s_price"></td>
                                    <td><input type="text" disabled class="form-control total"></td>
                                    <td><input type="number" disabled class="form-control discount"></td>
                                    <td><input type="text" disabled class="form-control subtotal"></td>
                                    <td><button class="btn btn-success add_cart_btn"> Add</button></td>
                                </tr>
                            </thead>
                            <tbody class="dataAppend">

                            </tbody>
                        </table>

                        <div class="text-end">
                            <p class="total-summary ">Subtotal: <span class="subtotal"></span> </p>
                            <p class="total-summary ">Vat (10%): <span class="vat"></span></p>

                            <p class="total-summary ">Grand Total: <span class="grand_total">262.50</span></p>

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
                                        <option value="{{ $status->id }}">
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
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script>
        $(function() {


            const cart = new Cart("sales");
            printCart();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });

            // Fetch Customer Phone Number
            $('#customer_id').on('change', function() {
                // alert();
                let customer_id = $(this).val();
                $.ajax({
                    url: "{{ url('find_customer') }}",
                    type: 'POST',
                    data: {
                        id: customer_id
                    },
                    success: function(res) {
                        $(".phone").text(res.customer?.phone);
                        $(".email").text(res.customer?.email);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            // Fetch Product Price
            $('#product_id').on('change', function() {
                let product_id = $(this).val();
                $.ajax({
                    url: '{{ url('find_product') }}',
                    method: 'POST',
                    data: {
                        id: product_id
                    },
                    success: function(res) {
                        $(".s_price").val(res.product?.selling_price);
                        $(".qty").val(1);
                        updateTotalAndSubtotal();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            // Fetch Coupon Discount
            $('#cupon_id').on('change', function() {
                let cupon_id = $(this).val();
                $.ajax({
                    url: '{{ url('find_cupon') }}',
                    method: 'POST',
                    data: {
                        id: cupon_id
                    },
                    success: function(res) {
                        $(".discount").val(res.cupon?.discount);
                        updateTotalAndSubtotal();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            // Update Total and Subtotal when Quantity, Price, or Discount changes
            $('.qty, .s_price, .discount').on('input', function() {
                updateTotalAndSubtotal();
            });

            function updateTotalAndSubtotal() {
                let qty = parseFloat($(".qty").val()) || 1;
                let price = parseFloat($(".s_price").val()) || 0;
                let discount = parseFloat($(".discount").val()) || 0;

                let total = price * qty;
                let total_discount = discount;
                let subtotal = total - total_discount;

                $(".total").val(total.toFixed(2));
                // $(".discount").val(total_discount.toFixed(2));
                $(".subtotal").val(subtotal.toFixed(2));
            }

            // Add to cart
            $('.add_cart_btn').on('click', function() {

                let product_id = $("#product_id").val();
                let product_name = $("#product_id option:selected").text();
                let coupon_id = $("#cupon_id").val();
                let coupon_name = $("#cupon_id option:selected").text();
                let qty = parseFloat($(".qty").val()) || 1;
                let price = parseFloat($(".s_price").val()) || 0;
                let discount = parseFloat($(".discount").val()) || 0;

                console.log(product_name.trim());

                let name = product_name.trim();
                let c_name = coupon_name.trim();


                if (!product_id) {
                    alert("Please select a product.");
                    return;
                }

                let total = price * qty;
                let total_discount = discount;
                let subtotal = total - total_discount;

                let item = {
                    "item_id": product_id,
                    "product_name": name,
                    "coupon_id": coupon_id,
                    "coupon_name": c_name,
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




                if (cartdata) {



                    console.log(cartdata);
                    cartdata.forEach((element, index) => {
                        subtotal += element.subtotal;
                        discount += element.discount;

                        htmldata += `
                        <tr>
                            <td>${index + 1}</td>
                            <td><p class="fs-14">${element.product_name}</p></td>
                            <td><p class="fs-14 text-gray">${element.coupon_name}</p></td>
                            <td><span class="fs-14 text-gray">${element.qty}</span></td>
                            <td><span class="fs-14 text-gray">$${element.price}</span></td>
                            <td><span class="fs-14 text-gray">$${element.total}</span></td>
                            <td><span class="fs-14 text-gray">$${element.discount}</span></td>
                            <td><span class="fs-14 text-gray">$${element.subtotal}</span></td>
                            <td><button data="${element.item_id}" class='btn btn-danger remove'>❌</button></td>
                        </tr>
                    `;

                    });
                }
                // console.log(htmldata);


                // Update the table body
                $('.dataAppend').html(htmldata);

                // Update Subtotal, VAT (5%), and Grand Total
                subtotal = subtotal.toFixed(2);
                let vat = (subtotal * 0.05).toFixed(2); // Calculate VAT
                grandtotal = (parseFloat(subtotal) + parseFloat(vat)).toFixed(2); // Calculate Grand Total

                // Update UI with calculated values
                $('.subtotal').html(subtotal);
                $('.vat').html(`${vat}`);
                $('.Discount').html(`${discount}`);
                $('.grand_total').html(`${grandtotal}`);
            }


            // Remove item from cart
            $(document).on('click', '.remove', function() {
                let id = $(this).attr('data');
                cart.delItem(id);
                printCart();
            })

            // Clear All Cart
            $(document).on('click', '.clear_all', function() {
                cart.clearCart();
                printCart();
            });



            $('.btn_process').on('click', function() {
                let customer_id = $('#customer_id').val();
                let total_amount = $('.grand_total').text();
                let payment_status = $('.payment_status_button').val();
                let discount = $('.Discount').text();
                let vat = $('.vat').text();
                let products = cart.getCart();




                $.ajax({
                    url: "{{ url('api/sales') }}",
                    type: 'Post',
                    data: {
                        customer_id: customer_id,
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
                            $('#customer_id').val("");
                            $(".phone").text("");
                            $(".email").text("");
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
