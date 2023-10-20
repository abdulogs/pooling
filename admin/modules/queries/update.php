<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";
require_once "../../../classes/email.php";


if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $id = app::post('id', ["tags", "entities", "chars"]);
  $name = app::post('name', ["tags", "entities", "chars"]);
  $email = app::post('email', ["tags", "entities", "chars"]);
  $message = app::post('status', ["tags", "entities", "chars"]);

  $query = DB::columns(["id", "fullname"])::table("queries")::where(["id" => $id])::execute();
  $query = DB::fetch("one");

  $mail = mailer::template("contact");
  $mail = mailer::file("../../email/basic");
  $mail = mailer::fullname($query["fullname"]);
  $mail = mailer::sender(app::getEmail());
  $mail = mailer::reciever($email);
  $mail = mailer::subject($name);
  $mail = mailer::web("Elibray");
  $mail = mailer::logo("assets/img/logos/logo-transparent.png");
  $mail = mailer::title("Elibrary response");
  $mail = mailer::description($message);
  $mail = mailer::send();

  $update = DB::update("queries",[
    "status" => 1,
    "updated_at" => date("Y/m/d h:i:s A")
  ]);
  $update = DB::where(["id" => $id]);
  $update = DB::execute();

  if ($update) {
    app::reload(1000);
    app::success("1 row created successfully");
  }
}
