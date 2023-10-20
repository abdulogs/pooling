<?php require_once "./classes/database.php"; ?>
<?php app::isLogin("id", "profile.php"); ?>


<!Doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car pooling systme | Recover password</title>
    <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <link rel="stylesheet" href="./assets/css/form.css">

</head>

<body class="d-flex flex-column">
<?php app::component("navbar"); ?>
<main class="container h-100 mt-5">
    <form class="form  mt-5" id="passwordrecover">
        <h1 class="h3 mb-2 font-weight-bold text-center">Recover account!</h1>
        <p class="h6 mb-4 text-center text-muted">Recover your account password!</p>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg shadow-none border-bottom-0 border font-12"
                placeholder="Create password..." id="password" name="password">
            <input type="password" class="form-control form-control-lg shadow-none border font-12"
                placeholder="Confirm password..." id="cpassword" name="cpassword">
            <input type="hidden" name="token" id="token" value="<?php echo app::get("token"); ?>">
            <input type="hidden" name="uid" id="uid" value="<?php echo app::get("uid"); ?>">
        </div>
        <button class="w-100 btn btn-lg btn-success font-12" type="submit">Change</button>
    </form>
</main>
<?php app::component("footer"); ?>

<script src="./modules/account/passwordrecover/js/data.js"></script>
</body>

</html>