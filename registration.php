<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Get form data
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$type = $_POST['type'];
$password = $_POST['password'];


// Prepare SQL statement
if ($type === 'doctor') {
    $sql = "INSERT INTO Doctors (name, contact, email, password) VALUES ('$name', '$contact', '$email', '$password')";
} else {
    $sql = "INSERT INTO Patients (name, contact, email, password) VALUES ('$name', '$contact', '$email', '$password')";
}

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
