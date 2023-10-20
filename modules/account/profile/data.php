<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";


if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $fname = app::post('firstname', ["tags", "entities", "chars"]);
  $lname = app::post('lastname', ["tags", "entities", "chars"]);
  $about = app::post('about', ["tags", "entities", "chars"]);
  $phone = app::post('phone', ["tags", "entities", "chars"]);
  $address = app::post('address', ["tags", "entities", "chars"]);

  $update = DB::update("users", [
    "first_name" => $fname,
    "last_name" => $lname,
    "phone" => $phone,
    "address" => $address,
    "about" => $about,
    "updated_at" => date("Y/m/d h:i:s A"),
  ]);
  $update = DB::where(["id" => app::getSession("id")]);
  $update = DB::execute();

  if ($update) {
    app::success("Profile updated successfully");
    app::reload(1000);
  }
}
