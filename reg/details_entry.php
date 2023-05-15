<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$number=$_POST['number'];

$conn = new mysqli('localhost','root','','database123');
if($conn->connect_error)
{
	die ("Connection Error".$conn->connect_error);

}
$stmt=$conn->prepare("INSERT INTO entry_details(first_name,last_name,gender,email,number) VALUES(?,?,?,?,?)");
$stmt->bind_param("ssssi",$first_name,$last_name,$gender,$email,$number);

if($stmt->execute()===TRUE)
{
	echo "Registration Done";
}
else
{
	echo "Registration Error: ".$stmt->error;
}

$stmt->close();
$conn->close();


?>
