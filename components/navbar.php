<?php  $user = DB::exists("users", ["id","first_name","avatar"], ["id" =>  app::getSession('id')]); ?>

<header class=" py-3 mb-4 border-bottom bg-white">
<nav class="d-flex align-items-center align-content-center justify-content-between container">
    <a href="index.php" class=" text-dark text-decoration-none col-3">
        <img src="./assets/imgs/logo.png" height="30" alt="">
    </a>

    <ul class="nav  justify-content-center">
        <?php if(app::sessionHasNot("id")):?>
        <li><a href="index.php" class="nav-link px-3 text-secondary font-12"><b>Home</b></a></li>
        <li><a href="about.php" class="nav-link px-3 text-dark font-12"><b>About</b></a></li>
        <li><a href="contact.php" class="nav-link px-3 text-dark font-12"><b>Contact us</b></a></li>
        <li><a href="help.php" class="nav-link px-3 text-dark font-12"><b>Help center</b></a></li>
        <li><a href="terms.php" class="nav-link px-3 text-dark font-12"><b>Terms and conditions</b></a></li>
        <?php endif;?>
        <?php if(app::sessionHas("id")):?>
            <?php if(app::sessionRole("role", 1)):?>
        <li><a href="index.php" class="nav-link px-3 text-secondary font-12"><b>Home</b></a></li>
        <li><a href="requests.php" class="nav-link px-3 text-dark font-12"><b>Requests</b></a></li>
        <li><a href="messages.php" class="nav-link px-3 text-dark font-12"><b>Messages</b></a></li>
        <li><a href="vehicle.php" class="nav-link px-3 text-dark font-12"><b>Vehicle</b></a></li>
        <li><a href="routes.php" class="nav-link px-3 text-dark font-12"><b>Routes</b></a></li>
            <?php endif;?>

            <?php if(app::sessionRole("role", 0)):?>
        <li><a href="home.php" class="nav-link px-3 text-secondary font-12"><b>Home</b></a></li>
        <li><a href="requests-sent.php" class="nav-link px-3 text-dark font-12"><b>Sent requests</b></a></li>
        <li><a href="messages.php" class="nav-link px-3 text-dark font-12"><b>Messages</b></a></li>
            <?php endif;?>
        <?php endif;?>
    </ul>
    <div class="col-3 text-right">
        <?php if(app::sessionHasNot("id")):?>
        <a href="signin.php" class="btn btn-outline-success font-12 me-2">Login</a>
        <a href="signup.php" class="btn btn-success font-12">Sign-up</a>
        <?php endif;?>

        <?php if(app::sessionHas("id")):?>
        <div class="dropdown">
            <button type="button" class="btn btn-link text-dark btn-sm dropdown-toggle shadow-none" data-toggle="dropdown">
                <?php echo $user["first_name"]; ?>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="password-change.php">Change password</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>
        <?php endif;?>
    </div>
</nav>
</header>