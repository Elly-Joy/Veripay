<!DOCTYPE html>
<html>
<head>
    <title>Transaction Records </title>
</head>
<body>
<h1>Transaction Records</h1>
    <table>
        <tr>
            <th>Transaction ID </th>
            <th>Customer ID</th>
            <th>Merchant ID</th>
            <th>Payment Amount</th>
            <th>Method</th>
        </tr>
        <?php
        // Replace "your_database_name" with the actual name of your database
        $conn = mysqli_connect("localhost", "root", "", "paymentverificationsystem");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $result = mysqli_query($conn, "SELECT * FROM payment");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Transaction_ID'] . "</td>";
            echo "<td>" . $row['Customer_ID'] . "</td>";
            echo "<td>" . $row['Merchant_ID'] . "</td>";
            echo "<td>" . $row['Payment_amount'] . "</td>";
            echo "<td>" . $row['Method'] . "</td>";
            echo "<td>" . $row['V_Status'] . "</td>";
            echo "</tr>";
        }

        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
        
    </table>
    
</body>
</html>