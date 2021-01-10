<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acl-portal";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $reason_id = $_POST['reason'];
    $worker_id = $_POST['uid'];
    $machine_id = $_POST['mid'];
    $date = $_POST['date'];
    $product_id = $_POST['pid'];
    $itemQty = $_POST['qty'];

    $sql = "INSERT INTO `defect`(`reason_id`, `worker_id`, `machine_id`, `date`, `product_id`, `itemQty`) VALUES ('$reason_id', '$worker_id', '$machine_id', '$date', '$product_id', '$itemQty')";
}

if ($con->query($sql)) {
    echo "Inserted successfully";
    header("Location: ../pages/Workers/addDefect.php");
} else {
    echo "Error:" . $con->error;
}
?>