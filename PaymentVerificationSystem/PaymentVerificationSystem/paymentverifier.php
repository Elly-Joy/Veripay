<!DOCTYPE html>
<html>
<head>
    <title>Transaction Verification</title>
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
            width: 50%;
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

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p#status-message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">

    <h1>Transaction Verification</h1>
    
    <label for="transaction-id">Enter Transaction ID</label>
    <input type="text" id="transaction-id" name="transaction-id">
    
    <button onclick="verifyTransaction()">Verify</button>
    
    <p id="status-message"></p>

    
    <script>
        function verifyTransaction() {
            // Get the transaction ID from the input field
            const transactionId = document.getElementById("transaction-id").value;
            
            // Simulate a database query to check if the transaction exists
            const transactionExists = checkTransactionInDatabase(transactionId);
            
            // Update the status message based on the result
            const statusMessage = document.getElementById("status-message");
            if (transactionExists) {
                statusMessage.textContent = "Transaction found in the database.";
            } else {
                statusMessage.textContent = "Transaction not found in the database.";
            }
        }
        function checkTransactionInDatabase(transactionId) {
            // Simulate a database query
            return transactionId === "123456789";
        }
    </script>
    </div>
</body>
</html>
