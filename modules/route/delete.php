<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $id = app::post('id', ["tags", "entities", "chars"]); 

  $delete = DB::delete("routes")::where(["id" => $id])::execute();
  
  if ($delete) {
    app::reload(1000);
    app::success("1 row deleted successfully");
  }
}
