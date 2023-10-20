<?php
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] == !"POST") {
  echo '<tr colspan="6"><td>Something went wrong</td></tr>';
} else {


  $limit = (isset($_POST["limit"])) ? $_POST["limit"] : 5;
  $page = (isset($_POST["page"])) ? $_POST["page"] : 1;

  /*** Fetching all data ***/
  $locations = DB::columns(["id", "name","status","created_at","updated_at"]);
  $locations = DB::table("locations");

  /*** Search all data ***/
  if(isset($_POST["search"])){
    $locations =  DB::search([
      "id" => $_POST["search"],
      "name" => $_POST["search"],
    ]);
  }

  /*** sort all data ***/
  if (!isset($_POST["sort"])) {
    $locations = DB::order("id", "DESC");
  } else if($_POST["sort"] == "recent") {
    $locations = DB::order("id", "DESC");
  } else if($_POST["sort"] == "oldest") {
    $locations = DB::order("id", "ASC");
  }

  $locations = ($limit == "all") ?: DB::paging($page, $limit);
  $locations = DB::execute();
  $locations = DB::fetch("all");

  if ($locations) {
    foreach ($locations as $location) { ?>
      <tr>
        <td class="align-middle px-3" data-label="ID">
          <?php echo $location["id"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Name">
          <?php echo ucFirst($location["name"]); ?>
        </td>
        <td class="align-middle text-break" data-label="Status">
          <?php echo app::is_active($location['status']); ?>
        </td>
        <td class="align-middle text-break" data-label="Created at">
          <?php echo app::formatDatetime($location['created_at']); ?>
        </td>
        <td class="align-middle text-break" data-label="Updated at">
        <?php echo app::formatDatetime($location['updated_at']); ?>
        </td>
        <td class="align-middle px-3" data-label="Controls">
          <a class="updateBtn fa fa-pencil mr-1 font-16 text-success" data-id="<?php echo $location["id"]; ?>" href="javascript:void(0)" title="Update"></a>
          <a class="deleteBtn fa fa-trash mr-1 font-16 text-danger"  data-id="<?php echo $location["id"]; ?>" href="javascript:void(0)" title="Delete"></a>
        </td>
      </tr>
    <?php } ?>

    <tr id="loader"></tr>

    <?php if ($limit == "all") : ?>
    <?php else : ?>
      <tr id="pagination" class="bg-light">
        <td colspan="6" class="text-center">
          <?php $attr = (isset($_POST["sort"]) || isset($_POST["limit"]) || isset($_POST["search"])) ? "loadFiltered" : "loadmore"; ?>
          <button type="button" class="btn btn-sm btn-light border" id="<?php echo $attr; ?>" data-paging="<?php echo $page + 1; ?>">
            Load More
          </button>
        </td>
      </tr>
    <?php endif; ?>

  <?php } else { ?>
    <tr class="bg-light">
      <td colspan="6" class="text-center">
        <button type="button" class="btn btn-sm btn-outline-dark" disabled>No Results</button>
      </td>
    </tr>
<?php }
} ?>