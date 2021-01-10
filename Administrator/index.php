<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>ACL > Welcome Administrator - ACL Electronics Logs Portal</title>

    <!-- CSS only -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="../assets/custom css/scrollbar.css" rel="stylesheet">

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
                    <a class="nav-item nav-link">Welcome Admin!</a>
                    <a class="nav-item nav-link active" href="../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top: 5%;">
        <div class="row">
            <div class="col-md-3">
                <div class="card text-center text-white bg-secondary">
                    <div class="card-header">
                        <h3>Machines</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col" style="text-align: center; color: #fff; font-size: 100px;">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
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
                                    $query = "SELECT machine_id FROM machine";
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
                    <div class="card-footer text-muted">
                        <a href="#Machines" class="btn btn-dark" style="width: 100%; color: #fff;">Machines Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center text-white bg-warning">
                    <div class="card-header">
                        <h3>Employers</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col" style="text-align: center; color: #fff; font-size: 100px;">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
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
                                    $query = "SELECT worker_id FROM users";
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
                    <div class="card-footer text-muted">
                        <a href="#Employers" class="btn btn-dark" style="width: 100%; color: #fff;">User Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center text-white bg-success">
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
                                    $query = "SELECT log_id FROM logs";
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
                    <div class="card-footer text-muted">
                        <a href="#Logs" class="btn btn-dark" style="width: 100%; color: #fff;">Logs Management</a>
                    </div>
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
                                    $query = "SELECT defect_id FROM defect";
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
                    <div class="card-footer text-muted">
                        <a href="#Defects" class="btn btn-dark" style="width: 100%; color: #fff;">Defects Management</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Employers" class="container" style="padding-top: 2%;">
        <div class="card border-info">
            <div class="card-header bg-info" style="color: #fff;">ACL Electronics - User Management</div>
            <div class="card-body text-info">
                <div class="row" style="text-align: center; color: #4C4B4B;">
                    <div class="col" style="text-align: left;">
                        <h2>User Management</h2>
                    </div>
                    <div class="col" style="text-align: right;">
                        <a href="./manage-user.php" class="btn btn-info" style="color: #fff;"><i class="fa fa-pencil-square" aria-hidden="true"></i> Manage Users Details</a>

                        <a href="./AddNewUser.html" class="btn btn-info" style="color: #fff;"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New User</a>
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

    <div id="Defects" class="container" style="padding-top: 2%;">
        <div class="card border-info">
            <div class="card-header bg-info" style="color: #fff;">ACL Electronics - Defects Management</div>
            <div class="card-body text-info">
                <div class="row" style="text-align: center; color: #4C4B4B;">
                    <div class="col" style="text-align: left;">
                        <h2>Defects Management</h2>
                    </div>
                    <div class="col" style="text-align: right;">
                        <!-- <button type="button" id="btnExport" onclick="Export()" class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export as Report</button> -->
                    </div>
                </div>
                <div class="row" style="padding-top: 2%;">
                    <div class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 250px; overflow-x: auto;">
                                    <table id="tabDef" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Defect ID</th>
                                                <th scope="col">Reason</th>
                                                <th scope="col">User Name</th>
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

                                            $query = "SELECT d.defect_id, r.reason, u.fullname, m.machine_name, d.date, p.name, d.itemQty, d.status FROM defect d, reason r, users u, machine m, products p WHERE d.reason_id = r.reason_id && d.worker_id = u.worker_id && d.machine_id = m.machine_id && d.product_id = p.product_id ORDER BY defect_id DESC";
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
                                                echo $row["fullname"];
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

    <div id="Machines" class="container" style="padding-top: 2%;">
        <div class="card border-info">
            <div class="card-header bg-info" style="color: #fff;">ACL Electronics - Machines Management</div>
            <div class="card-body text-info">
                <div class="row" style="text-align: center; color: #4C4B4B;">
                    <div class="col" style="text-align: left;">
                        <h2>Machines</h2>
                    </div>
                    <div class="col" style="text-align: right;">
                        <a href="./manage-machine.php" class="btn btn-info" style="color: #fff;"><i class="fa fa-pencil-square" aria-hidden="true"></i> Manage Machine Details</a>

                        <a href="./AddNewMachine.html" class="btn btn-info" style="color: #fff;"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New Machine</a>
                    </div>
                </div>
                <div class="row" style="padding-top: 2%;">
                    <div class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 250px; overflow-x: auto;">
                                    <table id="tabMachine" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Machine ID</th>
                                                <th scope="col">Unit Name</th>
                                                <th scope="col">Machine Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "", "acl-portal");

                                            // Check connection 
                                            if (mysqli_connect_errno()) {
                                                echo "Database connection failed.";
                                            }

                                            $query = "SELECT * FROM machine;";
                                            $res = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_array($res)) {
                                                $MachineNumber = "ACL-MHN-" . $row["machine_id"];
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $MachineNumber;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["machine_name"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["machine_type"];
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

    <div id="Logs" class="container" style="padding-top: 2%;">
        <div class="card border-info">
            <div class="card-header bg-info" style="color: #fff;">ACL Electronics - Logs Management</div>
            <div class="card-body text-info">
                <div class="row" style="text-align: center; color: #4C4B4B;">
                    <div class="col" style="text-align: left;">
                        <h2>Logs Management</h2>
                    </div>
                    <div class="col" style="text-align: right;">
                        <!-- <a href="./AddNewUser.html" class="btn btn-info" style="color: #fff;"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New User</a> -->
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
                                                <th scope="col">Employee Name</th>
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

                                            $query = "SELECT l.log_id, u.fullname, p.name, p.product_code, m.machine_name, l.qty, l.date FROM logs l, users u, products p, machine m WHERE l.worker_id = u.worker_id && l.product_id = p.product_id && l.machine_id = m.machine_id ORDER BY log_id DESC;";
                                            $res = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_array($res)) {
                                                $LogNumber = "LOG-" . $row["log_id"];
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $LogNumber;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row["fullname"];
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

    <div style="padding-top: 5%;">
    </div>
    <div style="background-color: #0dcaf0; text-align: center; margin: 0px; padding: 2%;">
        <p style="color: #fff; font-size: 13px;">ACL Electronics Sri Lanka 2021 - All Rights Reserved</p>
    </div>
</body>

</html>