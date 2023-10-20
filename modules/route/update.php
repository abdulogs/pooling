<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $id = app::post('id', ["tags", "entities", "chars"]);
  $location = app::post('location', ["tags", "entities", "chars"]);
  $departure = app::post('departure', ["tags", "entities", "chars"]);
  $arrival = app::post('arrival', ["tags", "entities", "chars"]);
  $fare = app::post('fare', ["tags", "entities", "chars"]);
  $status = app::post('status', ["tags", "entities", "chars"]);

  $update = DB::update("routes", [
    "fare" => $fare,
    "location_id" => $location,
    "departure" => $departure,
    "arrival" => $arrival,
    "status" => $status,
    "updated_at" => date("Y/m/d h:i:s A")
  ]);
  $update = DB::where(["id" => $id]);
  $update = DB::execute();

  if ($update) {
    app::reload(1000);
    app::success("1 row created successfully");
  }
}
