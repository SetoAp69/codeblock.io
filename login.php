<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if both username and password are provided
    if (!isset($_POST['username'], $_POST['password'])) {
        die(json_encode(array("message" => "Incomplete form data")));
    }

    // Extract username and password from POST data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'programmingblock');

    // Check connection
    if ($conn->connect_error) {
        die(json_encode(array("message" => "Connection failed: " . $conn->connect_error)));
    }

    // Prepare SQL statement to check player table
    $checkPlayerStmt = $conn->prepare("SELECT Username, Password FROM player WHERE Username = ?");
    $checkPlayerStmt->bind_param("s", $username);
    $checkPlayerStmt->execute();
    $checkPlayerStmt->store_result();

    // If username exists in player table
    if ($checkPlayerStmt->num_rows > 0) {
        $checkPlayerStmt->bind_result($dbUsername, $dbPassword);
        $checkPlayerStmt->fetch();
        // Verify password
        if ($password === $dbPassword) {
            $_SESSION['username'] = $username;
            die(json_encode(array("message" => "Login successful", "type" => "player")));
        } else {
            die(json_encode(array("message" => "Incorrect password")));
        }
    }

    // If username doesn't exist in player table, check guru table
    $checkGuruStmt = $conn->prepare("SELECT Username, Password FROM guru WHERE Username = ?");
    $checkGuruStmt->bind_param("s", $username);
    $checkGuruStmt->execute();
    $checkGuruStmt->store_result();

    // If username exists in guru table
    if ($checkGuruStmt->num_rows > 0) {
        $checkGuruStmt->bind_result($dbUsername, $dbPassword);
        $checkGuruStmt->fetch();
        // Verify password
        if ($password === $dbPassword) {
            $_SESSION['username'] = $username;
            die(json_encode(array("message" => "Login successful", "type" => "guru")));
        } else {
            die(json_encode(array("message" => "Incorrect password")));
        }
    }

    // If username doesn't exist in both player and guru tables
    die(json_encode(array("message" => "User not found")));
} else {
    // Method not allowed
    die(json_encode(array("message" => "Method not allowed")));
}
?>
