<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>ACL > Manage Defects - ACL Electronics Logs Portal</title>

    <!-- CSS only -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="../../assets/custom css/scrollbar.css" rel="stylesheet">

    <!-- JavaScript Bundle with Popper -->
    <script src="../../assets/js/table2excel.js" type="text/javascript"></script>
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
                    <a class="nav-item nav-link">Welcome Supervisor!</a>
                    <a class="nav-item nav-link active" href="./index.php">Dashboard <span class="sr-only"></span></a>
                    <a class="nav-item nav-link active" href="../../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                </div>
            </div>
        </div>
    </nav>

    <div id="Defects" class="container">
        <div class="row" style="padding-top: 2%;">
            <div class="section">
                <div class="card border-info">
                    <div class="card-header bg-info" style="color: #fff;">ACL Electronics - Unauthorized Defects</div>
                    <div class="card-body text-info">
                        <div class="row" style="text-align: center; color: #4C4B4B;">
                            <div class="col" style="text-align: left;">
                                <h2>Unauthorized Defects</h2>
                            </div>
                            <div class="col" style="text-align: right;">
                                <input type="button" id="btnExport" style="color: #fff;" class="btn btn-info" value="Export as Excel" onclick="Export()" />
                                <!-- <button type="button" id="btnExport" onclick="Export()" style="color: #fff;" class="btn btn-info"><i class="fa fa-cloud-download" aria-hidden="true"></i> Export as Report</button> -->
                                <!-- <button type="button" id="btnExport" onclick="Manage()" style="color: #fff;" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> Manage Defects</button> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 250px; overflow-x: auto;">
                                    <table id="tblCustomers" class="table table-hover">
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

                                            $query = "SELECT d.defect_id, r.reason, u.fullname, m.machine_name, d.date, p.name, d.itemQty, d.status FROM defect d, reason r, users u, machine m, products p WHERE d.reason_id = r.reason_id && d.worker_id = u.worker_id && d.machine_id = m.machine_id && d.product_id = p.product_id && d.status = 'Unauthorized' ORDER BY defect_id DESC";
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

    <div id="Defects" class="container">
        <div class="row" style="padding-top: 2%;">
            <div class="section">
                <div class="card border-info">
                    <div class="card-header bg-info" style="color: #fff;">ACL Electronics - Authorized Defects</div>
                    <div class="card-body text-info">
                        <div class="row" style="text-align: center; color: #4C4B4B;">
                            <div class="col" style="text-align: left;">
                                <h2>Authorized Defects</h2>
                            </div>
                            <div class="col" style="text-align: right;">
                                <input type="button" id="btnExport" style="color: #fff;" class="btn btn-info" value="Export as Excel" onclick="Export()" />
                                <!-- <button type="button" id="btnExport" onclick="Export()" style="color: #fff;" class="btn btn-info"><i class="fa fa-cloud-download" aria-hidden="true"></i> Export as Report</button> -->
                                <!-- <button type="button" id="btnExport" onclick="Manage()" style="color: #fff;" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> Manage Defects</button> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 250px; overflow-x: auto;">
                                    <table id="tblCustomers" class="table table-hover">
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
                                            $connection2 = mysqli_connect("localhost", "root", "", "acl-portal");

                                            // Check connection 
                                            if (mysqli_connect_errno()) {
                                                echo "Database connection failed.";
                                            }

                                            $query2 = "SELECT d.defect_id, r.reason, u.fullname, m.machine_name, d.date, p.name, d.itemQty, d.status FROM defect d, reason r, users u, machine m, products p WHERE d.reason_id = r.reason_id && d.worker_id = u.worker_id && d.machine_id = m.machine_id && d.product_id = p.product_id && d.status = 'Authorized' ORDER BY defect_id DESC";
                                            $res2 = mysqli_query($connection2, $query2);
                                            while ($row = mysqli_fetch_array($res2)) {
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
                                            mysqli_close($connection2);
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

    <div id="Defects" class="container" style="padding-top: 5%;">
        <div class="row" style="text-align: center; color: #4C4B4B;">
            <div class="col" style="text-align: left;">
                <h2>Manage Authorization</h2>
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
                    <div class="card-header bg-danger" style="color: #fff;">Change Authorization</div>
                    <div class="card-body text-danger">
                        <div class="row">
                            <form action="../../php/ChangeAuthorization.php" method="POST">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control border-danger" placeholder="Unauthorized Defect ID (Enter Only Number: Def-XXX)" id="did" name="did" required>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-top: 2%;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: end; padding-top: 2%;">
                                    <input type="submit" class="btn btn-danger" style="color: #fff;" value="Change Authorization"></input>
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

        function Manage() {
            window.open("./manage-defects.php", "_self");
        }

        function Export() {
            $("#tblCustomers").table2excel({
                filename: "Table.xls"
            });
        }
    </script>
</body>

</html>