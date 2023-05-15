<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$loan_amount = $_POST['loan_amount'];
$loan_term = $_POST['loan_term'];
$credit_score = $_POST['credit_score'];
$income = $_POST['income'];
$collateral = $_POST['collateral'];
$purpose = $_POST['purpose'];

// Create connection to MySQL database
$conn = new mysqli('localhost', 'root', '', 'reg');
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Prepare and bind statement to insert data into database
$stmt = $conn->prepare("INSERT INTO Bank(name,email,phone,loan_amount,loan_term,credit_score,income,collateral,purpose) VALUES (?, ?, ?, ?, ?, ?,?,?,?)");
$stmt->bind_param("ssiisiiss",$name,$email,$phone,$loan_amount,$loan_term,$credit_score,$income,$collateral,$purpose);

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
