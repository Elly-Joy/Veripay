<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Verification</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: url('https://www.freepik.com/free-photo/tree-grows-coin-glass-jar-with-copy-space_26568869.htm#fromView=search&page=1&position=7&uuid=18158b5d-0f93-4a1e-b560-53cc0c04418e') no-repeat center center fixed;
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
        background-color: #FFA500;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #cc8400;
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
    </div>

    <script>
        function verifyTransaction() {
            // Get the transaction ID from the input field
            const transactionId = document.getElementById("transaction-id").value;
            
            // Send the transaction ID to the server for verification
            fetch('verifytransaction.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ transactionId: transactionId })
            })
            .then(response => response.json())
            .then(data => {
                // Update the status message based on the result
                const statusMessage = document.getElementById("status-message");
                if (data.exists) {
                    statusMessage.textContent = "Transaction was successful.";
                } else {
                    statusMessage.textContent = "Transaction not found.";
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const statusMessage = document.getElementById("status-message");
                statusMessage.textContent = "An error occurred. Please try again.";
            });
        }
    </script>
</body>
</html>