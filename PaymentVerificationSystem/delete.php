<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];

    // Database connection details
    $conn = mysqli_connect("localhost", "root", "", "veripay");

    // Check connection
    if (mysqli_connect_errno()) {
        echo json_encode(['success' => false, 'message' => 'Failed to connect to MySQL: ' . mysqli_connect_error()]);
        exit();
    }

    // Delete the record
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete record']);
    }

    $stmt->close();
    $conn->close();
}
?>
