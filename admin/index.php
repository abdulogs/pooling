<?php require_once "../classes/app.php"; ?>
<?php app::isLogin("id", "admin/dashboard.php"); ?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login to dashboard</title>
  <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/signin.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body>
  <form class="form-signin text-center" id="login">
    <h1 class="font-weight-bolder"><b><span class="text-success">Car</span>Pooling</b></h1>
    <h4 class="font-weight-normal">Login to your account</h4>
    <p class="mb-4 font-12 text-center text-muted">Welcome back now login to your account</p>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" class="form-control form-control-sm shadow-none font-12 border" placeholder="Email address" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password"  class="form-control form-control-sm shadow-none font-12 border" placeholder="Password" required>
    <div class="checkbox d-flex mb-3">
      <label class="font-12"><input type="checkbox" value="remember-me"> Remember me</label>
      <a href="forgot-password.php" class="ml-auto text-dark font-12">Forgot password?</a>
    </div>
    <button class="btn btn-lg font-12 font-weight-bolder btn-success btn-block" type="submit">Sign in</button>
  </form>

  <div id="response"></div>

<!-- Bootstrap core JavaScript-->
<script src="./assets/libs/jquery/jquery.min.js"></script>
<script src="./assets/libs/popper/popper.min.js"></script>
<script src="./assets/libs/bootstrap/js/bootstrap.min.js"></script>

<!-- Modules -->
<script src="modules/account/login/js/data.js"></script>

</body>

</html>