<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $brand = app::post('brand', ["tags", "entities", "chars"]);
  $model = app::post('model', ["tags", "entities", "chars"]);
  $type = app::post('type', ["tags", "entities", "chars"]);
  $seats = app::post('seats', ["tags", "entities", "chars"]);
  $color = app::post('color', ["tags", "entities", "chars"]);
  $reg_number = app::post('reg_number', ["tags", "entities", "chars"]);

  $create = DB::insert("vehicles", [
    "brand" => $brand,
    "model" => $model,
    "color" => $color,
    "type" => $type,
    "seats" => $seats,
    "reg_number" => $reg_number,
    "user_id" => app::getSession('id'),
    "status" => 1,
  ]);
  $create = DB::execute();
  if($create) {
    app::success("Vehicle added successfully");
    app::reload(1000);

  } 
}
