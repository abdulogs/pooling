<?php require_once "./classes/database.php"; ?>
<?php app::isLogin("id", "profile.php"); ?>


<!Doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car pooling systme | Home</title>
    <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
    <script src="./assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
</head>

<body class="h-100 d-flex flex-column">
    <?php app::component("navbar"); ?>
    <main class="container h-100 pt-5">
        <div class="row pt-5">
            <div class="col-sm-6 pt-5">
                <h1 class="mb-2"> Welcome to <b>car pooling</b> system</h1>
                <p class="text-muted font-12">
                    The clever modular vehicle technology for CarSharing, CarRental and pool-vehicles.
                    The modern Convadis technology is the key to fully-automated vehicle management for CarSharing
                    organisations, car rentals and companies with pool vehicles. The system enables controlled vehicle
                    access and capturing of all relevant vehicle and journey information required for billing,
                    statistics and fleet management.
                </p>
                <a href="signup.php" class="btn btn-success">Get started</a>
            </div>
            <div class="col-sm-6 text-right">
                <img src="./assets/imgs/main.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </main>
    <?php app::component("footer"); ?>
</body>

</html>