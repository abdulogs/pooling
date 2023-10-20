<?php require_once "./classes/database.php"; ?>

<!Doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car pooling system | Change password</title>
    <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <link rel="stylesheet" href="./assets/libs/themify/themify-icons.css">

</head>

<body class="d-flex flex-column">
<?php app::component("navbar"); ?>    
<main class="container h-100 mt-5">
    <form class="form mt-5" id="passwordchange">
        <h1 class="h3 mb-2 font-weight-bold text-center">Change password!</h1>
        <p class="h6 mb-4 text-center text-muted">Set up your new password !</p>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg shadow-none border-bottom-0 border font-12"
                    placeholder="Old password..." id="opassword" name="opassword">
            <input type="password" class="form-control form-control-lg shadow-none border-bottom-0 border font-12"
                placeholder="Create password..."  id="password" name="password">
            <input type="password" class="form-control form-control-lg shadow-none border font-12"
                placeholder="Confirm password..."  id="cpassword" name="cpassword">
        </div>
        <button class="w-100 btn btn-lg btn-success font-12" type="submit">Change</button>
    </form>
</main>
<?php app::component("footer"); ?>

<script src="./modules/account/passwordchange/js/data.js"></script>
</body>

</html>