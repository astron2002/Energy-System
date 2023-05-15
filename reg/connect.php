<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Retrieve form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

// Create connection to MySQL database
$conn = new mysqli('localhost', 'root', '', 'reg');
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Prepare and bind statement to insert data into database
$stmt = $conn->prepare("INSERT INTO Register(firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);

// Execute statement and check for success
if ($stmt->execute() === TRUE) {
  echo "Registration successful";
} else {
  echo "Error: " . $stmt->error;
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
