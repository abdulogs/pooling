<?php
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] == !"POST") {
  echo '<tr colspan="9"><td>Something went wrong</td></tr>';
} else {


  $limit = (isset($_POST["limit"])) ? $_POST["limit"] : 5;
  $page = (isset($_POST["page"])) ? $_POST["page"] : 1;

  /*** Fetching all data ***/
  $queries = DB::columns(["id", "fullname","email","message","phone","status","created_at","updated_at"]);
  $queries = DB::table("queries");

  /*** Search all data ***/
  if(isset($_POST["search"])){
    $queries =  DB::search([
      "id" => $_POST["search"],
      "fullname" => $_POST["search"],
      "email" => $_POST["search"],
      "phone" => $_POST["search"],
      "message" => $_POST["search"],
    ]);
  }

  /*** sort all data ***/
  if (!isset($_POST["sort"])) {
    $queries = DB::order("id", "DESC");
  } else if($_POST["sort"] == "recent") {
    $queries = DB::order("id", "DESC");
  } else if($_POST["sort"] == "oldest") {
    $queries = DB::order("id", "ASC");
  }

  $queries = ($limit == "all") ?: DB::paging($page, $limit);
  $queries = DB::execute();
  $queries = DB::fetch("all");

  if ($queries) {
    foreach ($queries as $query) { ?>
      <tr>
        <td class="align-middle px-3" data-label="ID">
          <?php echo $query["id"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Full name">
          <?php echo ucFirst($query["fullname"]); ?>
        </td>
        <td class="align-middle text-break" data-label="Email">
          <?php echo $query["email"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Phone">
          <?php echo $query["phone"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Message">
          <?php echo $query["message"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Status">
          <?php echo app::is_answered($query["status"]);?>
        </td>
        <td class="align-middle text-break" data-label="Created at">
          <?php echo app::formatDatetime($query['created_at']); ?>
        </td>
        <td class="align-middle text-break" data-label="Updated at">
          <?php echo app::formatDatetime($query['updated_at']); ?>
        </td>
        <td class="align-middle px-3" data-label="Controls">
          <a class="updateBtn fa fa-pencil mr-1 font-16 text-success" data-id="<?php echo $query["id"]; ?>" href="javascript:void(0)" title="Update"></a>
          <a class="deleteBtn fa fa-trash mr-1 font-16 text-danger"  data-id="<?php echo $query["id"]; ?>" href="javascript:void(0)" title="Delete"></a>
        </td>
      </tr>
    <?php } ?>

    <tr id="loader"></tr>

    <?php if ($limit == "all") : ?>
    <?php else : ?>
      <tr id="pagination" class="bg-light">
        <td colspan="9" class="text-center">
          <?php $attr = (isset($_POST["sort"]) || isset($_POST["limit"]) || isset($_POST["search"])) ? "loadFiltered" : "loadmore"; ?>
          <button type="button" class="btn btn-sm btn-light border" id="<?php echo $attr; ?>" data-paging="<?php echo $page + 1; ?>">
            Load More
          </button>
        </td>
      </tr>
    <?php endif; ?>

  <?php } else { ?>
    <tr class="bg-light">
      <td colspan="9" class="text-center">
        <button type="button" class="btn btn-sm btn-outline-dark" disabled>No Results</button>
      </td>
    </tr>
<?php }
} ?>