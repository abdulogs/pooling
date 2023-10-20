<?php
require_once "../../classes/database.php";

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){

  $locations = DB::columns(["id","name"]);
  $locations = DB::table("locations");
  $locations = DB::execute();
  $locations = DB::fetch("all");

  if (empty($_POST['id'])) { ?>

  <form class="modal-content border-0 shadow-lg" method="post" id="create">
    <div class="modal-header d-flex align-items-center align-middle p-2">
      <h5 class="modal-title m-0">
          <b><span class="ti-plus mr-2 text-success"></span>CREATE</b>
      </h5>
      <button class="btn text-dark btn-sm ti-close" data-dismiss="modal"></button>
    </div>
    <div class="modal-body">
      <div class="form-row">
      <div class="form-group col-sm-6 mb-2">
      <label class="font-weight-bolder mb-0" for="location">Location</label>
        <select class="custom-select font-12" id="location" name="location" required>
          <option value="">Select</option>
          <?php foreach ($locations as $opt): ?>
            <option value="<?php echo $opt["id"]; ?>"><?php echo $opt["name"]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="fare">Fare (PKR)</label>
          <input class="form-control bg-white rounded font-12" id="fare" name="fare" type="text" required />
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="arrival">Arrival</label>
          <select name="arrival" id="arrival" class="custom-select  font-12">
            <option value="12:00 AM">12:00 AM</option>
            <option value="12:30 AM">12:30 AM</option>
            <option value="12:00 AM">1:00 AM</option>
            <option value="12:30 AM">1:30 AM</option>
            <option value="12:00 AM">2:00 AM</option>
            <option value="12:30 AM">2:30 AM</option>
            <option value="12:00 AM">3:00 AM</option>
            <option value="12:30 AM">3:30 AM</option>
            <option value="12:00 AM">4:00 AM</option>
            <option value="12:30 AM">4:30 AM</option>
            <option value="12:00 AM">5:00 AM</option>
            <option value="12:30 AM">5:30 AM</option>
            <option value="12:00 AM">6:00 AM</option>
            <option value="12:30 AM">6:30 AM</option>
            <option value="12:00 AM">7:00 AM</option>
            <option value="12:30 AM">7:30 AM</option>
            <option value="12:00 AM">8:00 AM</option>
            <option value="12:30 AM">8:30 AM</option>
            <option value="12:00 AM">9:00 AM</option>
            <option value="12:30 AM">9:30 AM</option>
            <option value="12:00 AM">10:00 AM</option>
            <option value="12:30 AM">10:30 AM</option>
            <option value="12:00 AM">11:00 AM</option>
            <option value="12:30 AM">11:30 AM</option>
            <option value="12:00 AM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="12:00 PM">1:00 PM</option>
            <option value="12:30 PM">1:30 PM</option>
            <option value="12:00 PM">2:00 PM</option>
            <option value="12:30 PM">2:30 PM</option>
            <option value="12:00 PM">3:00 PM</option>
            <option value="12:30 PM">3:30 PM</option>
            <option value="12:00 PM">4:00 PM</option>
            <option value="12:30 PM">4:30 PM</option>
            <option value="12:00 PM">5:00 PM</option>
            <option value="12:30 PM">5:30 PM</option>
            <option value="12:00 PM">6:00 PM</option>
            <option value="12:30 PM">6:30 PM</option>
            <option value="12:00 PM">7:00 PM</option>
            <option value="12:30 PM">7:30 PM</option>
            <option value="12:00 PM">8:00 PM</option>
            <option value="12:30 PM">8:30 PM</option>
            <option value="12:00 PM">9:00 PM</option>
            <option value="12:30 PM">9:30 PM</option>
            <option value="12:00 PM">10:00 PM</option>
            <option value="12:30 PM">10:30 PM</option>
            <option value="12:00 PM">11:00 PM</option>
            <option value="12:30 PM">11:30 PM</option>
          </select>
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="departure">Departure</label>
          <select name="departure" id="departure" class="custom-select  font-12">
            <option value="12:00 AM">12:00 AM</option>
            <option value="12:30 AM">12:30 AM</option>
            <option value="12:00 AM">1:00 AM</option>
            <option value="12:30 AM">1:30 AM</option>
            <option value="12:00 AM">2:00 AM</option>
            <option value="12:30 AM">2:30 AM</option>
            <option value="12:00 AM">3:00 AM</option>
            <option value="12:30 AM">3:30 AM</option>
            <option value="12:00 AM">4:00 AM</option>
            <option value="12:30 AM">4:30 AM</option>
            <option value="12:00 AM">5:00 AM</option>
            <option value="12:30 AM">5:30 AM</option>
            <option value="12:00 AM">6:00 AM</option>
            <option value="12:30 AM">6:30 AM</option>
            <option value="12:00 AM">7:00 AM</option>
            <option value="12:30 AM">7:30 AM</option>
            <option value="12:00 AM">8:00 AM</option>
            <option value="12:30 AM">8:30 AM</option>
            <option value="12:00 AM">9:00 AM</option>
            <option value="12:30 AM">9:30 AM</option>
            <option value="12:00 AM">10:00 AM</option>
            <option value="12:30 AM">10:30 AM</option>
            <option value="12:00 AM">11:00 AM</option>
            <option value="12:30 AM">11:30 AM</option>
            <option value="12:00 AM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="12:00 PM">1:00 PM</option>
            <option value="12:30 PM">1:30 PM</option>
            <option value="12:00 PM">2:00 PM</option>
            <option value="12:30 PM">2:30 PM</option>
            <option value="12:00 PM">3:00 PM</option>
            <option value="12:30 PM">3:30 PM</option>
            <option value="12:00 PM">4:00 PM</option>
            <option value="12:30 PM">4:30 PM</option>
            <option value="12:00 PM">5:00 PM</option>
            <option value="12:30 PM">5:30 PM</option>
            <option value="12:00 PM">6:00 PM</option>
            <option value="12:30 PM">6:30 PM</option>
            <option value="12:00 PM">7:00 PM</option>
            <option value="12:30 PM">7:30 PM</option>
            <option value="12:00 PM">8:00 PM</option>
            <option value="12:30 PM">8:30 PM</option>
            <option value="12:00 PM">9:00 PM</option>
            <option value="12:30 PM">9:30 PM</option>
            <option value="12:00 PM">10:00 PM</option>
            <option value="12:30 PM">10:30 PM</option>
            <option value="12:00 PM">11:00 PM</option>
            <option value="12:30 PM">11:30 PM</option>
          </select>
        </div>
        <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="status">Status</label>
          <select name="status" id="status" class="custom-select  font-12">
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
<?php } ?>


<?php
if (!empty($_POST['id'])) {
  $id = app::post('id', ["tags", "entities", "chars"]); 
  $route = DB::columns(["id","location_id","departure","arrival","fare","status"]);
  $route = DB::table("routes");
  $route = DB::where(["id" => $id]);
  $route = DB::execute();
  $route = DB::fetch("one");

  if ($route) { ?>
    <form class="modal-content border-0 shadow-lg" id="update">
      <div class="modal-header d-flex align-items-center align-middle p-2">
        <h5 class="modal-title m-0">
          <b><span class="ti-pencil mr-2 text-success"></span>UPDATE</b>
        </h5>
        <button class="btn text-dark btn-sm ti-close" data-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="location">Location</label>
          <input type="hidden" value="<?php echo $route['id']; ?>" name="id"  required />
          <select class="custom-select font-12" id="location" name="location" required>
            <option value="">Select</option>
            <?php foreach ($locations as $opt): ?>
              <option value="<?php echo $opt["id"]; ?>" <?php echo ($opt["id"] == $route["location_id"]) ? "selected" : "" ; ?>>
                <?php echo $opt["name"]; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="fare">Fare (PKR)</label>
          <input class="form-control bg-white rounded font-12" id="fare" name="fare" value="<?php echo $route['fare']; ?>" type="text" required />
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="arrival">Arrival</label>
          <select name="arrival" id="arrival" class="custom-select  font-12">
            <optgroup label="Selected">
              <option value="<?php echo $route["arrival"];?>"><?php echo $route["arrival"];?></option>
            </optgroup>
            <option value="12:00 AM">12:00 AM</option>
            <option value="12:30 AM">12:30 AM</option>
            <option value="12:00 AM">1:00 AM</option>
            <option value="12:30 AM">1:30 AM</option>
            <option value="12:00 AM">2:00 AM</option>
            <option value="12:30 AM">2:30 AM</option>
            <option value="12:00 AM">3:00 AM</option>
            <option value="12:30 AM">3:30 AM</option>
            <option value="12:00 AM">4:00 AM</option>
            <option value="12:30 AM">4:30 AM</option>
            <option value="12:00 AM">5:00 AM</option>
            <option value="12:30 AM">5:30 AM</option>
            <option value="12:00 AM">6:00 AM</option>
            <option value="12:30 AM">6:30 AM</option>
            <option value="12:00 AM">7:00 AM</option>
            <option value="12:30 AM">7:30 AM</option>
            <option value="12:00 AM">8:00 AM</option>
            <option value="12:30 AM">8:30 AM</option>
            <option value="12:00 AM">9:00 AM</option>
            <option value="12:30 AM">9:30 AM</option>
            <option value="12:00 AM">10:00 AM</option>
            <option value="12:30 AM">10:30 AM</option>
            <option value="12:00 AM">11:00 AM</option>
            <option value="12:30 AM">11:30 AM</option>
            <option value="12:00 AM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="12:00 PM">1:00 PM</option>
            <option value="12:30 PM">1:30 PM</option>
            <option value="12:00 PM">2:00 PM</option>
            <option value="12:30 PM">2:30 PM</option>
            <option value="12:00 PM">3:00 PM</option>
            <option value="12:30 PM">3:30 PM</option>
            <option value="12:00 PM">4:00 PM</option>
            <option value="12:30 PM">4:30 PM</option>
            <option value="12:00 PM">5:00 PM</option>
            <option value="12:30 PM">5:30 PM</option>
            <option value="12:00 PM">6:00 PM</option>
            <option value="12:30 PM">6:30 PM</option>
            <option value="12:00 PM">7:00 PM</option>
            <option value="12:30 PM">7:30 PM</option>
            <option value="12:00 PM">8:00 PM</option>
            <option value="12:30 PM">8:30 PM</option>
            <option value="12:00 PM">9:00 PM</option>
            <option value="12:30 PM">9:30 PM</option>
            <option value="12:00 PM">10:00 PM</option>
            <option value="12:30 PM">10:30 PM</option>
            <option value="12:00 PM">11:00 PM</option>
            <option value="12:30 PM">11:30 PM</option>
          </select>
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="departure">Departure</label>
          <select name="departure" id="departure" class="custom-select  font-12">
            <optgroup label="Selected">
              <option value="<?php echo $route["departure"];?>"><?php echo $route["departure"];?></option>
            </optgroup>
            <option value="12:00 AM">12:00 AM</option>
            <option value="12:30 AM">12:30 AM</option>
            <option value="12:00 AM">1:00 AM</option>
            <option value="12:30 AM">1:30 AM</option>
            <option value="12:00 AM">2:00 AM</option>
            <option value="12:30 AM">2:30 AM</option>
            <option value="12:00 AM">3:00 AM</option>
            <option value="12:30 AM">3:30 AM</option>
            <option value="12:00 AM">4:00 AM</option>
            <option value="12:30 AM">4:30 AM</option>
            <option value="12:00 AM">5:00 AM</option>
            <option value="12:30 AM">5:30 AM</option>
            <option value="12:00 AM">6:00 AM</option>
            <option value="12:30 AM">6:30 AM</option>
            <option value="12:00 AM">7:00 AM</option>
            <option value="12:30 AM">7:30 AM</option>
            <option value="12:00 AM">8:00 AM</option>
            <option value="12:30 AM">8:30 AM</option>
            <option value="12:00 AM">9:00 AM</option>
            <option value="12:30 AM">9:30 AM</option>
            <option value="12:00 AM">10:00 AM</option>
            <option value="12:30 AM">10:30 AM</option>
            <option value="12:00 AM">11:00 AM</option>
            <option value="12:30 AM">11:30 AM</option>
            <option value="12:00 AM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="12:00 PM">1:00 PM</option>
            <option value="12:30 PM">1:30 PM</option>
            <option value="12:00 PM">2:00 PM</option>
            <option value="12:30 PM">2:30 PM</option>
            <option value="12:00 PM">3:00 PM</option>
            <option value="12:30 PM">3:30 PM</option>
            <option value="12:00 PM">4:00 PM</option>
            <option value="12:30 PM">4:30 PM</option>
            <option value="12:00 PM">5:00 PM</option>
            <option value="12:30 PM">5:30 PM</option>
            <option value="12:00 PM">6:00 PM</option>
            <option value="12:30 PM">6:30 PM</option>
            <option value="12:00 PM">7:00 PM</option>
            <option value="12:30 PM">7:30 PM</option>
            <option value="12:00 PM">8:00 PM</option>
            <option value="12:30 PM">8:30 PM</option>
            <option value="12:00 PM">9:00 PM</option>
            <option value="12:30 PM">9:30 PM</option>
            <option value="12:00 PM">10:00 PM</option>
            <option value="12:30 PM">10:30 PM</option>
            <option value="12:00 PM">11:00 PM</option>
            <option value="12:30 PM">11:30 PM</option>
          </select>
        </div>
          <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="status">Status</label>
          <select name="status" id="status" class="custom-select  font-12">
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
<?php }}} ?>