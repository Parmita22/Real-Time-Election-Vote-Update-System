<?php
// Database connection
$host = 'localhost';
$db = 'vote_system'; // Replace with your database name
$user = 'root'; // Replace with your database username
$pass = ''; // Replace with your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch votes for all candidates
$sql = "SELECT name, votes FROM candidates";
$result = $conn->query($sql);

$candidates = array();
while ($row = $result->fetch_assoc()) {
    $candidates[] = $row;
}

echo json_encode($candidates);

$conn->close();
