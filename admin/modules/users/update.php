<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $id = app::post('id', ["tags", "entities", "chars"]); 
  $fname = app::post('fname', ["tags", "entities", "chars"]); 
  $lname = app::post('lname', ["tags", "entities", "chars"]);
  $email = app::post('email', ["tags", "entities", "chars"]);
  $oemail = app::post('oemail', ["tags", "entities", "chars"]);
  $password = app::post('password', ["tags", "entities", "chars"]);
  $opassword = app::post('opassword', ["tags", "entities", "chars"]);
  $about = app::post('about', ["tags", "entities", "chars"]);
  $phone = app::post('phone', ["tags", "entities", "chars"]);
  $address = app::post('address', ["tags", "entities", "chars"]);
  $status = app::post('status', ["tags", "entities", "chars"]);
  $role = app::post('role', ["tags", "entities", "chars"]);



  if ($email == $oemail) {
    $mail = $oemail;
  } elseif ($email != $oemail) {
    $mail = $email;
  }

  if (!empty($password)) {
    $pass = md5($password);
  } elseif (empty($password) && $password == "") {
    $pass = $opassword;
  }

  $user = DB::update("users",[
    "first_name" => $fname,
    "last_name" => $lname,
    "email" => $mail,
    "password" => $pass,
    "address" => $address,
    "about" => $about,
    "phone" => $phone,
    "status" => $status,
    "role" => $role,
    "updated_at" => date("Y/m/d h:i:s A")
  ]);
  $user = DB::where(["id" => $id]);
  $user = DB::execute();

  if ($user) {
    app::success("1 row updated successfully");
    app::reload(1000);
  }
}
