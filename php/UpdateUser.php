<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acl-portal";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
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
    
    $sql = "UPDATE `users` SET `fullname`='$name',`role`='$role',`age`='$age',`gender`='$gender',`residence`='$residence', `salary`='$salary',`phone`='$phone',`nic_id`='$nic_id',`password_id`='$password_id' WHERE `worker_id`='$uid'";
}

if ($con->query($sql)) {
    echo "Inserted successfully";
    header("Location: ../Administrator/manage-user.php");
} else {
    echo "Error:" . $con->error;
}
?>