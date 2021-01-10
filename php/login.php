<?php      
    include('./DBConnection.php'); 

    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password); 

        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "SELECT * FROM users WHERE nic_id = '$username' AND password_id = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "Login successful";  
            
            $query = "SELECT * FROM users WHERE nic_id = '$username' AND password_id = '$password';";
            $result = mysqli_query($con, $query);  
            while ($row = mysqli_fetch_array($result)) {
                $UserType = $row["role"];
                $myusername = $row["fullname"];
            }

            if ($UserType == "Admin") {
                header("Location: ../Administrator/index.php");
            }
            if ($UserType == "Manager") {
                header("Location: ../pages/manager/index.php");
            }
            if ($UserType == "Supervisor") {
                header("Location: ../pages/supervisor/index.php");
            }
            if ($UserType == "Intern Trainee" || $UserType == "Minor Employee") {
                session_start();
                $_SESSION['login_user'] = $myusername;
                header("Location: ../pages/Workers/index.php");
            }
        }  
        else{  
            echo "Login failed. Invalid username or password."; 
            header("Location: ../pages/login.php"); 
        }     
?>  