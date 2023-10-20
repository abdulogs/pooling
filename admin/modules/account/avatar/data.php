<?php
require_once "../../../../classes/app.php";
require_once "../../../../classes/database.php";
require_once "../../../../classes/media.php";

  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
    $avatar = app::post('avatar', ["tags", "entities", "chars"]);

    if (!empty($_FILES['image']['name'])) {
      media::remove("../../../uploads/avatars/{$avatar}");
      $image = media::file("image")::type(["png","jpg","jpeg"])::size(2097152)::name("avatar");
      $image = media::folder("../../../uploads/avatars/");
    } else {
      $image = $avatar;
    }

    $update = DB::update("users", [
      "avatar" => $image,
    ]);
    $update = DB::where(["id" => $_SESSION["id"]]);
    $update = DB::execute();

    app::success("Updated successfully");
    app::reload(1000);
  }
?>
