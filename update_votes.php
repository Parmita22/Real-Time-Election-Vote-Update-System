<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vote_system"; // Fixed missing closing quote

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $votes = $_POST['votes'];

    // Sanitize input
    $name = $conn->real_escape_string($name);
    $votes = intval($votes);

    // Update query
    $sql = "UPDATE candidates SET votes = ? WHERE name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("is", $votes, $name);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
