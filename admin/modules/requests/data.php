<?php
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] == !"POST") {
  echo '<tr colspan="11"><td>Something went wrong</td></tr>';
} else {


  $limit = (isset($_POST["limit"])) ? $_POST["limit"] : 5;
  $page = (isset($_POST["page"])) ? $_POST["page"] : 1;

  /*** Fetching all data ***/
  $requests = DB::columns(["r.id", "ro.fare","ro.arrival","ro.departure","r.status","ro.created_at","ro.updated_at"]);
  $requests = DB::columnsmore(["l.name","p.first_name as pfname","p.last_name plname"]);
  $requests = DB::columnsmore(["d.first_name as dfname","d.last_name dlname"]);
  $requests = DB::table("requests as r");
  $requests = DB::join(["routes AS ro" => ["ro.id" => "r.route_id"]],"LEFT");
  $requests = DB::join(["locations AS l" => ["l.id" => "ro.location_id"]],"LEFT");
  $requests = DB::join(["users AS p" => ["p.id" => "r.user_id"]],"LEFT");
  $requests = DB::join(["users AS d" => ["d.id" => "ro.user_id"]],"LEFT");

  /*** Search all data ***/
  if(isset($_POST["search"])){
    $requests =  DB::search([
      "r.id" => $_POST["search"],
      "l.name" => $_POST["search"],
      "p.first_name" => $_POST["search"],
      "p.last_name" => $_POST["search"],
      "d.first_name" => $_POST["search"],
      "d.last_name" => $_POST["search"],
    ]);
  }

  /*** sort all data ***/
  if (!isset($_POST["sort"])) {
    $requests = DB::order("r.id", "DESC");
  } else if($_POST["sort"] == "recent") {
    $requests = DB::order("r.id", "DESC");
  } else if($_POST["sort"] == "oldest") {
    $requests = DB::order("r.id", "ASC");
  }

  $requests = ($limit == "all") ?: DB::paging($page, $limit);
  $requests = DB::execute();
  $requests = DB::fetch("all");

  if ($requests) {
    foreach ($requests as $request) { ?>
      <tr>
      <td class="align-middle px-3" data-label="ID">
          <?php echo $request["id"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Passenger">
          <?php echo ucfirst($request["pfname"])." ".ucfirst($request["plname"]) ; ?>
        </td>
        <td class="align-middle text-break" data-label="Driver">
          <?php echo ucfirst($request["dfname"])." ".ucfirst($request["dlname"]) ; ?>
        </td>
        <td class="align-middle text-break" data-label="Location">
          <?php echo ucfirst($request["name"]); ?>
        </td>
        <td class="align-middle text-break" data-label="Fare">
          <?php echo $request["fare"]; ?> PKR
        </td>
        <td class="align-middle text-break" data-label="Arrival">
          <?php echo $request["arrival"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Departure">
          <?php echo $request["departure"]; ?>
        </td>
        <td class="align-middle text-break" data-label="Status">
          <?php echo app::is_approved($request["status"]); ?>
        </td>
        <td class="align-middle text-break" data-label="Created at">
          <?php echo app::formatDatetime($request['created_at']); ?>
        </td>
        <td class="align-middle text-break" data-label="Updated at">
          <?php echo app::formatDatetime($request['updated_at']); ?>
        </td>
        <td class="align-middle px-3" data-label="Controls">
          <a class="updateBtn fa fa-pencil mr-1 font-16 text-success" data-id="<?php echo $request["id"]; ?>" href="javascript:void(0)" title="Update"></a>
          <a class="deleteBtn fa fa-trash mr-1 font-16 text-danger"  data-id="<?php echo $request["id"]; ?>" href="javascript:void(0)" title="Delete"></a>
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