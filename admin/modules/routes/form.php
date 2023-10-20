<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] !== "POST") {
  echo "Request failed";
} else if (!empty($_POST['id'])) {
  $id = app::post('id', ["tags", "entities", "chars"]); 
  $route = DB::columns(["r.id", "r.fare","r.arrival","r.departure","r.status","r.created_at","r.updated_at"]);
  $route = DB::columnsmore(["l.name","u.first_name","u.last_name","v.type","v.model","v.color","v.brand"]);
  $route = DB::table("routes as r");
  $route = DB::join(["locations AS l" => ["l.id" => "r.location_id"]],"LEFT");
  $route = DB::join(["users AS u" => ["u.id" => "r.user_id"]],"LEFT");
  $route = DB::join(["vehicles AS v" => ["v.id" => "r.vehicle_id"]],"LEFT");
  $route = DB::where(["r.id" => $id]);
  $route = DB::execute();
  $route = DB::fetch("one");

  if ($route) { ?>
    <form class="modal-content border-0 shadow-lg" id="update">
      <div class="modal-header d-flex align-items-center align-middle p-2">
        <h5 class="modal-title font-20 m-0">
          <b><span class="fa fa-plus-circle mr-2 font-20 text-success"></span>UPDATE</b>
        </h5>
        <button class="btn btn-icon waves-effect waves-light text-dark btn-sm" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
      
          <div class="form-group col-sm-6 mb-2">
            <label class="font-weight-bolder mb-0" for="driver">Driver</label>
            <select class="custom-select font-12" id="driver" name="driver" disabled>
              <option><?php echo ucfirst($route["first_name"]). " ". ucfirst($route["last_name"]); ?></option>
            </select>
          </div>
          <div class="form-group col-sm-6 mb-2">
            <label class="font-weight-bolder mb-0" for="location">Location</label>
            <input type="hidden" value="<?php echo $route['id']; ?>" name="id"  required />
            <select class="custom-select font-12" id="location" name="location" disabled>
              <option><?php echo ucfirst($route["name"]); ?></option>
            </select>
          </div>
        <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="vehicle">Vehicle</label>
          <input class="form-control rounded font-12" id="vehicle" name="vehicle" value=" <?php echo $route["type"].", ".$route["color"].", ".$route["brand"].", ".$route["model"]; ?>" type="text" disabled />
        </div>
        <div class="form-group col-sm-4 mb-2">
          <label class="font-weight-bolder mb-0" for="fare">Fare (PKR)</label>
          <input class="form-control rounded font-12" id="fare" name="fare" value="<?php echo $route['fare']; ?>" type="text" disabled />
        </div>
        <div class="form-group col-sm-4 mb-2">
        <label class="font-weight-bolder mb-0" for="arrival">Arrival</label>
        <select name="arrival" id="arrival" class="custom-select font-12" disabled>
          <option value="<?php echo $route["arrival"];?>"><?php echo $route["arrival"];?></option>      
        </select>
        </div>
        <div class="form-group col-sm-4 mb-2">
        <label class="font-weight-bolder mb-0" for="departure">Departure</label>
        <select name="departure" id="departure" class="custom-select font-12" disabled>
          <option value="<?php echo $route["departure"];?>"><?php echo $route["departure"];?></option>      
        </select>
        </div>
          <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="status">Status</label>
          <select name="status" id="status" class="custom-select font-12">
            <optgroup label="Select">
              <option value="<?php echo $route["status"];?>"> 
                <?php echo app::is_active($route["status"]);?>
              </option>
            </optgroup>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-light border btn-sm" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-success btn-sm btn-submit" id="btn-submit" type="submit">Proceed</button>
      </div>
    </form>
<?php }
} ?>