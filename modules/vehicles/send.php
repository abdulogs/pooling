<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $id = app::post('id', ["tags", "entities", "chars"]);

  $create = DB::insert("requests", [
    "user_id" => app::getSession("id"),
    "route_id" => $id,
    "status" => 0,
    "created_at" => date("Y/m/d h:i:s A"),
    "updated_at" => date("Y/m/d h:i:s A")
  ]);
  $create = DB::execute();

  if ($create) {
      app::success("Request sent successfully");
      app::reload(2000);
  }
}  
