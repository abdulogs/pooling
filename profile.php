<?php require_once "./classes/database.php"; ?>

<?php 
    $columns = ["first_name", "last_name","email","avatar","about","phone","address"];
    $user = DB::exists("users", $columns , ["id" => app::getSession("id")]); 
?>

<!Doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $user["first_name"]; ?>
        <?php echo $user["last_name"]; ?>
    </title>
    <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <link rel="stylesheet" href="./assets/libs/themify/themify-icons.css">
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
</head>

<body class="d-flex flex-column bg-light">
    <?php app::component("navbar"); ?>
    <main class="container">
        <section class="card mb-4">
            <form form class="d-flex flex-column align-items-center justify-content-center mt-5" method="post"
                id="avatar">
                <label class="m-0 text-center " id="profileImage" for="image">
                    <?php if (empty($user["avatar"]) || !file_exists("./admin/uploads/avatars/{$user["avatar"]}")): ?>
                    <img id="output" src="./assets/imgs/avatar.jpg" class="image" style="border-radius:150px;">
                    <?php else: ?>
                    <img id="output" src="./admin/uploads/avatars/<?php echo $user['avatar']; ?>" class="image"
                        style="border-radius:150px;">
                    <?php endif; ?>
                </label>
                <input type="file" class="custom-file-input" id="image" name="image" type="file"
                    onchange="loadFile(event)" accept="image/*" hidden>
                <input type="hidden" name="avatar" value="<?php echo $user["avatar"]; ?>"><br>
                <div id="submitavatar"></div>
            </form>
            <form class="form mb-5 mt-0" id="profile" method="post">
                <h1 class="h3 mb-2 m-0 font-weight-bold text-center">
                    <?php echo $user["first_name"]; ?>
                    <?php echo $user["last_name"]; ?>
                </h1>
                <p class="h6 mb-4 text-center text-muted">Update your account!</p>
                <div class="form-group mb-2">
                    <label for="brand" class="mb-0"><b>Firstname</b></label>
                    <input type="text" class="form-control form-control-lg shadow-none border rounded font-12"
                        placeholder="Firstname" name="firstname" id="firstname" value="<?php echo $user["first_name"];?>">
                </div>
                <div class="form-group mb-2">
                    <label for="lastname" class="mb-0"><b>Lastname</b></label>
                    <input type="text" class="form-control form-control-lg shadow-none border rounded font-12"
                        placeholder="Lastname" name="lastname" id="lastname" value="<?php echo $user["last_name"]; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="email" class="mb-0"><b>Email</b></label>
                    <input type="email" class="form-control form-control-lg shadow-none border bg-white rounded font-12"
                        placeholder="Email address..." name="email" id="email" value="<?php echo $user["email"]; ?>"  disabled>
                </div>
                <div class="form-group mb-2">
                    <label for="phone" class="mb-0"><b>Phone</b></label>
                    <input type="phone" class="form-control form-control-lg shadow-none border rounded font-12"
                        placeholder="Phone..." name="phone" id="phone" value="<?php echo $user["phone"]; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="address" class="mb-0"><b>Address</b></label>
                    <input type="address" class="form-control form-control-lg shadow-none border rounded font-12"
                        placeholder="Address..." name="address" id="address" value="<?php echo $user["address"]; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="email" class="mb-0"><b>Email</b></label>
                    <input type="email" class="form-control form-control-lg shadow-none border rounded font-12"
                        placeholder="Email address..." name="email" id="email" value="<?php echo $user["email"]; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="about" class="mb-0"><b>About</b></label>
                    <textarea rows="4" class="form-control form-control-lg shadow-none border font-12"
                        placeholder="Tell something about yourself..." name="about"
                        id="about"><?php echo $user["about"]; ?></textarea>
                </div>
                <button class="w-100 btn btn-lg btn-success font-12" type="submit">Update</button>
            </form>
        </section>
    </main>
    <?php app::component("footer"); ?>

    <script src="./assets/js/image.js"></script>

    <script>
        $(document).on("change", "#image", function (e) {
            $("#submitavatar").html(`<button class="btn_1 outline" id="profilesubmit" type="submit">Change</button><br><br>`)
        });
    </script>

    <script src="./modules/account/profile/js/data.js"></script>
    <script src="./modules/account/avatar/js/data.js"></script>
</body>

</html>