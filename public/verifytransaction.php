<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "veripay";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the transaction ID from the request
    $data = json_decode(file_get_contents('php://input'), true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON']);
        exit();
    }
    $transactionId = $data['transactionId'];

    // Query the database to check if the transaction ID exists
    $sql = "SELECT * FROM mpesa_transactions WHERE TransID = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['error' => 'SQL prepare failed: ' . $conn->error]);
        exit();
    }
    $stmt->bind_param("s", $transactionId);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = array();
    if ($result->num_rows > 0) {
        $response['exists'] = true;
    } else {
        $response['exists'] = false;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
 // Send the response back to the client
 header('Content-Type: application/json');
 echo json_encode($response); 
 exit();
}
?>