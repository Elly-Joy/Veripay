<!DOCTYPE html>
<html>
<head>
    <title>Merchant Module</title>
    <!--<link rel="stylesheet" href="\style.css">-->
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
        color: #FFA500;
        padding: 10px 20px;
        border: 1px solid #FFA500;
        border-radius: 5px;
        text-align: center;
        background-color: #fff;
    }

    ul li a:hover {
        background-color: #FFA500;
        color: #fff;
    }

    ul li.active a {
        background-color: #FFA500;
        color: #fff;
    }

    ul li:not(.active) a {
        background-color: #fff;
        color: #FFA500;
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Merchant Module</h1>
        <ul>
            <li class="active"><a href="transactiontable.php">View Transactions</a></li>
            <li><a href="paymentverifier.php">Send Verification Request</a></li>
            <li><a href="/stk">Send StkPush Request</a></li>
        </ul>
    </div>
</body>
</html>