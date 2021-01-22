<?php
include('../../php/Session.php');
?>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>ACL > Welcome <?php echo $login_session; ?> | Dashboard - ACL Electronics Logs Portal</title>

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
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="padding-left: 60%;">
                <ul class="nav navbar-nav ml-auto">
                    <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only"></span></a> -->
                    <li class="nav-item">
                        <!-- <a class="nav-item nav-link">Login User Name: <?php echo $login_session; ?> </a> -->
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
                <h1>Welcome Back <?php echo $login_session; ?>!</h1>
            </div>
            <div class="col-md-6" style="text-align: end;">
                <h5>Last Login Date</h5>
                <p><?php echo $last_login_time; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="border-color: #005DAA;">
                    <div class="card-header" style="color: #fff; background-color: #005DAA;">
                        User Profile
                    </div>
                    <div class="card-body text-info">
                        <div class="row">
                            <div class="col-sm-3">
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
            <div class="col-md-3">
                <div class="card text-center text-white bg-warning">
                    <div class="card-header">
                        <h3>Logs</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col" style="text-align: center; color: #fff; font-size: 100px;">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <p style="font-size: 75px;">
                                    <?php
                                    $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                                    // Check connection 
                                    if (mysqli_connect_errno()) {
                                        echo "Database connection failed.";
                                    }
                                    $total = 0;
                                    $query = "SELECT l.log_id FROM logs l, users u WHERE l.worker_id = u.worker_id && u.fullname = '$login_session'";
                                    $res = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_array($res)) {
                                        $total = $total + 1;
                                    }

                                    if ($total >= 99) {
                                        $total = "+99";
                                    }

                                    echo $total;
                                    mysqli_close($connection);
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-footer text-muted">
                        <a href="#Logs" class="btn btn-dark" style="width: 100%; color: #fff;">Logs Management</a>
                    </div> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center text-white bg-danger">
                    <div class="card-header">
                        <h3>Defects</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col" style="text-align: center; color: #fff; font-size: 100px;">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <p style="font-size: 75px;">
                                    <?php
                                    $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                                    // Check connection 
                                    if (mysqli_connect_errno()) {
                                        echo "Database connection failed.";
                                    }
                                    $total = 0;

                                    $query = "SELECT d.defect_id FROM defect d, users u WHERE d.worker_id = u.worker_id && u.fullname = '$login_session'";

                                    $res = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_array($res)) {
                                        $total = $total + 1;
                                    }

                                    if ($total >= 99) {
                                        $total = "+99";
                                    }

                                    echo $total;
                                    mysqli_close($connection);
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-footer text-muted">
                        <a href="#Defects" class="btn btn-dark" style="width: 100%; color: #fff;">Defects Management</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div id="Logs" class="container" style="padding-top: 2%;">
        <div class="card" style="border-color: #005DAA;">
            <div class="card-header" style="color: #fff; background-color: #005DAA;">ACL Electronics - Logs Management</div>
            <div class="card-body text-info">
                <div class="row" style="text-align: center; color: #4C4B4B;">
                    <div class="col" style="text-align: left;">
                        <h2>Logs Management</h2>
                    </div>
                    <div class="col" style="text-align: right;">
                        <!-- <input type="button" id="btnExport" style="color: #fff;" class="btn btn-info" value="Export as Excel" onclick="Export()" /> -->
                        <button type="button" onclick="addLog()" style="color: #fff;" class="btn btn-primary">Add New Logs</button>
                        <button type="button" onclick="ManageLog()" style="color: #fff;" class="btn btn-primary">Manage My Logs</button>
                    </div>
                </div>
                <div class="row" style="padding-top: 2%;">
                    <div class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 250px; overflow-x: auto;">
                                    <table id="tabLogs" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">LOG ID</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Code</th>
                                                <th scope="col">Machine Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                                            // Check connection 
                                            if (mysqli_connect_errno()) {
                                                echo "Database connection failed.";
                                            }

                                            $query = "SELECT l.log_id, u.fullname, p.name, p.product_code, m.machine_name, l.qty, l.date FROM logs l, users u, products p, machine m WHERE l.worker_id = u.worker_id && l.product_id = p.product_id && l.machine_id = m.machine_id && u.fullname = '$login_session' ORDER BY log_id DESC;";
                                            $res = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_array($res)) {
                                                $LogNumber = "LOG-" . $row["log_id"];
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $LogNumber;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["name"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["product_code"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["machine_name"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["qty"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["date"];
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

    <div id="Defects" class="container" style="padding-top: 2%;">
        <div class="card" style="border-color: #005DAA;">
            <div class="card-header" style="color: #fff; background-color: #005DAA;">
                <div class="row">
                    <div class="col-sm-4">
                        ACL Electronics - Defects Management
                    </div>
                    <div class="col-sm-8" style="text-align: end;">
                        <p style="font-size: 15px; font-weight: 700;">
                            <?php
                            $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                            // Check connection 
                            if (mysqli_connect_errno()) {
                                echo "Database connection failed.";
                            }
                            $total = 0;
                            $query = "SELECT d.defect_id FROM defect d, users u WHERE d.worker_id = u.worker_id && d.status = 'Authorized' && u.fullname = '$login_session'";
                            $res = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($res)) {
                                $total = $total + 1;
                            }

                            if ($total >= 99) {
                                $total = "+99";
                            }

                            echo "Authorized Defects: " . $total;
                            mysqli_close($connection);
                            ?>

                            <?php
                            echo " | ";
                            ?>

                            <?php
                            $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                            // Check connection 
                            if (mysqli_connect_errno()) {
                                echo "Database connection failed.";
                            }
                            $total = 0;
                            $query = "SELECT d.defect_id FROM defect d, users u WHERE d.worker_id = u.worker_id && d.status = 'Unauthorized' && u.fullname = '$login_session'";
                            $res = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($res)) {
                                $total = $total + 1;
                            }

                            if ($total >= 99) {
                                $total = "+99";
                            }

                            echo "Unauthorized Defects: " . $total;
                            mysqli_close($connection);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body text-info">
                <div class="row" style="text-align: center; color: #4C4B4B;">
                    <div class="col" style="text-align: left;">
                        <h2>Defects Management</h2>
                    </div>
                    <div class="col" style="text-align: right;">
                        <button type="button" onclick="addDefect()" style="color: #fff;" class="btn btn-primary">Add New Defects</button>
                        <button type="button" onclick="ManageDefect()" style="color: #fff;" class="btn btn-primary">Manage My Defects</button>

                        <!-- <input type="button" id="btnExport" style="color: #fff;" class="btn btn-info" value="Export as Excel" onclick="Export()" /> -->
                    </div>
                </div>
                <div class="row" style="padding-top: 2%;">
                    <div class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 250px; overflow-x: auto;">
                                    <table id="tblCustomers" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Defect ID</th>
                                                <th scope="col">Reason</th>
                                                <th scope="col">Machine Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                                            // Check connection 
                                            if (mysqli_connect_errno()) {
                                                echo "Database connection failed.";
                                            }

                                            $query = "SELECT d.defect_id, r.reason, u.fullname, m.machine_name, d.date, p.name, d.itemQty, d.status FROM defect d, reason r, users u, machine m, products p WHERE d.reason_id = r.reason_id && d.worker_id = u.worker_id && d.machine_id = m.machine_id && d.product_id = p.product_id && u.fullname = '$login_session' ORDER BY defect_id DESC";
                                            $res = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_array($res)) {
                                                $defNumber = "Def-" . $row["defect_id"];
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $defNumber;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["reason"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["machine_name"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["date"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["name"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["itemQty"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["status"];
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

        function Export() {
            $("#tblCustomers").table2excel({
                filename: "Table.xls"
            });
        }

        function addLog() {
            window.open("./addLog.php", "_self");
        }

        function ManageLog() {
            window.open("./ManageLog.php", "_self");
        }

        function addDefect() {
            window.open("./addDefect.php", "_self");
        }

        function ManageDefect() {
            window.open("./ManageDefect.php", "_self");
        }
    </script>
</body>

</html>