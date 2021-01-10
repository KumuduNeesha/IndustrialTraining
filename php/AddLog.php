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
    $machine_id = $_POST['mid'];
    $date = $_POST['date'];
    $product_id = $_POST['pid'];
    $itemQty = $_POST['qty'];

    $sql = "INSERT INTO `logs`(`worker_id`, `product_id`, `machine_id`, `qty`, `date`) VALUES ('$worker_id', '$product_id', '$machine_id', '$itemQty', '$date')";
}

if ($con->query($sql)) {
    echo "Inserted successfully";
    header("Location: ../pages/Workers/addLog.php");
} else {
    echo "Error:" . $con->error;
}
?>