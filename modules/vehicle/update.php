<?php
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
  $id = app::post('id', ["tags", "entities", "chars"]);
  $brand = app::post('brand', ["tags", "entities", "chars"]);
  $model = app::post('model', ["tags", "entities", "chars"]);
  $type = app::post('type', ["tags", "entities", "chars"]);
  $seats = app::post('seats', ["tags", "entities", "chars"]);
  $color = app::post('color', ["tags", "entities", "chars"]);
  $reg_number = app::post('reg_number', ["tags", "entities", "chars"]);

  $update = DB::update("vehicles", [
    "brand" => $brand,
    "model" => $model,
    "color" => $color,
    "type" => $type,
    "seats" => $seats,
    "reg_number" => $reg_number,
  ]);
  $update = DB::where(["id" => $id]);
  $update = DB::execute();
  if($update) {
    app::success("Vehicle updated successfully");
    app::reload(1000);
  } 
}
