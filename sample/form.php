<?php
ini_set("display_errors",1);
error_reporting(E_ALL);


$name = $_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

$conn = new mysqli('localhost','root','','sample');
if($conn->connect_error)
{
    die('Connection Error:'.$conn->connect_error);
}

$stmt=$conn->prepare("INSERT INTO form(name,email,message) VALUES(?,?,?)");
$stmt->bind_param("sss",$name, $email, $message);

if($stmt->execute()===TRUE)
{
    echo "Registration done";
}
else
{
    echo "Registration not done. Error".$stmt->error;
}
$stmt->close();
$conn->close();
?>