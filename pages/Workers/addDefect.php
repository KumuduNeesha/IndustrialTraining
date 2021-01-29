<?php
include('../../php/Session.php');
?>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>ACL > Submit Defects - ACL Electronics Logs Portal</title>

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

    <div id="Defects" class="container" style="padding-top: 2%;">
        <div class="card border-primary">
            <div class="card-header bg-primary" style="color: #fff;">
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
            <div class="card-body text-primary">
                <div class="row" style="text-align: center; color: #4C4B4B;">
                    <div class="col" style="text-align: left;">
                        <h2>Defects Management</h2>
                    </div>
                    <div class="col" style="text-align: right;">
                        <!-- <button type="button" onclick="addDefect()" style="color: #fff;" class="btn btn-info">Add New Defects</button> -->
                        <button type="button" onclick="ManageDefect()" style="color: #fff;" class="btn btn-primary">Manage My Defects</button>

                        <!-- <input type="button" id="btnExport" style="color: #fff;" class="btn btn-info" value="Export as Excel" onclick="Export()" /> -->
                    </div>
                </div>
                <div class="row" style="padding-top: 2%;">
                    <div class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 250px; overflow-x: auto;">
                                    <table id="tblDefects" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Defect ID</th>
                                                <th scope="col">Reason</th>
                                                <th scope="col">Machine Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Supervisor Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                                            // Check connection 
                                            if (mysqli_connect_errno()) {
                                                echo "Database connection failed.";
                                            }

                                            $query = "SELECT d.defect_id, r.reason, u.fullname, m.machine_name, d.date, p.name, d.itemQty, d.status, d.supervisor FROM defect d, reason r, users u, machine m, products p WHERE d.reason_id = r.reason_id && d.worker_id = u.worker_id && d.machine_id = m.machine_id && d.product_id = p.product_id && u.fullname = '$login_session' ORDER BY defect_id DESC";
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
                                                echo "<td>";
                                                echo $row["supervisor"];
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

    <div class="container" style="padding-top: 2%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary" style="color: #fff;">ACL Electronics - Add Defect</div>
                    <div class="card-body text-primary">
                        <div class="row" style="text-align: center; color: #4C4B4B;">
                            <div class="col" style="text-align: left;">
                                <h2>Add Defect</h2>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1%;">
                            <form action="../../php/AddDefect.php" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Worker Name</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $login_session; ?>">
                                            <input type="text" value="<?php echo $login_session_id; ?>" id="uid" name="uid" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">User Role</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $login_session_role; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Reason</label>
                                            <select class="form-control" id="reason" name="reason" required>
                                                <option disabled selected>- Select Reason -</option>
                                                <?php
                                                include "../../php/DBConnection.php";  // Using database connection file here
                                                $records = mysqli_query($db, "SELECT `reason_id`,`reason` FROM `reason` ORDER BY reason ASC;");  // Use select query here 

                                                while ($data = mysqli_fetch_array($records)) {
                                                    echo "<option value='" . $data['reason_id'] . "'>" . $data['reason'] . "</option>";  // displaying data in option menu
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Machine ID</label>
                                            <select class="form-control" id="mid" name="mid" required>
                                                <option disabled selected>- Select Machine -</option>
                                                <?php
                                                include "../../php/DBConnection.php";  // Using database connection file here
                                                $records = mysqli_query($db, "SELECT `machine_id`,`machine_name`,`machine_type` FROM `machine` ORDER BY machine_name ASC;");  // Use select query here 

                                                while ($data = mysqli_fetch_array($records)) {
                                                    echo "<option value='" . $data['machine_id'] . "'>" . $data['machine_name'] . " - " . $data['machine_type'] ."</option>";  // displaying data in option menu
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Product Name</label>
                                            <select class="form-control" id="pid" name="pid" required>
                                                <option disabled selected>- Select Product Name -</option>
                                                <?php
                                                include "../../php/DBConnection.php";  // Using database connection file here
                                                $records = mysqli_query($db, "SELECT `product_id`,`product_code`,`name` FROM `products` ORDER BY name ASC;");  // Use select query here 

                                                while ($data = mysqli_fetch_array($records)) {
                                                    echo "<option value='" . $data['product_id'] . "'>" . $data['product_code'] . " - " . $data['name'] . "</option>";  // displaying data in option menu
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Date</label>
                                            <input type="date" class="form-control" placeholder="Date" id="date" name="date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Quantity</label>
                                            <input type="number" class="form-control" placeholder="Quantity" id="qty" name="qty" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Supervisor Name</label>
                                            <select class="form-control" id="supid" name="supid" required>
                                                <option disabled selected>- Select Supervisor Name -</option>
                                                <?php
                                                include "../../php/DBConnection.php";  // Using database connection file here
                                                $records = mysqli_query($db, "SELECT `fullname` FROM `users` WHERE `role` = 'Supervisor' ORDER BY fullname ASC;");  // Use select query here 

                                                while ($data = mysqli_fetch_array($records)) {
                                                    echo "<option value='" . $data['fullname'] . "'>" . $data['fullname'] . "</option>";  // displaying data in option menu
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 5%;">
                                    <div class="col-md-12" style="text-align: end;">
                                        <input type="submit" class="btn btn-primary" style="color: #fff;" value="Submit Defect"></input>
                                        <button type="button" onclick="dashboard()" style="color: #fff;" class="btn btn-primary">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <?php mysqli_close($db);  // close connection ?>
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

        // function Export() {
        //     $("#tblCustomers").table2excel({
        //         filename: "Table.xls"
        //     });
        // }

        function dashboard() {
            window.open("./index.php", "_self");
        }

        function ManageDefect() {
            window.open("./ManageDefect.php", "_self");
        }
    </script>
</body>

</html>