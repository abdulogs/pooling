<?php
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] == !"POST") {
  echo '<tr colspan="11"><td>Something went wrong</td></tr>';
} else {


  $limit = (isset($_POST["limit"])) ? $_POST["limit"] : 5;
  $page = (isset($_POST["page"])) ? $_POST["page"] : 1;

  /*** Fetching all data ***/
  $routes = DB::columns(["r.id", "r.fare","r.arrival","r.departure","r.status","r.created_at","r.updated_at"]);
  $routes = DB::columnsmore(["l.name","u.first_name","u.last_name","v.type","v.model","v.color","v.brand"]);
  $routes = DB::table("routes as r");
  $routes = DB::join(["locations AS l" => ["l.id" => "r.location_id"]],"LEFT");
  $routes = DB::join(["users AS u" => ["u.id" => "r.user_id"]],"LEFT");
  $routes = DB::join(["vehicles AS v" => ["v.id" => "r.vehicle_id"]],"LEFT");

  /*** Search all data ***/
  if(isset($_POST["search"])){
    $routes =  DB::search([
      "r.id" => $_POST["search"],
      "u.first_name" => $_POST["search"],
      "u.last_name" => $_POST["search"],
      "u.email" => $_POST["search"],
      "r.fare" => $_POST["search"],
      "l.name" => $_POST["search"],
    ]);
  }

  /*** sort all data ***/
  if (!isset($_POST["sort"])) {
    $routes = DB::order("r.id", "DESC");
  } else if($_POST["sort"] == "recent") {
    $routes = DB::order("r.id", "DESC");
  } else if($_POST["sort"] == "oldest") {
    $routes = DB::order("r.id", "ASC");
  }

  $routes = ($limit == "all") ?: DB::paging($page, $limit);
  $routes = DB::execute();
  $routes = DB::fetch("all");

  if ($routes) {
    foreach ($routes as $route) { ?>
      <tr>
        <td class="align-middle px-3" data-label="ID">
          <?php echo $route["id"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Driver">
          <?php echo ucFirst($route["first_name"])." ".ucFirst($route["last_name"]); ?>
        </td>
        <td class="align-middle text-break" data-label="Vehicle">
          <?php echo $route["type"].", ".$route["color"].", ".$route["brand"].", ".$route["model"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Location">
          <?php echo ucfirst($route["name"]); ?>
        </td>
        <td class="align-middle text-break" data-label="Fare">
          <?php echo $route["fare"]; ?> PKR
        </td>
        <td class="align-middle text-break" data-label="Arrival">
          <?php echo $route["arrival"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Departure">
          <?php echo $route["departure"]; ?>
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
        <td colspan="11" class="text-center">
          <?php $attr = (isset($_POST["sort"]) || isset($_POST["limit"]) || isset($_POST["search"])) ? "loadFiltered" : "loadmore"; ?>
          <button type="button" class="btn btn-sm btn-light border" id="<?php echo $attr; ?>" data-paging="<?php echo $page + 1; ?>">
            Load More
          </button>
        </td>
      </tr>
    <?php endif; ?>

  <?php } else { ?>
    <tr class="bg-light">
      <td colspan="11" class="text-center">
        <button type="button" class="btn btn-sm btn-outline-dark" disabled>No Results</button>
      </td>
    </tr>
<?php }
} ?>