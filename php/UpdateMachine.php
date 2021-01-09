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

$uid = $_POST['mid'];
$name = $_POST['name'];
$type = $_POST['Type'];

$sql = "UPDATE `machine` SET `machine_name`='$name',`machine_type`='$type' WHERE `machine_id`='$uid'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: ../Administrator/manage-machine.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>