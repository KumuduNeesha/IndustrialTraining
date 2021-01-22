<html>

<head lang="en">
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  <title>ACL > Login - ACL Electronics Logs Portal</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../assets/custom css/style.css" rel="stylesheet" id="bootstrap-css">
  <link href="../assets/custom css/bg.css" rel="stylesheet" id="bootstrap-css">

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<body class="bg">
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <div class="row">
        <div class="col-sm-12" style="color: #56baed; padding-top: 5%;">
          <h5>ACL Electronics logs Portal</h5>
        </div>
      </div>
      <!-- Icon -->
      <div class="fadeIn first" style="padding-top: 5%;">
        <h1 style="color: #56baed; font-size: 100px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i></h1>
      </div>

      <!-- Login Form -->
      <form name="f1" action="../php/login.php" method="POST">
        <label style="color: yellow; font-size: 12px;">Invalid Username.</label>
        <input type="text" id="login" class="fadeIn second" name="user" id="user" placeholder="Username">
        <label style="color: yellow; font-size: 12px;">Invalid Password.</label>
        <input type="text" id="password" class="fadeIn third" name="pass" id="pass" placeholder="Password">
        <br>
        <input type="checkbox" class="form-check-input" id="formcheckbox" required>
        <label class="form-check-label" for="exampleCheck1" style="color: #fff;">Remember me</label>
        <br><br>
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter" style="padding-top: 5%;">
        <p style="font-size: 10px;">ACL Electronics - All Right Reserved</p>
      </div>

    </div>
  </div>
</body>

</html>