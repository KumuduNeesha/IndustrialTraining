<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acl-portal";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $residence = $_POST['residence'];
    $salary = $_POST['salary'];
    $phone = $_POST['phone'];
    $nic_id = $_POST['nic'];
    $password_id = $_POST['password'];
    $register_date = $_POST['regdate'];

    $sql = "INSERT INTO `users`(`fullname`, `role`, `age`, `gender`, `residence`, `salary`, `phone`, `nic_id`, `password_id`, `register_date`) VALUES ('$name', '$role', '$age', '$gender', '$residence', '$salary', '$phone', '$nic_id', '$password_id', '$register_date')";
}

if ($con->query($sql)) {
    echo "Inserted successfully";
    header("Location: ../Administrator/index.php");
} else {
    echo "Error:" . $con->error;
}
?>