
-- 1. Users Table (For Admins and Employees)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) ,
    email VARCHAR(100),
    password VARCHAR(255),
    role_id ,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

);

-- 2. Suppliers Table (For Purchase Management)
CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    contact_person VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Customers Table (For Sales and Accounts Receivable)
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    phone VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 4. Categories Table (For Organizing Products)
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE cupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    discount DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE payment_statuses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 5. Products Table (Stock and Inventory Management)
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    category_id INT,
    photo VARCHAR(50),
    sku VARCHAR(50),  -- Added data type and missing comma
    barcode VARCHAR(50),
    purchase_price DECIMAL(10,2),
    selling_price DECIMAL(10,2),
    min_stock_level INT,
    unit VARCHAR(50),  -- Added data type
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- 6. Purchases Table (Stock Addition & Accounts Payable)
CREATE TABLE purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_id INT,
    user_id INT,
    cupon_id INT,
    purchase_date DATE,
    total_amount DECIMAL(12,2),
    payment_status_id VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

);

-- 7. Purchase Details Table (For Line Items in Purchases)
CREATE TABLE purchase_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchase_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(10,2),
    discount DECIMAL(10,2) DEFAULT 0.00,
    vat DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE purchase_return_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchasereturn_id INT,
    product_id INT,
    description varchar(250) DEFAULT NULL,
    quantity INT,
    price DECIMAL(10,2),
    discount DECIMAL(10,2) DEFAULT 0.00,
    vat DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 8. Sales Table (Tracking Customer Purchases & Accounts Receivable)
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    user_id INT,
    sale_date DATE,
    total_amount DECIMAL(12,2),
    payment_status,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 9. Sales Details Table (For Line Items in Sales)
CREATE TABLE sales_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_id INT,
    product_id INT,
    cupon_id INT,
    quantity INT,
    price DECIMAL(10,2),
    discount DECIMAL(10,2) DEFAULT 0.00,
    vat DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 10. Sales Returns Table (Handling Customer Returns)
CREATE TABLE sales_returns (
      id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    refund_amount DECIMAL(10,2),
    discount DECIMAL(10,2) DEFAULT 0.00,
    vat DECIMAL(10,2) DEFAULT 0.00,
    return_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE sales_returns_details (
     id INT AUTO_INCREMENT PRIMARY KEY,
    salereturn_id INT,
    product_id INT,
    description varchar(250) DEFAULT NULL,
    quantity INT,
    price DECIMAL(10,2),
    discount DECIMAL(10,2) DEFAULT 0.00,
    vat DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 11. Purchase Returns Table (Handling Defective or Unwanted Purchases)
CREATE TABLE purchase_returns (
      id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_id INT,
    refund_amount DECIMAL(10,2),
    discount DECIMAL(10,2) DEFAULT 0.00,
    vat DECIMAL(10,2) DEFAULT 0.00,
    return_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- CREATE TABLE purchase_return_details (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     supplier_id INT,
--     purchase_return_id INT,
--     product_id INT,
--     quantity INT,
--     unit_price DECIMAL(10,2),
--     total_price DECIMAL(10,2),
--     reason TEXT,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

-- );


-- 12. Payments Table (For Recording Payments on Pending Accounts)
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,  -- Assuming this refers to an account table
    transaction_type VARCHAR(50) NOT NULL,  -- Specify a suitable length
    debit DECIMAL(12,2) DEFAULT 0,  -- Assuming monetary value
    credit DECIMAL(12,2) DEFAULT 0,  -- Assuming monetary value
    account_against INT NOT NULL,  -- Assuming it's another account reference
    amount_paid DECIMAL(12,2) NOT NULL,
    payment_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by INT NOT NULL  -- Assuming this refers to a user/admin
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- 13. Expenses Table (Tracking Operational Costs)
CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id INT,
    expense_type VARCHAR(100),
    amount DECIMAL(12,2),
    expense_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 14. Staff Table (Tracking Employee Roles in Transactions)

-- 15. Withdraw Table (Tracking Cash and Product Withdrawals)
CREATE TABLE withdraw (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id INT,
    withdraw_type,
    amount DECIMAL(12,2) ,
    product_id INT
    quantity INT,
    withdraw_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);
-- 15.Income statement Table
CREATE TABLE income_statement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_date DATE,
    total_sales DECIMAL(12,2),
    total_purchases DECIMAL(12,2),
    total_expenses DECIMAL(12,2),
    total_withdrawals DECIMAL(12,2),
    gross_profit DECIMAL(12,2),
    net_profit DECIMAL(12,2) GENERATED ALWAYS AS (gross_profit - total_expenses - total_withdrawals) STORED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
