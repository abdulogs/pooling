<?php
require_once "../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] == !"POST") {
  echo '<tr colspan="12"><td>Something went wrong</td></tr>';
} else {
  $arrival = app::post('arrival', ["tags", "entities", "chars"]);
  $departure = app::post('departure', ["tags", "entities", "chars"]);
  $location = app::post('location', ["tags", "entities", "chars"]);

  $limit = (isset($_POST["limit"])) ? $_POST["limit"] : 5;
  $page = (isset($_POST["page"])) ? $_POST["page"] : 1;

  /*** Fetching all data ***/
  $vehicles = DB::columns(["r.id", "r.user_id","v.brand","v.color","v.seats", "r.fare","v.model","v.status","v.created_at","v.updated_at"]);
  $vehicles = DB::columnsmore(["u.first_name","u.last_name","v.reg_number","v.type","l.name AS location","r.arrival","r.departure"]);
  $vehicles = DB::table("routes as r");
  $vehicles = DB::join(["users AS u" => ["u.id" => "r.user_id"]],"LEFT");
  $vehicles = DB::join(["vehicles AS v" => ["v.id" => "r.vehicle_id"]],"LEFT");
  $vehicles = DB::join(["locations AS l" => ["l.id" => "r.location_id"]],"LEFT");
  $vehicles = DB::where(["r.status" => 1]);
  /*** Search all data ***/


  if(!empty($arrival) || !empty($arrival) || !empty($arrival)){
    $vehicles =  DB::where([
      "r.arrival" => $arrival,
      "r.departure" => $departure,
      "l.id" => $location,
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
    foreach ($vehicles as $vehicle) { ?>
    <div class="col-lg-4 col-md-3 col-sm-2 col-12">
      <div class="card">
      <div class="card-header text-center p-0 bg-white">
          <?php if ($vehicle["type"] == "Bike"): ?>
          <img class="card-img-top" src="assets/imgs/cars/bike.png" style="width:150px;">
          <?php elseif($vehicle["type"] == "Car"): ?>
          <img class="card-img-top" src="assets/imgs/cars/car.png" style="width:150px;">
          <?php elseif($vehicle["type"] == "Pickup"): ?>
          <img class="card-img-top" src="assets/imgs/cars/pickup.png" style="width:150px;">
          <?php endif; ?>
          </div>
        <div class="card-body">
            <h5 class="card-title mb-1"><b><?php echo $vehicle["type"];?></b></h5>
            <p class="card-text mb-1">
              <?php echo ucfirst($vehicle["color"]).", ".ucfirst($vehicle["brand"]).", ".$vehicle["model"]; ?>
            </p>
            <p class="card-text mb-1"><b>Location:</b> <?php echo $vehicle["location"] ?></p>
            <p class="card-text mb-1"><b>Arrival:</b> <?php echo $vehicle["arrival"] ?></p>
            <p class="card-text mb-1"><b>Departure:</b> <?php echo $vehicle["departure"] ?></p>
            <p class="card-text mb-1">
              <b class="text-dark">Driver :</b>          
              <?php echo ucFirst($vehicle["first_name"])." ".ucFirst($vehicle["last_name"]); ?>
            </p>
            <p class="card-text">
              <b class="text-dark">Fare :</b>          
              <?php echo $vehicle["fare"] / $vehicle["seats"]; ?> PKR
            </p>
            <div>
            <?php
            $requested = DB::columns(["id"])::table("requests");
            $requested = DB::where(["user_id" => app::getSession("id"), "route_id" => $vehicle["id"]]);
            $requested = DB::execute();
            $requested = DB::fetch("one"); ?>
              <?php if($requested): ?>
              <button type="button" class="btn btn-sm btn-dark unsendRequest" data-id="<?php echo $vehicle["id"] ?>">Cancel request</button>
              <?php else: ?>
              <button type="button" class="btn btn-sm btn-dark sendRequest " data-id="<?php echo $vehicle["id"] ?>">Send request</button>
              <?php endif; ?>
              <button type="button" class="btn btn-sm btn-success loadMessageBtn" data-id="<?php echo $vehicle["user_id"] ?>">Send message</button>
            </div>
          </div>
        
      </div>
    </div>
    <?php } ?>
    <div id="loader"></div>
    <?php if ($limit == "all") : ?>
    <?php else : ?>
    <div id="pagination" class="col-sm-12 mt-5 mb-5 text-center">
    <?php $attr = (isset($_POST["sort"]) || isset($_POST["limit"]) || isset($_POST["search"])) ? "loadFiltered" : "loadmore"; ?>
        <button type="button" class="btn btn-dark border" id="<?php echo $attr; ?>" data-paging="<?php echo $page + 1; ?>">
          Load More
        </button>
    </div>
    <?php endif; ?>

  <?php } else { ?>
    <div class="col-sm-12 mt-5 mb-5 text-center">
      <button type="button" class="btn btn-outline-dark" disabled>No Results</button>
    </div>
<?php }
} ?>