<?php require_once "./classes/database.php"; ?>

<!Doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car pooling system | Contact us</title>
    <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <link rel="stylesheet" href="./assets/libs/themify/themify-icons.css">

</head>

<body class="d-flex flex-column">
<?php app::component("navbar"); ?>
<main class="container h-100">
    <form class="form mt-5" id="contactform">
        <h1 class="h3 m-0 mb-2 font-weight-bold text-center">Contact us!</h1>
        <p class="h6 mb-4 text-center text-muted">You can freely ask us your queries by sending us message</p>
        <div class="form-group">
            <input type="text" class="form-control form-control-lg shadow-none border border-bottom-0 font-12"
                placeholder="Fullname" name="fullname" id="fullname">
            <input type="email" class="form-control form-control-lg shadow-none border border-bottom-0 font-12"
                placeholder="Email address..." name="email" id="email">
            <input type="text" class="form-control form-control-lg shadow-none border border-bottom-0 font-12"
                placeholder="Phone number" name="phone" id="phone">
            <textarea rows="4" class="form-control form-control-lg shadow-none border font-12" placeholder="Message"
                name="message" id="message"></textarea>
        </div>
        <button class="w-100 btn btn-lg btn-success font-12" type="submit">Send message</button>
    </form>
</main>
<?php app::component("footer"); ?>

<script src="./modules/contact/js/data.js"></script>
</body>

</html>