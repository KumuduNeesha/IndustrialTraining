<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM users WHERE fullname = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['fullname'];
   $login_session_role = $row['role'];
   $login_session_id = $row['worker_id'];
   date_default_timezone_set("Asia/Colombo");
   $last_login_time = date("Y-m-d")." ".date("l")." ".date("h:i:sa");
   
   if(!isset($_SESSION['login_user'])){
      header("location: ../index.php");
      die();
   }
?>