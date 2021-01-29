<?php
include('../../php/Session.php');
?>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>ACL > Logs Management - ACL Electronics Logs Portal</title>

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
                        <!-- <button type="button" onclick="ManageLog()" style="color: #fff;" class="btn btn-primary">Manage My Logs</button> -->
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

    <div id="Logs" class="container" style="padding-top: 5%;">
        <div class="row" style="text-align: center; color: #4C4B4B;">
            <div class="col" style="text-align: left;">
                <h2>Danger Zone - Delete Logs</h2>
            </div>
            <div class="col" style="text-align: right;">
                <!-- <input type="button" id="btnExport" style="color: #fff;" class="btn btn-info" value="Export as Excel" onclick="Export()" /> -->
                <!-- <button type="button" id="btnExport" onclick="Export()" style="color: #fff;" class="btn btn-info"><i class="fa fa-cloud-download" aria-hidden="true"></i> Export as Report</button> -->
                <!-- <button type="button" id="btnExport" onclick="Manage()" style="color: #fff;" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> Manage Defects</button> -->
            </div>
        </div>
        <div class="row" style="padding-top: 2%;">
            <div class="section">
                <div class="card border-danger">
                    <div class="card-header bg-danger" style="color: #fff;">Delete Logs</div>
                    <div class="card-body text-danger">
                        <div class="row">
                            <form action="../../php/RemoveLog.php" method="POST">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control border-danger" placeholder="LOG ID (Enter Only Number: LOG-XXXX)" id="logid" name="logid" required>
                                        <input type="text" value="<?php echo $login_session_id; ?>" id="currenthiddenuser" name="currenthiddenuser" hidden>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-top: 2%;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: end; padding-top: 2%;">
                                    <input type="submit" class="btn btn-danger" style="color: #fff;" value="Delete Log"></input>
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