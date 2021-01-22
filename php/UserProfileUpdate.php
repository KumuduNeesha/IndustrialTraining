<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acl-portal";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uid = $_POST['uid'];
$name = $_POST['name'];
$age = $_POST['age'];
$residence = $_POST['residence'];
$phone = $_POST['phone'];
$password_id = $_POST['password'];

$sql = "UPDATE `users` SET `fullname`='$name',`age`='$age',`residence`='$residence',`phone`='$phone',`password_id`='$password_id' WHERE `worker_id`= '$uid'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: ./logout.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
