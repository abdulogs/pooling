<?php
require_once "../../../../classes/app.php";
require_once "../../../../classes/database.php";
require_once "../../../../classes/email.php";


if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $email = app::post('email', ["tags", "entities", "chars"]);
  $token = md5(time().date("y-m-d"));

  $user = DB::exists("users", ["id","first_name","last_name"], ["email" =>  $email]);

  $mail = mailer::template("forgot-password");
  $mail = mailer::file("../../../email/basic");
  $mail = mailer::fullname($user["first_name"]." ".$user["last_name"]);
  $mail = mailer::sender(app::getEmail());
  $mail = mailer::reciever($email);
  $mail = mailer::subject("Recover account password");
  $mail = mailer::web("Fbsit");
  $mail = mailer::logo("assets/images/logo.jpg");
  $mail = mailer::title("Recover account password");
  $mail = mailer::description("Click on the link given below");
  $mail = mailer::btn("Click");
  $mail = mailer::btnRedirect("admin/recover-password.php?token=".$token."&uid=".$user["id"]);

  if(!$user) {
      app::error("This email address does not exists");
    } else {
      $mail = mailer::send(true);

      $create = DB::insert("recovery", [
        "token" => $token,
        "email" => $email,
        "user_id" => $user["id"],
      ])::execute();
      
    if ($create) {
      app::redirect("admin/email-sent.php", 2000);
    }
  }
}
