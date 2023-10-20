<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  
  $location = app::post('location', ["tags", "entities", "chars"]);
  $departure = app::post('departure', ["tags", "entities", "chars"]);
  $arrival = app::post('arrival', ["tags", "entities", "chars"]);
  $fare = app::post('fare', ["tags", "entities", "chars"]);
  $status = app::post('status', ["tags", "entities", "chars"]);

  $vehicle = DB::columns("*")::table("vehicles")::where(["user_id" => app::getSession("id")])::execute();
  $vehicle = DB::fetch("one");

  if(!$vehicle){
    app::error("Please add a vehicle first");
  } else{
    $create = DB::insert("routes", [
      "fare" => $fare,
      "user_id" => app::getSession("id"),
      "location_id" => $location,
      "vehicle_id" => $vehicle["id"],
      "departure" => $departure,
      "arrival" => $arrival,
      "status" => $status,
      "created_at" => date("Y/m/d h:i:s A"),
      "updated_at" => date("Y/m/d h:i:s A")
    ]);
    $create = DB::execute();
  
    if ($create) {
      app::reload(1000);
      app::success("1 row created successfully");
    }
  }
}
