<?php require_once "./classes/database.php"; ?>
<?php app::isLogin("id", "profile.php"); ?>


<!Doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car pooling systme | Forgot password</title>
    <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <link rel="stylesheet" href="./assets/css/form.css">

</head>

<body class="d-flex flex-column">
<?php app::component("navbar"); ?>    
<main class="container h-100 mt-5">
    <form class="form  mt-5" id="passwordforgot">
        <h1 class="h3 mb-2 font-weight-bold text-center">Forgot password!</h1>
        <p class="h6 mb-4 text-center text-muted">We will send you a token for password change authentication!</p>
        <div class="form-group">
            <input type="email" class="form-control form-control-lg shadow-none border  font-12"
                placeholder="Email address..." id="email" name="email">
        </div>
        <button class="w-100 btn btn-lg btn-success font-12" type="submit">Procced</button>
        <a href="signin.php" class="text-dark font-12 mt-2 mb-2 d-block">
            - <span class="text-success">Login?</span>
        </a>
    </form>
</main>
<?php app::component("footer"); ?>

<script src="./modules/account/passwordforgot/js/data.js"></script>

</body>

</html>