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
$patientName = $_POST['patientName'];
$age = $_POST['age'];
$address = $_POST['address'];
$appointmentDate = $_POST['appointmentDate'];
$diseaseDescription = $_POST['diseaseDescription'];
$symptoms = implode(", ", $_POST['symptoms']); // Convert array to string

// Prepare SQL statement
$sql = "INSERT INTO Appointments (patientName, age, address, appointmentDate, diseaseDescription, symptoms) VALUES ('$patientName', '$age', '$address', '$appointmentDate', '$diseaseDescription', '$symptoms')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
