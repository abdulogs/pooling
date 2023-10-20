<?php
require_once "../../../../classes/app.php";
require_once "../../../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $email = app::post('email', ["tags", "entities", "chars"]);
  $password = app::post('password', ["tags", "entities", "chars"]);
  $password = md5($password);

  $user = DB::exists("users", 
    ["id","role","status"], 
    ["email" =>  $email,
    "password" =>  $password
  ]);

  if($user) {
    app::success("Login successfully");
    app::setSession("id", $user["id"]);
    app::redirect("admin/users.php", 1000);
    } else{
    app::error("Invalid credentials");
    } 
}