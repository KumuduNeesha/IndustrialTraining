<?php
include('../../php/Session.php');
?>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>ACL > Add Daily Attendance | Human Resource Management Dashboard - ACL Electronics Logs Portal</title>

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
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary" style="color: #fff;">Monthly Salary Details</div>
                    <div class="card-body text-primary">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="card-title">Monthly Salary Sheet</h5>
                            </div>
                            <div class="col-sm-6" style="text-align: end;">
                                <!-- <button type="button" class="btn btn-warning" data-type="excel">Export to Excel</button> -->
                            </div>
                        </div><br>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div style="height: 1000px; overflow-x: auto;">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Employee ID Number</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Month</th>
                                                <th scope="col">Basic Salary</th>
                                                <th scope="col">Total OT Hours</th>
                                                <th scope="col">Total OT Payment</th>
                                                <th scope="col">Net Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                                            // Check connection 
                                            if (mysqli_connect_errno()) {
                                                echo "Database connection failed.";
                                            }
                                            $Currentmonth = date("F");
                                            $query = "SELECT a.worker_id, u.fullname, u.salary, a.in_time, a.out_time, a.working_hours, a.ot_hours FROM attendance a, users u WHERE a.worker_id = u.worker_id && a.month = '$Currentmonth' GROUP BY worker_id ORDER BY date DESC;";

                                            $res = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_array($res)) {
                                                $reguser = $row["worker_id"];
                                                $SumofOT = 0;
                                                $otSalary = 0;
                                                $month = date("F");

                                                $query2 = "SELECT ot_hours, ot_salary FROM attendance WHERE worker_id = $reguser;";
                                                $res2 = mysqli_query($connection, $query2);
                                                while ($row2 = mysqli_fetch_array($res2)) {
                                                    $SumofOT = $SumofOT + $row2["ot_hours"];
                                                    $otSalary = $otSalary + $row2["ot_salary"];
                                                }

                                                $RegNumber = "ACL-" . $row["worker_id"];
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $RegNumber;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["fullname"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $month;
                                                echo "</td>";
                                                echo "<td>";
                                                echo "LKR " . $row["salary"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $SumofOT;
                                                echo "</td>";
                                                echo "<td>";
                                                echo "LKR " . ($otSalary);
                                                echo "</td>";
                                                echo "<td>";
                                                echo "LKR " . ($row["salary"] + $otSalary);
                                                echo "</td>";
                                            }
                                            mysqli_close($connection);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="text-align: end;">
                                <a href="./index.php" class="btn btn-primary">Cancel</a>
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
    <script src="../../assets/tableExport/tableExport.js"></script>
    <script type="../../assets/text/javascript" src="tableExport/jquery.base64.js"></script>
    <script src="../../assets/js/export.js"></script>

</body>

</html>