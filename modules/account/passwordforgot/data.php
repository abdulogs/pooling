<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";
require_once "../../../classes/email.php";


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
  $mail = mailer::web("Car pooling");
  $mail = mailer::logo("assets/imgs/logo.png");
  $mail = mailer::title("Recover account password");
  $mail = mailer::description("Click on the link given below");
  $mail = mailer::btn("Click");
  $mail = mailer::btnRedirect("password-recover.php?token=".$token."&uid=".$user["id"]);
  $mail = mailer::send(true);

  if(!$user) {
      app::error("This email address does not exists");
    } else if($mail || $user) {

      $create = DB::insert("recover_auth", [
        "token" => $token,
        "email" => $email,
        "user_id" => $user["id"],
        "created_at" => date("Y/m/d h:i:s A"),
      ])::execute();
      
    if ($create) {
      app::redirect("email-sent.php", 1000);
    }
  }
}
