<?php require_once "./classes/database.php"; ?>
<?php app::isLogin("id", "admin/dashboard.php"); ?>

<!Doctype html>
<html lang="en" class="h-100">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Email sent successfully</title>
  <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/stylesheet.css">
  <link rel="stylesheet" href="./assets/css/form.css">
  <link rel="stylesheet" href="./assets/libs/themify/themify-icons.css">
</head>

<body class="d-flex flex-column">
<?php app::component("navbar"); ?>
<main class="container h-100 text-center">
        <br><br><br><br>
        <br><br><br><br>
        <h1 class="fa fa-check-circle d-inline text-success" style="font-size:50px;"></h1>
        <h2 class="mt-2">Email sent successfully!</h2>
        <p>We sent you an email on your email account. you can check inbox to confirm email</p> 
        <a href="signin.php" class="btn btn-success btn-sm px-3">Login</a>
        <br><br><br><br>
        <br><br><br><br>
    </main>
    <?php app::component("footer"); ?>
</body>

</html>