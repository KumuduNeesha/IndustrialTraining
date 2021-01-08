<html>

<head>
    <!-- CSS only -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
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
                    <a class="nav-item nav-link active" href="./index.php">Home</a>
                    <a class="nav-item nav-link active" href="../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row" style="padding-top: 5%;">
            <div class="col-md-10">
                <input type="text" class="form-control" placeholder="User ID (Type only number)" id="uid" name="uid" required>
            </div>
            <div class="col-md-2">
                <button type="button" onclick="UserSearch()" style="color: #fff; width: 100%;" class="btn btn-info">Search</button>
            </div>
        </div>
    </div>

    <div id="Employers" class="container" style="padding-top: 5%;">
        <div class="row" style="text-align: center; color: #4C4B4B;">
            <div class="col" style="text-align: left;">
                <h2>User Management</h2>
            </div>
            <div class="col" style="text-align: right;">
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
                                        <th scope="col">User ID</th>
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

    <div class="container" style="padding-top: 5%;">
        <form id="formdetails" action="../php/UpdateUser.php" method="POST" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Full Name</label>
                        <input type="text" class="form-control" placeholder="Full Name" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">User Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="Admin">Administrator</option>
                            <option value="Manager">Manager</option>
                            <option value="Supervisor">Supervisor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Age</label>
                        <input type="number" class="form-control" placeholder="Age" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Residence (Permenent)</label>
                        <input type="text" class="form-control" placeholder="Residence" id="residence" name="residence" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Monthly Salary (LKR)</label>
                        <input type="number" class="form-control" placeholder="Monthly Salary" id="salary" name="salary" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Phone Number</label>
                        <input type="tel" class="form-control" placeholder="Phone Number" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">NIC Number</label>
                        <input type="text" class="form-control" placeholder="NIC Number" id="nic" name="nic" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Password (Must containe 8 characters!)</label>
                        <input type="text" class="form-control" placeholder="Password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Registration Date</label>
                        <input type="date" class="form-control" placeholder="Registration Date" id="regdate" name="regdate" required>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 5%;">
                <div class="col-md-12" style="text-align: center;">
                    <input type="submit" class="btn btn-info" style="color: #fff;" value="Update User Details"></input>
                    <button type="button" onclick="dashboard()" style="color: #fff;" class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </form>
    </div>

    <div style="padding-top: 5%;">
    </div>
    <div style="background-color: #0dcaf0; text-align: center; margin: 0px; padding: 2%;">
        <p style="color: #fff; font-size: 13px;">ACL Electronics Sri Lanka 2021 - All Rights Reserved</p>
    </div>

    <script>
        function dashboard() {
            window.open("./index.php", "_self");
        }

        function UserSearch() {
            var userid = document.getElementById("uid").value;
            
            document.getElementById("formdetails").hidden = false;
        }
    </script>
</body>

</html>