<?php
require_once "../../classes/database.php";

if (!isset($_POST) and $_SERVER['message_METHOD'] == !"POST") {
  echo '<tr colspan="5"><td>Something went wrong</td></tr>';
} else {

  $limit = (isset($_POST["limit"])) ? $_POST["limit"] : 5;
  $page = (isset($_POST["page"])) ? $_POST["page"] : 1;

  /*** Fetching all data ***/
  $inbox = DB::columns(["r.sender_id","u.first_name","u.last_name","r.created_at","u.id AS user_id"], true);
  $inbox = DB::table("users AS u ");
  $inbox = DB::join(["messages as s" => ["u.id" => "s.sender_id"]], "LEFT");
  $inbox = DB::join(["messages as r" => ["u.id" => "r.receiver_id"]], "LEFT");
  $inbox = DB::where([
    "r.sender_id" => app::getSession("id"), 
    "r.receiver_id" => app::getSession("id"),
    "s.sender_id" => app::getSession("id"), 
    "s.receiver_id" => app::getSession("id"),
  ], " OR ");
  $inbox = DB::not(["u.id" => app::getSession("id")]);


  /*** Search all data ***/
  if(isset($_POST["search"])){
    $inbox =  DB::search([
      "r.message" => $_POST["search"],
      "s.message" => $_POST["search"],
      "u.first_name" => $_POST["search"],
      "u.last_name" => $_POST["search"],
    ], false);
  }

  // $inbox = DB::order("u.id", "DESC , r.id DESC");

  $inbox = ($limit == "all") ?: DB::paging($page, $limit);
  $inbox = DB::test();
  $inbox = DB::execute();
  $inbox = DB::fetch("all");

  if ($inbox) {
    foreach ($inbox as $chat) { ?>
      <tr>
        <td class="align-middle  px-3" data-label="Customer">
          <?php echo ucfirst($chat["first_name"])." ".ucfirst($chat["last_name"]) ; ?>
        </td>
        <td class="align-middle text-break" data-label="Message">
        <?php
        $message = DB::columns(["id","message"])::table("messages")::where([
          "sender_id" => app::getSession("id"),
          "receiver_id" => app::getSession("id"),
        ]," OR ")::order("id","DESC")::execute();
        $message = DB::fetch("one");
         echo $message["message"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Created at">
          <?php echo app::formatDatetime($chat['created_at']); ?>
        </td>
        <td class="align-middle px-3" data-label="Controls">
          <a class="loadMessageBtn ti-pencil mr-1 font-16 text-success" data-id="<?php echo $chat["user_id"]; ?>" href="javascript:void(0)" title="Update"></a>
        </td>
      </tr>
    <?php } ?>
    <tr id="loader"></tr>
    <?php if ($limit == "all") : ?>
    <?php else : ?>
      <tr id="pagination" class="bg-light">
        <td colspan="5" class="text-center">
          <?php $attr = (isset($_POST["sort"]) || isset($_POST["limit"]) || isset($_POST["search"])) ? "loadFiltered" : "loadmore"; ?>
          <button type="button" class="btn btn-sm btn-light border" id="<?php echo $attr; ?>" data-paging="<?php echo $page + 1; ?>">
            Load More
          </button>
        </td>
      </tr>
    <?php endif; ?>

    <?php } else { ?>
    <tr class="bg-light">
      <td colspan="5" class="text-center">
        <button type="button" class="btn btn-sm btn-outline-dark" disabled>No Results</button>
      </td>
    </tr>
    <?php }} ?>