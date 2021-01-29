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
                    <div class="card-header bg-primary" style="color: #fff;">Add Daily Attendance</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Daily Attendance Sheet</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <div class="row">
                            <div class="col-md-6">
                                <form action="../../php/OTAttendance.php" method="POST">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Worker Name</label>
                                        <select class="form-control" id="uid" name="uid" required>
                                            <option disabled selected>- Select Worker Name -</option>
                                            <?php
                                            include "../../php/DBConnection.php";  // Using database connection file here
                                            $records = mysqli_query($db, "SELECT `worker_id`,`fullname`,`role` FROM `users` ORDER BY `role`");  // Use select query here 

                                            while ($data = mysqli_fetch_array($records)) {
                                                echo "<option value='" . $data['worker_id'] . "'>" . $data['fullname'] . " - (" . $data['role'] . ")" . "</option>";  // displaying data in option menu
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Date</label>
                                        <input type="date" class="form-control" placeholder="Date" id="date" name="date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">In Time</label>
                                        <input type="time" class="form-control" id="intime" name="intime" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Out Time</label>
                                        <input type="time" class="form-control" id="outtime" name="outtime" required>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label for="formGroupExampleInput2">Working Hours</label>
                                                        <input type="text" class="form-control" id="whours" name="whours" required>
                                                    </div>
                                                    <!-- <div class="col-sm-4">
                                                        <label for="formGroupExampleInput2">OT Hours</label>
                                                        <input type="number" class="form-control" id="OThours" name="OThours" disabled>
                                                    </div> -->
                                                    <!-- <div class="col-sm-4">
                                                        <label for="formGroupExampleInput2">Calculate OT Hours:</label>
                                                        <button type="function" class="btn btn-primary" onclick="othourscal()">Calculate OT Hours</button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Over Time - Hours</label>
                                        <input type="text" class="form-control" id="othours" name="othours" disabled>
                                        <input type="text" id="othours1" name="othours1" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Over Time Payments</label>
                                        <input type="text" class="form-control" id="salaryot" name="salaryot" disabled>
                                        <input type="text" id="salaryot1" name="salaryot1" hidden>
                                    </div>
                                    <br><br>
                                    <button type="submit" id="btnsubsalary" name="btnsubsalary" class="btn btn-primary" hidden>Add Another One</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <h3>Calculations</h3>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Input Working Hours</label>
                                    <input type="text" class="form-control" id="calwhours" name="calwhours" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Over Time Payment</label>
                                    <select class="form-control" id="calpay" name="calpay" required>
                                        <option disabled selected>- Select Month -</option>
                                        <?php
                                        include "../../php/DBConnection.php";  // Using database connection file here
                                        $records = mysqli_query($db, "SELECT `month`,`ot_payment` FROM `ot`");  // Use select query here 

                                        while ($data = mysqli_fetch_array($records)) {
                                            echo "<option value='" . $data['ot_payment'] . "'>" . $data['month'] . " - (" . $data['ot_payment'] . ")" . "</option>";  // displaying data in option menu
                                        }
                                        ?>
                                    </select>
                                </div><br>
                                <div class="form-group">
                                    <button class="btn btn-primary" style="width: 100%;" onclick="othourscal()">Calculate</button>
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

    <script>
        var d = new Date();
        var n = d.toLocaleTimeString();
        document.getElementById("lastLoginTime").innerHTML = n;

        function othourscal() {
            var hours = document.getElementById("calwhours").value;
            var salary = document.getElementById("calpay").value;

            if (hours != "" && salary != "" && hours <= 24) {
                if (hours <= 8) {
                    ot = 0;
                } else {
                    var ot = hours - 8;
                }
                document.getElementById("othours").value = ot;
                document.getElementById("salaryot").value = ot * salary;
                document.getElementById("othours1").value = ot;
                document.getElementById("salaryot1").value = ot * salary;
                document.getElementById("btnsubsalary").hidden = false;
            } else {
                document.getElementById("calwhours").value = "";
                // document.getElementById("calpay").value = "";
                document.getElementById("othours").value = "";
                document.getElementById("salaryot").value = "";
                document.getElementById("othours1").value = "";
                document.getElementById("salaryot1").value = "";
                document.getElementById("calwhours").placeholder = "Please enter valid details";
                // document.getElementById("calpay").placeholder = "Please enter valid details";
            }
        }
    </script>
</body>

</html>