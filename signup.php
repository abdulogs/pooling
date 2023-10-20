<?php require_once "./classes/database.php"; ?>
<?php app::isLogin("id", "profile.php"); ?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car pooling system | Sign up</title>
    <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <link rel="stylesheet" href="./assets/libs/themify/themify-icons.css">
</head>

<body class="d-flex flex-column">
<?php app::component("navbar"); ?>
  <main class="container h-100">
        <form class="form  mt-5" id="register">
            <h1 class="h3 mb-2 font-weight-bold text-center">Register account!</h1>
            <p class="h6 mb-4 text-center text-muted">Create free account!</p>
            <div class="form-group mb-0">
                <input type="text" class="form-control form-control-lg shadow-none border border-bottom-0 font-12"
                    placeholder="First name" id="fname" name="fname" value="Muhammad">
                    <input type="text" class="form-control form-control-lg shadow-none border border-bottom-0 font-12"
                    placeholder="Last name" id="lname" name="lname" value="Ali">
                <input type="email" class="form-control form-control-lg shadow-none border border-bottom-0 font-12"
                    placeholder="Email address..." id="email" name="email" value="ali@gmail.com">
                <input type="password" class="form-control form-control-lg shadow-none border-bottom-0 border font-12"
                    placeholder="Create password..." id="password" name="password" value="8504605">
                <input type="password" class="form-control form-control-lg shadow-none border-bottom-0 border font-12"
                    placeholder="Confirm password..." id="cpassword" name="cpassword" value="8504605">
                <select class="form-control form-control-lg shadow-none border font-12" name="role" id="role">
                    <option value="">Account type</option>
                    <option value="0">Passenger</option>
                    <option value="1">Car driver</option>
                </select>
            </div>
            <label class="checkbox mb-2 mt-2 font-12 d-flex align-items-center">
                <input type="checkbox" value="remember-me" class="mr-3">
                <span>By clicking on proceed button i agree with this
                    <a href="terms.php" class="text-success">Terms and conditions</a></span>
            </label>
            <button class="w-100 btn btn-lg btn-success font-12"  type="submit">Register</button>
            <a href="signin.php" class="text-dark font-12 mt-2 mb-2 d-block">
                - <span class="text-success">Login instead?</span>
            </a>
        </form>
    </main>
    <?php app::component("footer"); ?>

    <script src="./modules/account/register/js/data.js"></script>
</body>
</html>