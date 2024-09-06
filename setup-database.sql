-- Create a table for storing renters' information
CREATE TABLE renters (
    renter_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    join_date DATE NOT NULL
);

-- Create a table for storing bill information
CREATE TABLE bills (
    bill_id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    due_date DATE NOT NULL,
    status ENUM('Pending', 'Paid') DEFAULT 'Pending',
    renter_id INT,
    FOREIGN KEY (renter_id) REFERENCES renters(renter_id) ON DELETE SET NULL
);

-- Create a table for tracking payments made by renters
CREATE TABLE payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL,
    renter_id INT,
    bill_id INT,
    FOREIGN KEY (renter_id) REFERENCES renters(renter_id) ON DELETE CASCADE,
    FOREIGN KEY (bill_id) REFERENCES bills(bill_id) ON DELETE CASCADE
);

-- Create a table for tracking shared house expenses
CREATE TABLE house_expenses (
    expense_id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    split_equally BOOLEAN DEFAULT TRUE,
    date_added DATE NOT NULL
);

-- Create a table for tracking the split of shared expenses among renters
CREATE TABLE expense_splits (
    split_id INT AUTO_INCREMENT PRIMARY KEY,
    renter_id INT,
    expense_id INT,
    share_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('Unpaid', 'Paid') DEFAULT 'Unpaid',
    FOREIGN KEY (renter_id) REFERENCES renters(renter_id) ON DELETE CASCADE,
    FOREIGN KEY (expense_id) REFERENCES house_expenses(expense_id) ON DELETE CASCADE
);

-- Create some initial sample data for testing purposes

-- Insert renters into the renters table
INSERT INTO renters (name, email, phone, join_date)
VALUES
    ('Alice Johnson', 'alice.johnson@email.com', '123-456-7890', '2023-01-01'),
    ('Bob Smith', 'bob.smith@email.com', '098-765-4321', '2023-02-15');

-- Insert some bills for the renters
INSERT INTO bills (description, amount, due_date, status, renter_id)
VALUES
    ('Electricity Bill', 120.50, '2024-09-30', 'Pending', 1),
    ('Internet Bill', 60.00, '2024-09-15', 'Paid', 2);

-- Insert some payments made by renters
INSERT INTO payments (amount, payment_date, renter_id, bill_id)
VALUES
    (60.00, '2024-09-01', 1, 2);

-- Insert some shared house expenses
INSERT INTO house_expenses (description, total_amount, split_equally, date_added)
VALUES
    ('Groceries', 150.00, TRUE, '2024-08-25');

-- Insert splits for the shared expenses among renters
INSERT INTO expense_splits (renter_id, expense_id, share_amount, status)
VALUES
    (1, 1, 75.00, 'Unpaid'),
    (2, 1, 75.00, 'Unpaid');
