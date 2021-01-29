<?php
include('../../php/Session.php');
?>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>ACL > Welcome <?php echo $login_session; ?> | Human Resource Management Dashboard - ACL Electronics Logs Portal</title>

    <!-- CSS only -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="../../assets/custom css/scrollbar.css" rel="stylesheet">

    <!-- JavaScript Bundle with Popper -->
    <script src="../assets/js/table2excel.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color: #005DAA; padding: 0px;">
        <div class="container">
            <a class="navbar-brand mb-0 h1"><img src="../../favicon.ico"> ACL Electronics</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="padding-left:50%;">
                <ul class="nav navbar-nav ml-auto">
                    <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only"></span></a> -->
                    <li class="nav-item">
                        <a class="nav-item nav-link active" href="./calender.html"><i class="fa fa-calendar" aria-hidden="true"></i> Calender</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link active" href="./index.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link active" href="./profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link active" href="../../php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top: 2%;">
        <div class="row">
            <div class="col-md-6">
                <h5>Welcome HRM Dashbord!</h5>
                <h5>Human Resource Manager - <?php echo $login_session; ?></h5>
            </div>
            <div class="col-md-6" style="text-align: end;">
                <h5>Last Login Date</h5>
                <p><?php echo $last_login_time; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-color: #005DAA;">
                    <div class="card-header" style="color: #fff; background-color: #005DAA;">
                        User Profile
                    </div>
                    <div class="card-body text-info">
                        <div class="row">
                            <div class="col-sm-3" style="text-align: center;">
                                <img src="../../images/avatar.png" style="max-height: 147.5px;">
                            </div>
                            <div class="col">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Full Name</th>
                                            <td><?php echo $login_session; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Job Title</th>
                                            <td><?php echo $login_session_role; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone Number</th>
                                            <td><?php echo $login_session_Phone; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NIC</th>
                                            <td><?php echo $login_session_NIC; ?></td>
                                        </tr>
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <ul class="list-group">
                                    <li class="list-group-item"><a style="width: 100%;" class="btn btn-primary" href="./profile.php" role="button"><i class="fa fa-pencil-square" aria-hidden="true"></i> Update Details</a></li>
                                    <li class="list-group-item"><a style="width: 100%;" class="btn btn-primary" href="https://mail.google.com/mail/u/0/?tab=wm&ogbl#inbox" role="button"><i class="fa fa-envelope" aria-hidden="true"></i> My Mail Box</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 2%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-center border-primary">
                    <div class="card-header bg-primary">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Monthly Salary Bill Management</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" style="color: #fff;" href="#">Link</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link disabled" style="color: #fff;" href="#">Disabled</a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">Employees Attendance</h5>
                            </div>
                            <div class="col">
                                <a href="./attendance.php" class="btn btn-primary">Add Dailay Attendance</a>
                                <a href="./salary.php" class="btn btn-primary">Salary Calculate</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 250px; overflow-x: auto;">
                                    <table id="tabEmp" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Employee ID Number</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">In Time</th>
                                                <th scope="col">Out Time</th>
                                                <th scope="col">Working Hours</th>
                                                <th scope="col">OT Hours</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                                            // Check connection 
                                            if (mysqli_connect_errno()) {
                                                echo "Database connection failed.";
                                            }

                                            $query = "SELECT a.worker_id, u.fullname, a.date, a.in_time, a.out_time, a.working_hours, a.ot_hours FROM attendance a, users u WHERE a.worker_id = u.worker_id ORDER BY date DESC;";
                                           
                                            $res = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_array($res)) {
                                                $RegNumber = "ACL-" . $row["worker_id"];
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $RegNumber;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["fullname"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["date"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["in_time"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["out_time"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["working_hours"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["ot_hours"];
                                                echo "</td>";
                                            }
                                            mysqli_close($connection);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Employers" class="container" style="padding-top: 2%;">
        <div class="card border-primary">
            <div class="card-header bg-primary" style="color: #fff;">ACL Electronics - User Management</div>
            <div class="card-body text-primary">
                <div class="row" style="text-align: center; color: #4C4B4B;">
                    <div class="col" style="text-align: left;">
                        <h2>User Management</h2>
                    </div>
                    <div class="col" style="text-align: right;">
                        <!-- <a href="./manage-user.php" class="btn btn-primary" style="color: #fff;"><i class="fa fa-pencil-square" aria-hidden="true"></i> Manage Users Details</a> -->

                        <!-- <a href="./AddNewUser.html" class="btn btn-primary" style="color: #fff;"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New User</a> -->
                    </div>
                </div>
                <div class="row" style="padding-top: 2%;">
                    <div class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 250px; overflow-x: auto;">
                                    <table id="tabEmp" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Employee ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">User Role</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Residance</th>
                                                <th scope="col">Salary</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">NIC (username)</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Registration Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                                            // Check connection 
                                            if (mysqli_connect_errno()) {
                                                echo "Database connection failed.";
                                            }

                                            $query = "SELECT * FROM users ORDER BY worker_id DESC;";
                                            $res = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_array($res)) {
                                                $RegNumber = "ACL-" . $row["worker_id"];
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $RegNumber;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["fullname"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["role"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["age"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["gender"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["residence"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["salary"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["phone"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["nic_id"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["password_id"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["register_date"];
                                                echo "</td>";
                                            }
                                            mysqli_close($connection);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div style="padding-top: 5%;">
    </div>
    <div style="background-color: #005DAA; text-align: center; margin: 0px; padding: 2%;">
        <p style="color: #fff; font-size: 13px;">ACL Electronics Sri Lanka 2021 - All Rights Reserved</p>
    </div>

    <script>
        var d = new Date();
        var n = d.toLocaleTimeString();
        document.getElementById("lastLoginTime").innerHTML = n;
    </script>
</body>

</html>