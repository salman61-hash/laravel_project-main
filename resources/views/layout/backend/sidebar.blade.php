<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets') }}/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets') }}/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="{{ url('/') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end">9+</span>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#usermenu" aria-expanded="false" aria-controls="usermenu"
                    class="side-nav-link">
                    <i class="ri-user-line"></i> <!-- Changed icon -->
                    <span> Users </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="usermenu">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ url('users') }}">View Users List</a>
                        </li>
                    </ul>
                </div>
            </li>



            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#customerMenu" aria-expanded="false" aria-controls="customerMenu"
                    class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Customers </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="customerMenu">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ url('customers') }}">View Customers List</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#supplierMenu" aria-expanded="false" aria-controls="supplierMenu"
                    class="side-nav-link">
                    <i class="ri-truck-line"></i>
                    <span> Suppliers </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="supplierMenu">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('suppliers') }}">View Suppliers List</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#categoryMenu" aria-expanded="false" aria-controls="categoryMenu"
                    class="side-nav-link">
                    <i class="ri-folder-line"></i>
                    <span> Categories </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="categoryMenu">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('categories') }}">View Categories List</a></li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#accountsMenu" aria-expanded="false" aria-controls="accountsMenu"
                    class="side-nav-link">
                    <i class="ri-user-line"></i> <!-- Changed Icon -->
                    <span> Accounts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="accountsMenu">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('accounts') }}">View Accounts List</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" data-bs-target="#paymentstatus" aria-expanded="false"
                    aria-controls="paymentstatus" class="side-nav-link">
                    <i class="ri-wallet-line"></i>
                    <span> Payment Status </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="paymentstatus">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('payment_status') }}">View Payment Status List</a></li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" data-bs-target="#cuonmenup" aria-expanded="false"
                    aria-controls="cuonmenup" class="side-nav-link">
                    <i class="ri-ticket-line"></i> <!-- Changed Icon -->
                    <span> Cupon </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="cuonmenup">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('cupons') }}">View cupon List</a></li>
                    </ul>
                </div>
            </li>




            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#productMenu" aria-expanded="false" aria-controls="productMenu"
                    class="side-nav-link">
                    <i class="ri-shopping-cart-line"></i>
                    <span> Products </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="productMenu">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('product') }}">View Products List</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#purchasesMenu" aria-expanded="false" aria-controls="purchasesMenu"
                    class="side-nav-link">
                    <i class="ri-shopping-bag-line"></i>
                    <span> Purchases </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="purchasesMenu">
                    <ul class="side-nav-second-level">
                        <!-- Purchase -->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#purchaseMenu" aria-expanded="false"
                                aria-controls="purchaseMenu" class="side-nav-link">
                                <span> Purchase </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="purchaseMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('purchases') }}">View Purchases List</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Purchase Details -->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#purchaseDetailsMenu" aria-expanded="false"
                                aria-controls="purchaseDetailsMenu" class="side-nav-link">
                                <span> Purchase Details </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="purchaseDetailsMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('purchase-details') }}">View Purchase Details List</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Purchase Return -->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#purchaseReturnMenu" aria-expanded="false"
                                aria-controls="purchaseReturnMenu" class="side-nav-link">
                                <span> Purchase Return </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="purchaseReturnMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('purchase-returns') }}">View Purchase Return List</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#purchaseReturndetailsMenu" aria-expanded="false"
                                aria-controls="purchaseReturndetailsMenu" class="side-nav-link">
                                <span> Purchase Return Details</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="purchaseReturndetailsMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('purchase-return-details') }}">View Purchase Return Details List</a></li>
                                </ul>
                            </div>
                        </li>


                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#purchaseReportdetailsMenu" aria-expanded="false"
                                aria-controls="purchaseReturndetailsMenu" class="side-nav-link">
                                <span> Purchase Report</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="purchaseReportdetailsMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('purchase-report') }}">View Purchase Report List</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </li>

            {{-- sales --}}

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#salesMenu" aria-expanded="false" aria-controls="salesMenu"
                    class="side-nav-link">
                    <i class="ri-shopping-cart-line"></i>
                    <span> Sales </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="salesMenu">
                    <ul class="side-nav-second-level">
                        <!-- Sales -->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#salesMenuList" aria-expanded="false"
                                aria-controls="salesMenuList" class="side-nav-link">
                                <span> Sales </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="salesMenuList">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('sales') }}">View Sales List</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Sales Details -->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#salesDetailsMenu" aria-expanded="false"
                                aria-controls="salesDetailsMenu" class="side-nav-link">
                                <span> Sales Details </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="salesDetailsMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('salesdetails') }}">View Sales Details List</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Sales Return -->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#salesReturnMenu" aria-expanded="false"
                                aria-controls="salesReturnMenu" class="side-nav-link">
                                <span> Sales Return </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="salesReturnMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('sales-returns') }}">View Sales Return List</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#salesReturnMenu" aria-expanded="false"
                                aria-controls="salesReturnMenu" class="side-nav-link">
                                <span> Sales Return Details</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="salesReturnMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('sales-return-details') }}">View Sales Return Details List</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#salesReportMenu" aria-expanded="false"
                                aria-controls="salesReturnMenu" class="side-nav-link">
                                <span> Sales Report Details</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="salesReportMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('sales-report') }}">View Sales Report Details List</a></li>
                                </ul>
                            </div>
                        </li>






                    </ul>
                </div>
            </li>

            {{-- stock --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#stockMenu" aria-expanded="false" aria-controls="stockMenu"
                    class="side-nav-link">
                    <i class="ri-archive-line"></i>
                    <span> Stock </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="stockMenu">
                    <ul class="side-nav-second-level">
                        <!-- Stock -->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#stockListMenu" aria-expanded="false"
                                aria-controls="stockListMenu" class="side-nav-link">
                                <span> Stock </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="stockListMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('stock') }}">View Stock List</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Stock Adjustment -->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#stockAdjustmentMenu" aria-expanded="false"
                                aria-controls="stockAdjustmentMenu" class="side-nav-link">
                                <span> Stock Report </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="stockAdjustmentMenu">
                                <ul class="side-nav-third-level">
                                    <li><a href="{{ url('stocks-report') }}">View Stock Report List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>






            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#paymentsmenu" aria-expanded="false" aria-controls="paymentsmenu"
                    class="side-nav-link">
                    <i class="ri-money-dollar-box-line"></i>
                    <span> Payments </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="paymentsmenu">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('payments') }}">View Payments List</a></li>
                    </ul>
                </div>
            </li>



            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#expensemenu" aria-expanded="false" aria-controls="expensemenu"
                    class="side-nav-link">
                    <i class="ri-money-cny-box-line"></i>
                    <span> Expense </span>
                    <span class="menu-arrow"></span>
                </a>

                <div class="collapse" id="expensemenu">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('expense_type') }}">View Expense Type List</a></li>
                        <li><a href="{{ url('expense') }}">View Expense List</a></li>
                        <li><a href="{{ url('expense-report') }}">View Expense Report List</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#withdrawmenu" aria-expanded="false" aria-controls="withdrawmenu"
                    class="side-nav-link">
                    <i class="ri-wallet-line"></i> <!-- Changed Icon -->
                    <span> Withdraw </span>
                    <span class="menu-arrow"></span>
                </a>

                <div class="collapse" id="withdrawmenu">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('withdraw_type') }}">View Withdraw Type List</a></li>
                        <li><a href="{{ url('withdraw') }}">View Withdraw List</a></li>
                    </ul>
                </div>
            </li>





            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#incomestatementmenu" aria-expanded="false" aria-controls="incomestatementmenu"
                    class="side-nav-link">
                    <i class="ri-bar-chart-box-line"></i>
                    <span> Income Statement </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="incomestatementmenu">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('income-statement') }}">View Income Statement</a></li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#incomestatementmenu" aria-expanded="false" aria-controls="incomestatementmenu"
                    class="side-nav-link">
                    <i class="ri-bar-chart-box-line"></i>
                    <span> Reports </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="incomestatementmenu">
                    <ul class="side-nav-second-level">
                        <li><a href="{{ url('income-statement') }}">Purchase Report</a></li>
                        <li><a href="{{ url('income-statement') }}">Sales Report</a></li>
                        <li><a href="{{ url('income-statement') }}">Stock Report</a></li>
                        <li><a href="{{ url('income-statement') }}">Accounts Receivable</a></li>
                        <li><a href="{{ url('income-statement') }}">Accounts Payable</a></li>
                        <li><a href="{{ url('income-statement') }}">Income Statement</a></li>
                    </ul>
                </div>
            </li>














        </ul>


        <div class="clearfix"></div>
    </div>
</div>
