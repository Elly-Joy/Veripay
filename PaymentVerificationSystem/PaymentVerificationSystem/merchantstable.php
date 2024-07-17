<!DOCTYPE html>
<html>
<head>
    <title>Merchant Records</title>
    <!--<link rel="stylesheet" href= "style.css">-->

</head>
<body>
<h1>Merchants Records</h1>
    <table>
        <tr>
            <th>Merchant Name </th>
            <th>Merchant ID</th>
            <th>Email</th>
        </tr>
        <?php
        // Replace "your_database_name" with the actual name of your database
        $conn = mysqli_connect("localhost", "root", "", "paymentverificationsystem");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $result = mysqli_query($conn, "SELECT * FROM merchant");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Merchant_ID'] . "</td>";
            echo "<td>" . $row['Merchant_Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "</tr>";
        }

        mysqli_free_result($result);
        mysqli_close($conn);
        ?>    
    </table>
</body>
</html>