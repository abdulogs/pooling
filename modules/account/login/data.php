<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $email = app::post('email', ["tags", "entities", "chars"]);
  $password = app::post('password', ["tags", "entities", "chars"]);

  $user = DB::exists("users", ["id","role","status"], ["email" =>  $email, "password" =>  md5($password)]);

  if($user) {
    app::success("Login successfully");
    app::setSession("id", $user["id"]);
    app::setSession("role", $user["role"]);

    if($user["role"] == 0){
      app::redirect("home.php", 1000);
    } elseif($user["role"] == 1){
      app::redirect("requests.php", 1000);
    }

    } else{
    app::error("Invalid credentials");
    } 
}
