<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM users WHERE fullname = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session_id = $row['worker_id'];
   $login_session = $row['fullname'];
   $login_session_role = $row['role'];
   $login_session_Age = $row['age'];

   $login_session_Sex = $row['gender'];
   $login_session_Residence = $row['residence'];
   $login_session_Salary = $row['salary'];

   $login_session_Phone = $row['phone'];
   $login_session_NIC = $row['nic_id'];
   $login_session_Password = $row['password_id'];


   date_default_timezone_set("Asia/Colombo");
   $last_login_time = date("Y-m-d")." ".date("l")." ".date("h:i:sa");
   
   if(!isset($_SESSION['login_user'])){
      header("location: ../index.php");
      die();
   }
