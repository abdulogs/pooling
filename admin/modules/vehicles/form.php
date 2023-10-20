<?php
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] !== "POST") {
  echo "Request failed";
} else if (!empty($_POST['id'])) {
  $id = app::post('id', ["tags", "entities", "chars"]); 
  $vehicle = DB::columns(["v.id", "v.brand","v.color","v.seats", "v.model","v.status"]);
  $vehicle = DB::columnsmore(["u.first_name","u.last_name","v.reg_number","v.type"]);
  $vehicle = DB::table("vehicles as v");
  $vehicle = DB::join(["users AS u" => ["u.id" => "v.user_id"]],"LEFT");
  $vehicle = DB::where(["v.id" => $id]);
  $vehicle = DB::execute();
  $vehicle = DB::fetch("one");

  if ($vehicle) { ?>
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
            <input type="hidden" value="<?php echo $vehicle['id']; ?>" name="id"  required />
            <select class="custom-select font-12" id="driver" name="driver" disabled>
              <option><?php echo ucfirst($vehicle["first_name"]). " ". ucfirst($vehicle["last_name"]); ?></option>
            </select>
          </div>
          <div class="form-group col-sm-6 mb-2">
            <label class="font-weight-bolder mb-0" for="reg_number">Reg number</label>
            <input class="form-control rounded font-12" id="reg_number" name="reg_number" value="<?php echo $vehicle['reg_number']; ?>" type="text" disabled />
          </div>
          <div class="form-group col-sm-12 mb-2">
            <label class="font-weight-bolder mb-0" for="vehicle">Vehicle</label>
            <input class="form-control rounded font-12" id="vehicle" name="vehicle" value=" <?php echo $vehicle["type"].", ".$vehicle["color"].", ".$vehicle["brand"].", ".$vehicle["model"]; ?>" type="text" disabled />
          </div>

          <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="status">Status</label>
          <select name="status" id="status" class="custom-select font-12">
            <optgroup label="Selected">
              <option value="<?php echo $vehicle["status"];?>"> 
                <?php echo app::is_active($vehicle["status"]);?>
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