<?php
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] == !"POST") {
  echo '<tr colspan="12"><td>Something went wrong</td></tr>';
} else {


  $limit = (isset($_POST["limit"])) ? $_POST["limit"] : 5;
  $page = (isset($_POST["page"])) ? $_POST["page"] : 1;

  /*** Fetching all data ***/
  $vehicles = DB::columns(["v.id", "v.brand","v.color","v.seats", "v.model","v.status","v.created_at","v.updated_at"]);
  $vehicles = DB::columnsmore(["u.first_name","u.last_name","v.reg_number","v.type"]);
  $vehicles = DB::table("vehicles as v");
  $vehicles = DB::join(["users AS u" => ["u.id" => "v.user_id"]],"LEFT");

  /*** Search all data ***/
  if(isset($_POST["search"])){
    $vehicles =  DB::search([
      "v.id" => $_POST["search"],
      "u.first_name" => $_POST["search"],
      "u.last_name" => $_POST["search"],
    ]);
  }

  /*** sort all data ***/
  if (!isset($_POST["sort"])) {
    $vehicles = DB::order("v.id", "DESC");
  } else if($_POST["sort"] == "recent") {
    $vehicles = DB::order("v.id", "DESC");
  } else if($_POST["sort"] == "oldest") {
    $vehicles = DB::order("v.id", "ASC");
  }

  $vehicles = ($limit == "all") ?: DB::paging($page, $limit);
  $vehicles = DB::execute();
  $vehicles = DB::fetch("all");

  if ($vehicles) {
    foreach ($vehicles as $route) { ?>
      <tr>
        <td class="align-middle px-3" data-label="ID">
          <?php echo $route["id"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Driver">
          <?php echo ucFirst($route["first_name"])." ".ucFirst($route["last_name"]); ?>
        </td>
        <td class="align-middle text-break" data-label="Type">
          <?php echo $route["type"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Brand">
          <?php echo $route["brand"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Color">
          <?php echo $route["color"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Seats">
          <?php echo $route["seats"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Model">
          <?php echo $route["model"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Reg number">
          <?php echo $route["reg_number"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Status">
          <?php echo app::is_active($route["status"]);?>
        </td>
        <td class="align-middle text-break" data-label="Created at">
          <?php echo app::formatDatetime($route['created_at']); ?>
        </td>
        <td class="align-middle text-break" data-label="Updated at">
          <?php echo app::formatDatetime($route['updated_at']); ?>
        </td>
        <td class="align-middle px-3" data-label="Controls">
          <a class="updateBtn fa fa-pencil mr-1 font-16 text-success" data-id="<?php echo $route["id"]; ?>" href="javascript:void(0)" title="Update"></a>
          <a class="deleteBtn fa fa-trash mr-1 font-16 text-danger"  data-id="<?php echo $route["id"]; ?>" href="javascript:void(0)" title="Delete"></a>
        </td>
      </tr>
    <?php } ?>

    <tr id="loader"></tr>

    <?php if ($limit == "all") : ?>
    <?php else : ?>
      <tr id="pagination" class="bg-light">
        <td colspan="12" class="text-center">
          <?php $attr = (isset($_POST["sort"]) || isset($_POST["limit"]) || isset($_POST["search"])) ? "loadFiltered" : "loadmore"; ?>
          <button type="button" class="btn btn-sm btn-light border" id="<?php echo $attr; ?>" data-paging="<?php echo $page + 1; ?>">
            Load More
          </button>
        </td>
      </tr>
    <?php endif; ?>

  <?php } else { ?>
    <tr class="bg-light">
      <td colspan="12" class="text-center">
        <button type="button" class="btn btn-sm btn-outline-dark" disabled>No Results</button>
      </td>
    </tr>
<?php }
} ?>