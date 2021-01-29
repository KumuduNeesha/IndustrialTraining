<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acl-portal";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $worker_id = $_POST['uid'];
    $date = $_POST['date'];
    $month = date("F");
    $intime = $_POST['intime'];
    $outtime = $_POST['outtime'];
    $whours = $_POST['whours'];
    $othours = $_POST['othours1'];
    $salaryot = $_POST['salaryot1'];

    $sql = "INSERT INTO `attendance`(`worker_id`, `date`, `month`, `in_time`, `out_time`, `working_hours`, `ot_hours`, `ot_salary`) VALUES ('$worker_id', '$date', '$month', '$intime', '$outtime', '$whours', '$othours', '$salaryot')";
}

if ($con->query($sql)) {
    echo "Inserted successfully";
    header("Location: ../pages/human-resource/attendance.php");
} else {
    echo "Error:" . $con->error;
}
?>