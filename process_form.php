<?php
$host = "localhost";
$username = "root";
$password = "root";
$database = "takeglobal";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['Name'];
$email = $_POST['Email'];
$message = $_POST['Message'];

$response = array();

// Insert data into the database
$sql = "INSERT INTO contact (name,email, requirement) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    // Data inserted successfully
    $response['status'] = 'success';
    $response['message'] = 'We will get back to you shortly';
} else {
    // Error in insertion
    $response['status'] = 'error';
    $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();

// Send JSON response back to JavaScript
echo json_encode($response);
?>
