<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $id = app::post('id', ["tags", "entities", "chars"]);
  $create = DB::insert("requests", [
    "route_id" => $id,
    "user_id" => app::getSession('id'),
  ]);
  $create = DB::execute();
  if($create) {
    app::success("Request sent successfully");
  } 
}
