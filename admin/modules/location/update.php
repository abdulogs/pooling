<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $id = app::post('id', ["tags", "entities", "chars"]);
  $name = app::post('name', ["tags", "entities", "chars"]);
  $status = app::post('status', ["tags", "entities", "chars"]);

  $location = DB::update("locations",[
    "name" => $name,
    "status" => $status,
    "updated_at" => date("Y/m/d h:i:s A")
  ]);
  $location = DB::where(["id" => $id]);
  $location = DB::execute();

  if ($location) {
    app::reload(1000);
    app::success("1 row created successfully");
  }
}
