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

$status = "Authorized";
$defid = $_POST['did'];

$sql = "UPDATE `defect` SET `status`='$status' WHERE `defect_id`='$defid'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: ../pages/supervisor/manage-defects.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>