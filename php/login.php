<?php
// Setting up connection with database Geeks 
$connection = mysqli_connect("localhost", "root", "", "acl-portal");

// Check connection 
if (mysqli_connect_errno()) {
    echo "Database connection failed.";
}

$nic = $_POST["username"];
$password = $_POST["password"];

// query to fetch Username and Password from 
// the table geek 
$query = "SELECT * FROM `users` WHERE `nic_id` = $nic `password_id` = $password";

// Execute the query and store the result set 
$result = mysqli_query($connection, $query);

// it return number of rows in the table. 
// $row = mysqli_num_rows($result);

if (!$connection || mysqli_num_rows($result) == 1) {
    if ($result == "Admin") {
        echo "logged in";
        header("Location: ../Administrator/index.php");
    }
    else {
        echo "logged failed!";
    }
}
header("Location: ../Administrator/index.php");

// Connection close  
mysqli_close($connection);
?>