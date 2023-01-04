<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/login.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('vendor/jquery/jquery.slim.js') ?>"></script>
</head>

<body>

        <div class="container">
          <div class="row">
            <div class="col-sm-4 mx-auto">
              <center><img src="img/Bethel.jpg" width="300px" height="200px"></center>
              <h3 class="login-heading mb-4">Account</h3>
              <form action="<?= site_url('login') ?>" method="POST">
                <div class="form-label-group">
                  <input type="text" id="inputID" name="id" class="form-control" placeholder="ID" value="<?php if(isset($_COOKIE['loginID'])) { echo $_COOKIE['loginID']; } ?>" required autofocus>
                  <label for="inputID">ID</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE['loginPass'])) { echo $_COOKIE['loginPass']; } ?>" required>
                  <label for="inputPassword">Password</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" name="remember" <?php if(isset($_COOKIE["loginID"])) { ?> checked="checked" <?php } ?> class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
              </form>
            </div>
         
</div>

</body>

</html>