<?php
include('../../php/Session.php');
?>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>ACL > <?php echo $login_session; ?> | Profile - ACL Electronics Logs Portal</title>

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

    <div id="Profile" class="container" style="padding-top: 2%;">
        <div class="card" style="border-color: #005DAA;">
            <div class="card-header" style="color: #fff; background-color: #005DAA;">ACL Electronics - Profile Management</div>
            <div class="card-body text-primary">
                <div class="row" style="text-align: center; color: #4C4B4B;">
                    <div class="col" style="text-align: center;">
                        <h2>Profile Management</h2>
                    </div>
                </div>
                <div class="row" style="padding-top: 2%;">
                    <div class="section">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12" style="text-align: center;">
                                        <img src="../../images/avatar.png" alt="Profile">
                                    </div>
                                    <div class="col-md-12" style="padding-top: 5%;">
                                        <button type="button" style="width: 100%;" class="btn btn-outline-primary" id="passwordFormBtn" onclick="passwordFormBtn()">Update Password</button>
                                        <button type="button" style="width: 100%;" class="btn btn-outline-primary" id="profileFormBtn" onclick="profileFormBtn()" hidden>Update Profile</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <form action="../php/UserProfileUpdate.php" method="POST" id="profileForm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Worker ID</label>
                                                <input type="text" class="form-control" value="ACL-<?php echo $login_session_id; ?>" placeholder="ID" disabled>
                                                <input type="text" class="form-control" value="<?php echo $login_session_id; ?>" id="uid" name="uid" placeholder="ID" hidden>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Full Name</label>
                                                <input type="text" class="form-control" value="<?php echo $login_session; ?>" id="name" name="name" placeholder="Name" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Role Type</label>
                                                <input type="text" class="form-control" value="<?php echo $login_session_role; ?>" id="role" name="role" placeholder="Role" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Age</label>
                                                <input type="number" class="form-control" value="<?php echo $login_session_Age; ?>" id="age" name="age" placeholder="Age" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Gender</label>
                                                <select class="form-control" id="gender" name="gender" disabled>
                                                    <option value="-"><?php echo $login_session_Sex; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Residence (Current)</label>
                                        <input type="text" class="form-control" value="<?php echo $login_session_Residence; ?>" id="residence" name="residence" placeholder="Residence" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Salary</label>
                                        <input type="number" class="form-control" value="<?php echo $login_session_Salary; ?>" id="salary" name="salary" placeholder="Salary" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Mobile Number (Current)</label>
                                        <input type="number" class="form-control" value="<?php echo $login_session_Phone; ?>" id="phone" name="phone" placeholder="Mobile" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">NIC (User Name)</label>
                                                <input type="text" class="form-control" value="<?php echo $login_session_NIC; ?>" id="nic" name="nic" placeholder="NIC" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6" hidden>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Password</label>
                                                <input type="text" class="form-control" value="<?php echo $login_session_Password; ?>" id="password" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 5%;">
                                        <div class="coll-ms-12" style="text-align: end;">
                                            <div class="form-check" style="text-align: left;">
                                                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                                <label class="form-check-label" for="gridCheck">
                                                    Check me out
                                                </label>
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Update My Details"></input>
                                        </div>
                                    </div>
                                </form>
                                <form action="../php/ResetPassword.php" method="POST" id="passwordForm" hidden>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Current Password</label>
                                        <input type="text" class="form-control" id="current" name="current" placeholder="Current Password" required>
                                        <input type="text" value="<?php echo $login_session_id; ?>" id="currenthiddenuser" name="currenthiddenuser" hidden>
                                        <input type="text" value="<?php echo $login_session_Password; ?>" id="currenthiddenpw" name="currenthiddenpw" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">New Password</label>
                                        <input type="password" class="form-control" id="new" name="new" placeholder="New Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password" required>
                                    </div>

                                    <div class="row" style="padding-top: 5%;">
                                        <div class="coll-ms-12" style="text-align: end;">
                                            <div class="form-check" style="text-align: left;">
                                                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                                <label class="form-check-label" for="gridCheck">
                                                    Check me out
                                                </label>
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Update Password"></input>
                                        </div>
                                    </div>
                                </form>
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

        function passwordFormBtn() {
            document.getElementById("passwordFormBtn").hidden = true;
            document.getElementById("profileFormBtn").hidden = false;
            document.getElementById("profileForm").hidden = true;
            document.getElementById("passwordForm").hidden = false;
        }

        function profileFormBtn() {
            document.getElementById("profileFormBtn").hidden = true;
            document.getElementById("passwordFormBtn").hidden = false;
            document.getElementById("passwordForm").hidden = true;
            document.getElementById("profileForm").hidden = false;
        }
    </script>
</body>

</html>