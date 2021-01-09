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
    $Type = $_POST['Type'];

    $sql = "INSERT INTO `machine`(`machine_name`, `machine_type`) VALUES ('$name', '$Type')";
}

if ($con->query($sql)) {
    echo "Inserted successfully";
    header("Location: ../Administrator/index.php");
} else {
    echo "Error:" . $con->error;
}
?>