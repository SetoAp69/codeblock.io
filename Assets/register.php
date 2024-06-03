<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all necessary data is provided
    if (!isset($_POST['email'], $_POST['username'], $_POST['role'], $_POST['password'])) {
        die('Incomplete form data');
    }

    // Extract form data
    $email = $_POST['email'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];


    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'programmingblock');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Choose the table based on the role
    $table = ($role === 'guru') ? 'guru' : 'player';

    // Check if username already exists
    $checkStmt = $conn->prepare("SELECT Username FROM guru WHERE Username = ?");
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkStmt->store_result();
    if ($checkStmt->num_rows > 0) {
        // Username already exists
        http_response_code(409);
        die;
    }
    $checkStmt->close();

    $checkStmt2 = $conn->prepare("SELECT Username FROM player WHERE Username = ?");
    $checkStmt2->bind_param("s", $username);
    $checkStmt2->execute();
    $checkStmt2->store_result();
    if ($checkStmt2->num_rows > 0) {
        // Username already exists
        http_response_code(409);
        die;
    }
    $checkStmt2->close();

    // Prepare SQL statement for insertion
    $insertStmt = $conn->prepare("INSERT INTO $table (Email, Username, Password) VALUES (?, ?, ?)");
    $insertStmt->bind_param("sss", $email, $username, $password);

    // Execute SQL statement for insertion
    if ($insertStmt->execute() === TRUE) {
        // Registration successful
        echo json_encode(array("message" => "Registration successful"));
    } else {
        // Registration failed
        echo json_encode(array("message" => "Registration failed"));
    }

    // Close statement and connection
    $insertStmt->close();
    $conn->close();
} else {
    // Method not allowed
    echo json_encode(array("message" => "Method not allowed"));
}
?>
