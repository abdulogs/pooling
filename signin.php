<?php require_once "./classes/database.php"; ?>
<?php app::isLogin("id", "profile.php"); ?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car pooling system | Sign in</title>
    <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <link rel="stylesheet" href="./assets/libs/themify/themify-icons.css">
</head>

<body class="d-flex flex-column">
<?php app::component("navbar"); ?>
  <main class="container h-100 mt-5">
        <form class="form  mt-5" id="login" >
            <h1 class="h3 mb-2 font-weight-bold text-center">Login!</h1>
            <p class="h6 mb-4 text-center text-muted">Welcome back! login to your account!</p>
            <div class="form-group">
                <input type="email" class="form-control form-control-lg shadow-none border border-bottom-0 font-12"
                    placeholder="Email address..." id="email" name="email">
                <input type="password" class="form-control form-control-lg shadow-none  border font-12"
                    placeholder="Password..." id="password" name="password">
            </div>
            <label class="checkbox mb-2 mt-2 font-12 d-flex align-items-center">
                <input type="checkbox" class="mr-3"> Remember me 
                <a href="password-forgot.php" class="ml-auto text-success">Forgot password?</a>
            </label>
            <button class="w-100 btn btn-lg btn-success font-12" type="submit">Login</button>
            <a href="signup.php" class="text-dark font-12 mt-2 mb-2 d-block">
                - <span class="text-success">Register?</span>
            </a>
        </form>
    </main>
    <?php app::component("footer"); ?>

    <script src="./modules/account/login/js/data.js"></script>
</body>

</html>