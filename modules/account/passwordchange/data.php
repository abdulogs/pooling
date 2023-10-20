<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";


if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $opassword = app::post('opassword', ["tags", "entities", "chars"]);
  $password = app::post('password', ["tags", "entities", "chars"]);


   if(!DB::exists("users", ["id"], ["password" =>  md5($opassword), "id" =>  app::getSession("id")])) {
    app::error("Old password is incorrect");
  } else {

    $update = DB::update("users", [
      "password" => md5($password),
      "updated_at" => date("Y/m/d h:i:s A"),
    ]);
    $update = DB::where(["id" => app::getSession('id')]);
    $update = DB::execute();

  if ($update) {
    app::success("Password change successfully");
    app::reload(1000);
    }
  }
}
