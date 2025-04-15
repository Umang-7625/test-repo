<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Database credentials for ByetHost (replace with your actual values)
$servername = "sql206.byethost32.com";
$username = "b32_38636009";
$password = "Umang7625";
$dbname = "b32_38636009_php_dht";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if temp and hum parameters are received
if (isset($_GET["temp"]) && isset($_GET["hum"])) {
    $temp = floatval($_GET["temp"]);  // Convert string to float
    $hum = floatval($_GET["hum"]);    // Convert string to float

    // Insert data into the database
    $sql = "INSERT INTO sensor_data (temp, hum) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dd", $temp, $hum);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Missing 'temp' or 'hum' parameters!";
}

$conn->close();
?>
