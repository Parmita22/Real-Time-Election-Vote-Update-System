<?php
// Database connection
$host = 'localhost';
$db = 'vote_system'; // Replace with your database name
$user = 'root'; // Replace with your database user
$pass = ''; // Replace with your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert candidates
$sql = "INSERT INTO candidates (name, votes) VALUES 
        ('राम सातपुते', 0),
        ('प्रणिती शिंदे', 0),
        ('आतिश बनसोडे', 0),
        ('राजसिंह निवाळकर', 0),
        ('धैर्यशील मोहिते पाटील', 0),
        ('रमेश वारस्कर', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Candidates inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
