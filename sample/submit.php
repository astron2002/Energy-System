<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

$conn = new mysqli('localhost', 'root', '', 'sample');
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}
$stmt = $conn->prepare("INSERT INTO submit(name,email,message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

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
