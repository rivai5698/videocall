<?php
$servername = "123.31.17.59";
$username = "carticket";
$password = "Carticket#2020";
$database = "cheap";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>