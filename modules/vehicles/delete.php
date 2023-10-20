<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $id = app::post('id', ["tags", "entities", "chars"]);
  $delete = DB::delete("requests")::where(["route_id" => $id, "user_id" => app::getSession("id")])::execute();
  
  if ($delete) {
      app::success("Request unsent successfully");
      app::reload(2000);
  }
}  
