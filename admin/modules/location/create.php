<?php
require_once "../../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  
  $name = app::post('name', ["tags", "entities", "chars"]);
  $status = app::post('status', ["tags", "entities", "chars"]);

  $category = DB::insert("locations", [
    "name" => $name,
    "status" => $status,
    "created_at" => date("Y/m/d h:i:s A"),
    "updated_at" => date("Y/m/d h:i:s A")
  ]);
  $category = DB::execute();

  if ($category) {
    app::reload(1000);
    app::success("1 row created successfully");
  }
}
