<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>ACL > Machine Management - ACL Electronics Logs Portal</title>

    <!-- CSS only -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="../assets/custom css/scrollbar.css" rel="stylesheet">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color: #005DAA; padding: 0px;">
        <div class="container">
            <a class="navbar-brand mb-0 h1"><img src="../favicon.ico"> ACL Electronics</a>
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
                        <a class="nav-item nav-link active" href="../php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top: 5%;">
        <div class="card border-primary">
            <div class="card-header bg-primary" style="color: #fff;">ACL Electronics - Machine List!</div>
            <div class="card-body text-primary">
                <!-- <h5 class="card-title">ACL Electronics - User List!</h5> -->
                <!-- <p class="card-text">Please enter user ID number:</p> -->
                <div id="Employers" class="container">
                    <div class="row" style="text-align: center; color: #4C4B4B;">
                        <div class="col" style="text-align: left;">
                            <h2>Machine Management</h2>
                        </div>
                        <div class="col" style="text-align: right;">
                            <a href="./AddNewMachine.html" class="btn btn-primary" style="color: #fff;"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New Machine</a>
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
    </div>

    <div class="container" style="padding-top: 5%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary" style="color: #fff;">ACL Electronics - Update Machine Detail!</div>
                    <div class="card-body text-primary">
                        <div class="row" style="text-align: center; color: #4C4B4B;">
                            <div class="col" style="text-align: left;">
                                <h2>Update Details</h2>
                            </div>
                        </div>
                        <form action="../php/UpdateMachine.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Machine ID</label>
                                        <input type="text" class="form-control" placeholder="Machine ID (Enter Only Number: ACL-MHN-XX)" id="mid" name="mid" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Machine Name</label>
                                        <input type="text" class="form-control" placeholder="Machine Name" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Machine Type</label>
                                        <select class="form-control" id="Type" name="Type">
                                            <option value="Type A">Type A</option>
                                            <option value="Type B">Type B</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 5%;">
                                <div class="col-md-12" style="text-align: end;">
                                    <input type="submit" class="btn btn-primary" style="color: #fff;" value="Update Machine Details"></input>
                                    <button type="button" onclick="dashboard()" style="color: #fff;" class="btn btn-primary">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="padding-top: 5%;">
            <div class="col-md-12">
                <div class="card border-danger">
                    <div class="card-header bg-danger" style="color: #fff;">Remove Machine</div>
                    <div class="card-body text-danger">
                        <h5 class="card-title">Danger Zone!</h5>
                        <p class="card-text">Please enter Machine ID number:</p>
                        <form action="../php/RemoveMachine.php" method="POST">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control border-danger" placeholder="Machine ID (Enter Only Number: ACL-MHN-XX)" id="mid" name="mid" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-danger" style="width: 100%; color: #fff;" value="Remove Machine"></input>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        function dashboard() {
            window.open("./index.php", "_self");
        }
    </script>
</body>

</html>