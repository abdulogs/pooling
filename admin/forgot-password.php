<?php require_once "../classes/app.php"; ?>
<?php app::isLogin("id", "admin/dashboard.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body class="main-bg">
  <main class="form-signin text-center">
      <form  id="forgot">
            <h1 class="font-weight-bolder"><b><span class="text-success">Car</span>Pooling</b></h1>
            <h4 class="font-weight-normal">Forgot password</h4>
            <p class="mb-4 font-12 text-center text-muted">We will send you a token for password change authentication!</p>
            <div class="form-group">
                <input type="email" class="form-control shadow-none border rounded font-12"
                    placeholder="Email address..." id="email" name="email" autofocus required>
            </div>
            <button class="w-100 btn btn-lg btn-success font-12" type="submit"><b>Procced</b></button>
            <a href="index.php" class="text-dark font-12 mt-2 mb-2 d-block text-left">
                - <span class="text-dark">Login?</span>
            </a>
        </form>
    </main>

    <div id="response"></div>

<!-- Bootstrap core JavaScript-->
<script src="./assets/libs/jquery/jquery.min.js"></script>
<script src="./assets/libs/popper/popper.min.js"></script>
<script src="./assets/libs/bootstrap/js/bootstrap.min.js"></script>

<!-- Modules -->
<script src="./modules/account/forgot/js/data.js"></script>

</body>

</html>