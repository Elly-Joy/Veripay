<!DOCTYPE html>
<html>
<head>      
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="C:\xampp1\htdocs\PaymentVerificationSystem\style.css">

    <style>
          body {
            font-family: Arial, sans-serif;
            background: url('') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        ul li a {
            display: block;
            text-decoration: none;
            color: #007BFF;
            padding: 10px 20px;
            border: 1px solid #007BFF;
            border-radius: 5px;
            text-align: center;
            background-color: #fff;
        }

        ul li a:hover {
            background-color: #007BFF;
            color: #fff;
        }

        ul li.active a {
            background-color: #007BFF;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <ul>
            <li class="active"><a href="register.php">Register Merchants</a></li>
            <li><a href="userstable.php">View Merchants</a></li>
            <li><a href="userstable.php">Delete Merchants</a></li>
            <li><a href="transactionstable.php">View Transactions</a></li>
            <li><a href="paymentverifier.php">Send Verification Request</a></li>
        </ul>
    </div>
</body>
</html>
