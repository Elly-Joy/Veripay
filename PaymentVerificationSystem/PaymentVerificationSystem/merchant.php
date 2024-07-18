<!DOCTYPE html>
<html>
<head>
    <title>Merchant Module</title>
    <!--<link rel="stylesheet" href="\style.css">-->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://img.freepik.com/free-vector/credit-card-payment-concept-landing-page_52683-25346.jpg?t=st=1717938111~exp=1717941711~hmac=e13137996637997b8fc5a394ec3743121b3fb835fb5e524f756dc916c2d28380&w=900') no-repeat center center fixed;
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
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
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

        ul li:not(.active) a {
            background-color: #fff;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Merchant Module</h1>
        <ul>
            <li class="active"><a href="transactionstable.php">View Transactions</a></li>
            <li><a href="paymentverifier.php">Send Verification Request</a></li>
        </ul>
    </div>
</body>
</html>
