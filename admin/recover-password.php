<?php require_once "../classes/database.php"; ?>
<?php app::isLogin("id", "admin/dashboard.php"); ?>
<?php app::getRedirect(["uid","token"],"404.php", false)?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Change password</title>
  <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/signin.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body>
  <main class="form-signin text-center">
      <form  id="recover">
        <h1 class="font-weight-bolder"><b><span class="text-success">Car</span>Pooling</b></h1>
        <h4 class="font-weight-normal">Change password</h4>
        <label for="password" class="sr-only">password address</label>
        <input type="password" id="password" name="password" class="form-control form-control-sm shadow-none font-12 border" placeholder="Create password" required autofocus>
        <label for="cpassword" class="sr-only">Password</label>
        <input type="password" id="cpassword" name="cpassword"  class="form-control form-control-sm shadow-none font-12 border" placeholder="Confirm password" required>
        <input type="hidden" id="token" name="token" value="<?php echo app::get("token")?>">
        <input type="hidden" id="uid" name="uid" value="<?php echo app::get("uid")?>">
        <button class="w-100 btn btn-lg btn-success font-12" type="submit">Change</button>
    </form>
</main>

<div id="response"></div>

<!-- Bootstrap core JavaScript-->
<script src="./assets/libs/jquery/jquery.min.js"></script>
<script src="./assets/libs/popper/popper.min.js"></script>
<script src="./assets/libs/bootstrap/js/bootstrap.min.js"></script>

<!-- Modules -->
<script src="./modules/account/recover/js/data.js"></script>
</body>

</html>