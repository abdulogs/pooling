<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $message = app::post('message', ["tags", "entities", "chars"]);
  $receiver_id = app::post('receiver_id', ["tags", "entities", "chars"]);

  $create = DB::insert("messages", [
    "sender_id" => app::getSession("id"),
    "receiver_id" => $receiver_id,
    "message" => $message,
    "created_at" => date("Y/m/d h:i:s A")
  ]);
  $create = DB::execute();

  if ($create) {
    app::success("1 row created successfully");
  }
}
