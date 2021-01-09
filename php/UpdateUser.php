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
$role = $_POST['role'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$residence = $_POST['residence'];
$salary = $_POST['salary'];
$phone = $_POST['phone'];
$nic_id = $_POST['nic'];
$password_id = $_POST['password'];

$sql = "UPDATE `users` SET `fullname`='$name',`role`='$role',`age`='$age',`gender`='$gender',`residence`='$residence',`salary`='$salary',`phone`='$phone',`nic_id`='$nic_id',`password_id`='$password_id' WHERE `worker_id`= '$uid'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: ../Administrator/manage-user.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>