<?php
require_once "../../classes/app.php";
require_once "../../classes/database.php";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

  $id = app::post('id', ["tags", "entities", "chars"]);

  $delete = DB::delete("bookmarks")::where(["book_id" => $id, "user_id" => app::getSession('id')])::execute();
  if($delete) {
    app::success("Book removed successfully");
  } 
}
