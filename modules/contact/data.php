<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $fullname = app::post('fullname', ["tags", "entities", "chars"]);
  $phone = app::post('phone', ["tags", "entities", "chars"]);
  $email = app::post('email', ["tags", "entities", "chars"]);
  $message = app::post('message', ["tags", "entities", "chars"]);

  $query = DB::insert("queries", [
    "fullname" => $fullname,
    "phone" => $phone,
    "email" => $email,
    "message" =>$message,
    "status" => 0,
    "created_at" => date("Y/m/d h:i:s A"),
    "updated_at" => date("Y/m/d h:i:s A")
  ]);
  $query = DB::execute();
  if ($query) {
      app::success("Message sent successfully! we will give you a response soon");
      app::reload(2000);
  }
}  
