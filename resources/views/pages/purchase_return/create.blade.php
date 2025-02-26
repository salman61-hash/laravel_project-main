@extends('layout.backend.main')

@section('page_content')
    {{-- <div class="container">
    <h2 class="my-4 py-2 text-center rounded card-header bg-primary text-white">Create a Purchase Return</h2>

    <form action="{{ url('purchase-returns') }}" method="post">
        @csrf
        <div class="row">
            <!-- Left Side -->
            <div class="col-md-6">
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Purchase ID</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" name="purchase_id" value="{{ old('purchase_id') }}">
                        @error('purchase_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>




                <div class="input-block mb-3 row">
                    <label for="product_id" class="col-lg-3 col-form-label">Product</label>
                    <select name="product_id" class="form-control" id="product_id">
                        <option value="" disabled selected>Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>







            </div>

            <!-- Right Side -->
            <div class="col-md-6">
                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Refund Amount</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="refund_amount" value="{{ old('refund_amount') }}">
                        @error('refund_amount')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="input-block mb-3 row">
                    <label class="col-lg-3 col-form-label">Return Date</label>
                    <div class="col-lg-9">
                        <input type="date" class="form-control" name="return_date" value="{{ old('return_date') }}">
                        @error('return_date')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div> --}}












    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Debit Note</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>
            body {
                background-color: #f3f4f6;
            }

            .invoice-box {
                background: linear-gradient(135deg, #ffffff, #f8f9fa);
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                border: 2px solid #007bff;
            }

            .table th {
                background: #007bff;
                color: white;
                border-color: #0056b3;
                text-transform: uppercase;
                text-align: center;
            }

            .table td {
                border-color: #dee2e6;
            }

            .header-text {
                font-size: 26px;
                font-weight: bold;
                color: #007bff;
                text-transform: uppercase;
            }

            .debit-note-btn {
                background: #007bff;
                color: white;
                font-size: 20px;
                font-weight: bold;
                padding: 10px 20px;
                border-radius: 6px;
                border: none;
                transition: 0.3s;
            }

            .debit-note-btn:hover {
                background: #0056b3;
            }

            .print-btn {
                background: #28a745;
                color: white;
                font-size: 18px;
                padding: 8px 20px;
                border-radius: 6px;
                border: none;
                transition: 0.3s;
            }

            .print-btn:hover {
                background: #218838;
            }

            textarea {
                border: 1px solid #ced4da;
                border-radius: 4px;
                padding: 8px;
                width: 100%;
                height: 100px;
                /* Ensure proper height */
                resize: vertical;
                /* Allow vertical resizing */
                font-size: 14px;
                /* Improve text readability */
            }

            .table td button {
                background: #dc3545;
                color: white;
                font-size: 14px;
                border-radius: 6px;
                border: none;
                padding: 5px 10px;
                transition: 0.3s;
            }

            .table td button:hover {
                background: #c82333;
            }

            .table td button.add-btn {
                background: #007bff;
            }

            .table td button.add-btn:hover {
                background: #0056b3;
            }
        </style>
    </head>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="container mt-5">
                        <div class="invoice-box">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p><strong>Debit Note No:</strong> <span class="text-primary">37</span></p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p><strong>Date:</strong> 18 August 2017</p>
                                </div>
                            </div>

                            <div class="text-center">
                                <h2 class="header-text">Imran Brothers</h2>
                                <p class="text-muted">Matitola, Bangladesh</p>
                                <button class="debit-note-btn">Debit Note</button>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h5><strong>Supplier</strong></h5>
                                    <select name="supplier_id" id="supplier_id" class="form-control">
                                        <option value="" disabled selected>Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    <p><strong>Address:</strong> <span class="address"></span></p>
                                    <p><strong>Phone:</strong> <span class="phone"></span></p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p><strong>And Date:</strong> 18 August 2017</p>
                                </div>
                            </div>

                            <div class="text-end mt-3 clear_all">
                                <button class="btn btn-danger">Clear All</button>
                            </div>

                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr class="table-success text-dark">
                                        <th>Sl</th>
                                        <th>Item</th>
                                        
                                        <th>Description</th>
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

                                        <td>
                                            <textarea rows="3" placeholder="Enter reason for return..." class="description"></textarea>
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
                                <tfoot>

                                    <tr>
                                        <th colspan="4" class="text-end">Total Amount (Taka)</th>
                                        <th>11,000</th>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="text-end">
                                <p><strong>💰 Subtotal:</strong> <span class="subtotal"></p>

                                <p><strong>💸 Vat (10%): <span class="vat">00</span></strong></p>
                                <p><strong>💯 Total Amount: <span class="grand_total"></span>00</strong></p>

                                <div class="container">
                                    <p class="total-summary text-start">
                                        Total-Discount:
                                        <span class="Discount"></span>
                                    </p>
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


            const cart = new Cart("purchase");
            printCart();


            $.ajaxSetup({

                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            // alert();



            $("#supplier_id").on("change", function() {
                // alert();
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
                        // updateTotalAndSubtotal();

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
                let description = $(".description").val();
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
                    "product_name": name,
                    "description": description,
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

                    cartdata.forEach((element, index) => {
                        subtotal += element.subtotal;
                        discount += element.discount;

                        htmldata += `
                <tr>
                    <td>${index + 1}</td>
                    <td><p class="fs-14">${element.product_name}</p></td>
                    <td><p class="fs-14">${element.description}</p></td>
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
            $(document).on('click', '.remove', function() {
                let id = $(this).attr('data-id');
                cart.delItem(id);
                printCart();
            })

            $(document).on("change", ".description", function() {
                console.log("Description:", $(this).val());
            });


            // **Clear All Button Click**
            $(document).on('click', '.clear_all', function() {
                cart.clearCart();
                printCart();
            });



            // alert();
            $('.btn_process').on('click', function() {
                // alert();
                let supplier_id = $('#supplier_id').val();
                let total_amount = $('.grand_total').text();

                let discount = $('.Discount').text();
                let vat = $('.vat').text();
                let products = cart.getCart();



                $.ajax({
                    url: "{{ url('api/purchaseReturn/') }}",
                    type: 'Post',
                    data: {
                        supplier_id: supplier_id,
                        total_amount: total_amount,

                        discount: discount,
                        vat: vat,
                        products: products,
                    },
                    success: function(res) {
                        console.log(res)

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });



        });
    </script>
@endsection
