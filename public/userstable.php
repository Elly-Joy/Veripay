<!DOCTYPE html>
<html>
<head>
    <title>User Records</title>
    
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
        width: 100%;
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
        background-color: #ff8c00; /* Changed from orange (#ff9800) to dark orange (#ff8c00) */
        color: #fff;
    }
</style>

</style>

</head>
<body>
    <div class="container">
        <h1>Users Records</h1>
        <table>
            <tr>
                <th>Merchant ID</th>
                <th>Merchant Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>User Type</th>

                <th>Password</th>
               
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            <?php
            // Replace "your_database_name" with the actual name of your database
            $conn = mysqli_connect("localhost", "root", "", "veripay");

            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            $result = mysqli_query($conn, "SELECT * FROM users");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['usertype'] . "</td>";
                
                echo "<td>" . $row['password'] . "</td>";
               
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td>" . $row['updated_at'] . "</td>";
                echo "<td>
                        <button onclick=\"deleteRecord(" . $row['id'] . ")\">Delete</button>
                      </td>";
                echo "</tr>";
            }

            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </table>
    </div>

    <script>
        function deleteRecord(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                // Send a request to delete the record
                fetch('delete.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Record deleted successfully');
                        location.reload();
                    } else {
                        alert('Failed to delete record');
                    }
                });
            }
        }
    </script>
</body>
</html>