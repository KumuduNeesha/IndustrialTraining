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

$defID = $_POST['defID'];
$uid = $_POST['currenthiddenuser'];

// sql to delete a record
$sql = "DELETE FROM defect WHERE defect_id = $defID AND worker_id = $uid";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: ../pages/Workers/ManageDefect.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>