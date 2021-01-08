<html>

<head lang="en">
  <meta charset="UTF-8">
  <title>Login - ACL Electronics Logs Portal</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="./assets/custom css/style.css" rel="stylesheet" id="bootstrap-css">

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <div class="row">
        <div class="col-sm-12" style="color: #56baed; padding-top: 5%;">
          <h3>ACL Electronics Logs Portal</h3>
        </div>
      </div>
      <!-- Icon -->
      <div class="fadeIn first" style="padding-top: 5%;">
        <h1 style="color: #56baed; font-size: 100px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i></h1>
      </div>

      <!-- Login Form -->
      <form action="./php/login.php" method="POST">
        <input type="text" id="login" class="fadeIn second" name="username" id="username" placeholder="Username">
        <input type="text" id="password" class="fadeIn third" name="password" id="password" placeholder="Password">

        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <!-- <a class="underlineHover" href="#">Forgot Password?</a> -->
        <p style="font-size: 10px;">ACL Electronics - All Right Reserved</p>
      </div>

    </div>
  </div>
</body>

</html>