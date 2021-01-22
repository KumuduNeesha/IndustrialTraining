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

$logid = $_POST['logid'];
$uid = $_POST['currenthiddenuser'];

// sql to delete a record
$sql = "DELETE FROM logs WHERE log_id = $logid AND worker_id = $uid";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: ../pages/Workers/ManageLog.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>