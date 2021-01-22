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

$current = $_POST['current'];
$new = $_POST['new'];
$confirm = $_POST['confirm'];
$currenthiddenpw = $_POST['currenthiddenpw'];
$currenthiddenuser = $_POST['currenthiddenuser'];

$sql = "UPDATE `users` SET `password_id`='$confirm' WHERE `worker_id` = $currenthiddenuser";

if ($current == $currenthiddenpw && $new == $confirm && $current != $confirm) {
    if ($conn->query($sql) === TRUE) {
        echo "Password Update Sucessfully";
        header("Location: ./logout.php");
    } else {
        echo "Error updating record: " . $conn->error;
        header("Location: ../pages/Workers/profile.php");
    }
} else {
    echo "Password inputs are invalid: " . $conn->error;
    header("Location: ../pages/Workers/profile.php");
}

$conn->close();
