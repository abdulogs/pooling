<?php
require_once "../../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $fname = app::post('fname', ["tags", "entities", "chars"]);
  $lname = app::post('lname', ["tags", "entities", "chars"]);
  $email = app::post('email', ["tags", "entities", "chars"]);
  $password = app::post('password', ["tags", "entities", "chars"]);
  $role = app::post('role', ["tags", "entities", "chars"]);

  if(DB::exists("users", ["id"], ["email" =>  $email])) {
      app::error("This email address already exists");
    } else {

    $user = DB::insert("users", [
      "first_name" => $fname,
      "last_name" => $lname,
      "email" => $email,
      "password" => md5($password),
      "role" => $role,
      "status" => 1,
      "created_at" => date("Y/m/d h:i:s A"),
      "updated_at" => date("Y/m/d h:i:s A")
    ]);
    $user = DB::execute();
      if ($user) {
        app::success("Account created successfully");
        app::redirect("signin.php", 1000);
        }
    }
  }  
