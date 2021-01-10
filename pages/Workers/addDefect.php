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

    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" style="font-weight: 700;">ACL Electronics</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only"></span></a> -->
                    <a class="nav-item nav-link">Login User Name: <?php echo $login_session; ?></a>
                    <a class="nav-item nav-link active" href="../../php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                </div>
            </div>
        </div>
    </nav>

    <div id="Defects" class="container" style="padding-top: 2%;">
        <div class="card border-info">
            <div class="card-header bg-info" style="color: #fff;">
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
                        <!-- <button type="button" onclick="addDefect()" style="color: #fff;" class="btn btn-info">Add New Defects</button> -->
                        <button type="button" onclick="ManageDefect()" style="color: #fff;" class="btn btn-info">Manage My Defects</button>

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

    <div class="container" style="padding-top: 2%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-info">
                    <div class="card-header bg-info" style="color: #fff;">ACL Electronics - Add Defect</div>
                    <div class="card-body text-info">
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
                                                <option>--</option>
                                                <option value="1">BUBBLES VOIDS</option>
                                                <option value="2">BURN MARKS</option>
                                                <option value="3">DISCOLORATION</option>
                                                <option value="4">DISTORTION UPON EJECTION</option>
                                                <option value="5">ERRATIC SCREW RETRACTION</option>
                                                <option value="6">FLASH</option>
                                                <option value="7">FLOW MARK</option>
                                                <option value="8">PIN MARK</option>
                                                <option value="9">LAMINATION</option>
                                                <option value="10">NOZZLE DROOL</option>
                                                <option value="11">PART STICKING IN MOULD</option>
                                                <option value="12">POOR WELD LINES</option>
                                                <option value="13">SHORT SHOTS</option>
                                                <option value="14">SHOT TO SHOOT VARIATION</option>
                                                <option value="15">SINK MARK</option>
                                                <option value="16">MOISTURE MARK</option>
                                                <option value="17">RUNNER STICKING</option>
                                                <option value="18">UNMELTED PELLET</option>
                                                <option value="19">WARPAGE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Machine ID</label>
                                            <select class="form-control" id="mid" name="mid" required>
                                                <option>--</option>
                                                <option value="1">Machine-Local-01</option>
                                                <option value="2">Machine-Local-02</option>
                                                <option value="3">Machine-Local-03</option>
                                                <option value="4">Machine-Local-04</option>
                                                <option value="5">Machine-Local-05</option>
                                                <option value="6">Machine-Local-06</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Product Name</label>
                                            <select class="form-control" id="pid" name="pid" required>
                                                <option>--</option>
                                                <option value="1">1 GANG 1 WAY SWITCH</option>
                                                <option value="2">2 GANG 1 WAY SWITCH</option>
                                                <option value="3">3 GANG 1 WAY SWITCH</option>
                                                <option value="4">4 GANG 1 WAY SWITCH</option>
                                                <option value="5">5 GANG 1 WAY SWITCH</option>
                                                <option value="6">1 GANG 2 WAY SWITCH</option>
                                                <option value="7">2 GANG 2 WAY SWITCH</option>
                                                <option value="8">3 GANG 2 WAY SWITCH</option>
                                                <option value="9">DOUBLE POLE SWITCH</option>
                                                <option value="10">1 GANG BELL PRESS</option>
                                                <option value="11">LIGHT DIMMER</option>
                                                <option value="12">FAN SPEED CONTROLLER</option>
                                                <option value="13">5 STEP FAN CONTROLLER</option>
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
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 5%;">
                                    <div class="col-md-12" style="text-align: end;">
                                        <input type="submit" class="btn btn-info" style="color: #fff;" value="Submit Defect"></input>
                                        <button type="button" onclick="dashboard()" style="color: #fff;" class="btn btn-primary">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-top: 5%;">
    </div>
    <div style="background-color: #0dcaf0; text-align: center; margin: 0px; padding: 2%;">
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

        function dashboard() {
            window.open("./index.php", "_self");
        }

        function ManageDefect() {
            window.open("./ManageDefect.php", "_self");
        }
    </script>
</body>

</html>