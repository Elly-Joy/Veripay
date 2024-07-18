<!DOCTYPE html>
<html>
<head>
    <title>Mpesa Transaction Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://as2.ftcdn.net/v2/jpg/02/91/48/83/1000_F_291488317_Ev6dXJmhSmTatiOkTz2d66Eq3eBW0hc4.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 150%;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Transaction Records</h1>
        <table>
            <tr>
                <th>TransactionType</th>
                <th>TransID</th>
                <th>TransTime</th>
                <th>TransAmount</th>
                <th>BusinessShortCode</th>
                <th>BillRefNumber</th>
                <th>InvoiceNumber</th>
                <th>OrgAccountBalance</th>
                <th>ThirdPartyTransID</th>
                <th>MSISDN</th>
                <th>FirstName</th>
                <th>MiddleName</th>
                <th>LastName</th>
            </tr>

            <?php
            // Replace "your_database_name" with the actual name of your database
            $conn = mysqli_connect("localhost", "root", "", "veripay");

            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            $result = mysqli_query($conn, "SELECT * FROM mpesa_transactions");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['TransactionType'] . "</td>";
                echo "<td>" . $row['TransID'] . "</td>";
                echo "<td>" . $row['TransTime'] . "</td>";
                echo "<td>" . $row['TransAmount'] . "</td>";
                echo "<td>" . $row['BusinessShortCode'] . "</td>";
                echo "<td>" . $row['BillRefNumber'] . "</td>";
                echo "<td>" . $row['InvoiceNumber'] . "</td>";
                echo "<td>" . $row['OrgAccountBalance'] . "</td>";
                echo "<td>" . $row['ThirdPartyTransID'] . "</td>";
                echo "<td>" . $row['MSISDN'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['MiddleName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "</tr>";
            }

            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>
