<?php require_once "../classes/database.php"; ?>
<?php app::isLogout("id", "admin/index.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Profile</title>
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/admin.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<style>
    #profileImage {
        width: 150px;
        height: 150px;
        display: inline-block;
        cursor: pointer
    }

    #profileImage .image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>

<body class="fixed-nav sticky-footer" id="page-top">


<?php 
    $user = DB::exists("users", 
    ["first_name", "last_name","email","password","about","avatar","phone","address"] , 
    ["id" => app::getSession("id")]);  ?>

    <?php app::component("navigation"); ?>

    <main class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item">Profile</li>
                <li class="breadcrumb-item active"><?php echo $user['first_name'] ?> <?php echo $user['last_name'] ?></li>
            </ol>
          <div class="d-flex flex-column justify-content-center align-items-center">
          <div class="col-sm-6">
            <form method="post" class="mb-5 d-flex flex-column justify-content-center align-items-center" id="avatar">
                <label class="m-0 text-center" id="profileImage" for="image">
                    <?php if (empty($user["avatar"]) || !file_exists("./uploads/avatars/{$user["avatar"]}")): ?>
                    <img id="output" src="./assets/images/avatar.png"
                        class="rounded-circle img-thumbnail image m-0">
                    <?php else: ?>
                    <img id="output" src="./uploads/avatars/<?php echo $user['avatar']; ?>"
                        class="rounded-circle img-thumbnail image -0">
                    <?php endif; ?>
                </label>
                <input type="file" class="custom-file-input" id="image" name="image" type="file"
                    onchange="loadFile(event)" accept="image/*" hidden>
                <input type="hidden" name="avatar" value="<?php echo $user["avatar"]; ?>">
                <h3 class="text-center font-weight-bolder h5 mt-2 mb-3">
                    <?php echo $user["first_name"]; ?>
                    <?php echo $user["last_name"]; ?>
                </h3>
                <div id="submitavatar"></div>
            </form>
            <form class="form mb-5 pb-5" id="profile" method="post">
                <div class="form-row">
                    <div class="form-group col-sm-6 mb-2">
                        <label class="font-weight-bolder mb-0" for="fname">Firstname</label>
                        <input class="form-control font-12" id="fname" name="fname" type="text" value="<?php echo $user['first_name'] ?>" required />
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label class="font-weight-bolder mb-0" for="lname">Lastname</label>
                        <input class="form-control font-12" id="lname" name="lname" type="text" value="<?php echo $user['last_name'] ?>" required />
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label class="font-weight-bolder mb-0" for="email">Email</label>
                        <input class="form-control font-12" id="email" name="email" type="email" value="<?php echo $user['email'] ?>" required />
                        <input name="oemail" type="hidden" value="<?php echo $user['email'] ?>" />
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label class="font-weight-bolder mb-0" for="password">Password</label>
                        <input class="form-control font-12" id="password" name="password" type="password" />
                        <input name="opassword" type="hidden" value="<?php echo $user['password'] ?>" />
                    </div>
                    <div class="form-group col-sm-12 mb-2">
                    <label class="font-weight-bolder mb-0" for="phone">Phone</label>
                    <input class="form-control font-12" id="phone" name="phone" value="<?php echo $user['phone'] ?>" type="text" />
                    </div>
                    <div class="form-group col-sm-12 mb-2">
                    <label class="font-weight-bolder mb-0" for="about">About</label>
                    <input class="form-control font-12" id="about" name="about" value="<?php echo $user['about'] ?>" type="text" />
                    </div>
                    <div class="form-group col-sm-12 mb-2">
                    <label class="font-weight-bolder mb-0" for="address">Address</label>
                    <input class="form-control font-12" id="address" name="address" value="<?php echo $user['address'] ?>" type="text" />
                    </div>
                    <button class="ml-auto mr-auto btn btn-lg btn-success font-12" type="submit">Update</button>
                </form>
                </div>
            </div>
        </div>
    </main>

    <?php app::component("footer"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="./modules/account/profile/js/data.js"></script>
    <script src="./modules/account/avatar/js/data.js"></script>
    <script src="./assets/js/image.js"></script>
   
    <script>
        $(document).on("change", "#image", function (e) {
            $("#submitavatar").html(`    <button class="btn btn-dark btn-lg font-12" id="profilesubmit" type="submit">Change</button>`)
        });

    </script>
</body>

</html>