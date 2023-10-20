<?php
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] !== "POST") {
  echo "Request failed";
} else if (!empty($_POST['id'])) {
  $id = app::post('id', ["tags", "entities", "chars"]); 
  $request = DB::columns(["r.id", "ro.fare","ro.arrival","ro.departure","r.status","ro.created_at","ro.updated_at"]);
  $request = DB::columnsmore(["l.name","p.first_name as pfname","p.last_name plname"]);
  $request = DB::columnsmore(["d.first_name as dfname","d.last_name dlname"]);
  $request = DB::table("requests as r");
  $request = DB::join(["routes AS ro" => ["ro.id" => "r.route_id"]],"LEFT");
  $request = DB::join(["locations AS l" => ["l.id" => "ro.location_id"]],"LEFT");
  $request = DB::join(["users AS p" => ["p.id" => "r.user_id"]],"LEFT");
  $request = DB::join(["users AS d" => ["d.id" => "ro.user_id"]],"LEFT");
  $request = DB::where(["r.id" => $id]);
  $request = DB::execute();
  $request = DB::fetch("one");
  if ($request) { ?>
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
            <input type="hidden" value="<?php echo $request['id']; ?>" name="id"  required />
            <select class="custom-select font-12" id="driver" name="driver" disabled>
              <option><?php echo ucfirst($request["dfname"])." ".ucfirst($request["dlname"]) ; ?></option>
            </select>
          </div>
          <div class="form-group col-sm-6 mb-2">
            <label class="font-weight-bolder mb-0" for="passenger">Passenger</label>
            <select class="custom-select font-12" id="passenger" name="passenger" disabled>
              <option><?php echo ucfirst($request["pfname"])." ".ucfirst($request["plname"]) ; ?></option>
            </select>
          </div>
        <div class="form-group col-sm-4 mb-2">
          <label class="font-weight-bolder mb-0" for="fare">Fare (PKR)</label>
          <input class="form-control rounded font-12" id="fare" name="fare" value="<?php echo $request['fare']; ?>" type="text" disabled />
        </div>
        <div class="form-group col-sm-4 mb-2">
        <label class="font-weight-bolder mb-0" for="arrival">Arrival</label>
        <select name="arrival" id="arrival" class="custom-select font-12" disabled>
          <option value="<?php echo $request["arrival"];?>"><?php echo $request["arrival"];?></option>      
        </select>
        </div>
        <div class="form-group col-sm-4 mb-2">
        <label class="font-weight-bolder mb-0" for="departure">Departure</label>
        <select name="departure" id="departure" class="custom-select font-12" disabled>
          <option value="<?php echo $request["departure"];?>"><?php echo $request["departure"];?></option>      
        </select>
        </div>
          <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="status">Status</label>
          <select name="status" id="status" class="custom-select font-12">
            <optgroup label="Selected">
              <option value="<?php echo $request["status"];?>"> 
              <?php echo app::is_approved($request["status"]); ?>
              </option>
            </optgroup>
            <option value="0">Pending</option>
            <option value="1">Approved</option>
            <option value="2">Rejected</option>>
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