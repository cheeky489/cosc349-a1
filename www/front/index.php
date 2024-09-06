<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

<head>
    <title>Le Budget</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Rental House Budget Overview</h1>
    <?php

    $serverhost   = '192.168.56.12';
    $dbname   = 'budget';
    $username   = 'webuser';
    $password = 'lolpassword';

    // create connection
    $conn = new mysqli($serverhost, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // query to fetch renters
    $sqlRenters = "SELECT renter_id, name, email, phone, join_date FROM renters";
    $resultRenters = $conn->query($sqlRenters);

    if ($resultRenters->num_rows > 0) {
        echo "<h2 class='center'>Renters</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Join Date</th></tr>";
        while ($row = $resultRenters->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["renter_id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phone"] . "</td>
                <td>" . $row["join_date"] . "</td>
              </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='center'>No renters found.</p>";
    }

    // query to fetch bills
    $sqlBills = "SELECT bill_id, description, amount, due_date, status FROM bills";
    $resultBills = $conn->query($sqlBills);

    if ($resultBills->num_rows > 0) {
        echo "<h2 class='center'>Bills</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Description</th><th>Amount</th><th>Due Date</th><th>Status</th></tr>";
        while ($row = $resultBills->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["bill_id"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>$" . number_format($row["amount"], 2) . "</td>
                <td>" . $row["due_date"] . "</td>
                <td>" . $row["status"] . "</td>
              </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='center'>No bills found.</p>";
    }

    // query to fetch payments
    $sqlPayments = "SELECT payment_id, amount, payment_date, renter_id FROM payments";
    $resultPayments = $conn->query($sqlPayments);

    if ($resultPayments->num_rows > 0) {
        echo "<h2 class='center'>Payments</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Amount</th><th>Payment Date</th><th>Renter ID</th></tr>";
        while ($row = $resultPayments->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["payment_id"] . "</td>
                <td>$" . number_format($row["amount"], 2) . "</td>
                <td>" . $row["payment_date"] . "</td>
                <td>" . $row["renter_id"] . "</td>
              </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='center'>No payments found.</p>";
    }

    // close the connection
    $conn->close();
    ?>
    <h2><a href="http://127.0.0.1:8081/">Click here to add new information</a></h2>
</body>