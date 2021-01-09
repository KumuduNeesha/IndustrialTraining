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

// sql to delete a record
$sql = "DELETE FROM machine WHERE machine_id = $uid";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: ../Administrator/manage-machine.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>