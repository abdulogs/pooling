<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] !== "POST") {
  echo "Request failed";
} elseif (empty($_POST['id'])) { ?>
  <form class="modal-content border-0 shadow-lg" method="post" id="create">
    <div class="modal-header d-flex align-items-center align-middle p-2">
      <h5 class="modal-title font-20 m-0">
        <b><span class="fa fa-plus-circle mr-2 font-20 text-success"></span>CREATE</b>
      </h5>
      <button class="btn btn-icon waves-effect waves-light text-dark btn-sm" data-dismiss="modal" aria-label="Close">
        <i class="fa fa-close"></i>
      </button>
    </div>
    <div class="modal-body">
      <div class="form-row">
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="fname">Firstname</label>
          <input class="form-control font-12" id="fname" name="fname" type="text"  required />
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="lname">Lastname</label>
          <input class="form-control font-12" id="lname" name="lname" type="text" required />
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="email">Email</label>
          <input class="form-control font-12" id="email" name="email" type="email" required />
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="password">Password</label>
          <input class="form-control font-12" id="password" name="password" type="password" required />
        </div>
        <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="phone">Phone</label>
          <input class="form-control font-12" id="phone" name="phone" type="text" />
        </div>
        <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="about">About</label>
          <input class="form-control font-12" id="about" name="about" type="text" />
        </div>
        <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="address">Address</label>
          <input class="form-control font-12" id="address" name="address" type="text" />
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="status">Status</label>
          <select name="status" id="status" class="custom-select  font-12">
            <option value="">Select</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="role">Role</label>
          <select name="role" id="role" class="custom-select  font-12">
            <option value="">Select</option>
            <option value="0">Passenger</option>
            <option value="1">Car driver</option>
            <option value="2">Admin</option>
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

  $user = DB::columns(["id", "first_name", "last_name", "email", "password", "about","status", "role","address","phone"]);
  $user = DB::table("users");
  $user = DB::where(["id" => $id]);
  $user = DB::execute();
  $user = DB::fetch("one");

  if ($user) { ?>
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
            <label class="font-weight-bolder mb-0" for="fname">Firstname</label>
            <input class="form-control font-12" id="fname" name="fname" type="text" value="<?php echo $user['first_name'] ?>" required />
            <input name="id" type="hidden" value="<?php echo $user['id']; ?>" />
          </div>
          <div class="form-group col-sm-6 mb-2">
            <label class="font-weight-bolder mb-0" for="lname">Lastname</label>
            <input class="form-control font-12" id="lname" name="lname" type="text" value="<?php echo $user['last_name'] ?>" required />
          </div>
          <div class="form-group col-sm-6 mb-2">
            <label class="font-weight-bolder mb-0" for="email">Email</label>
            <input class="form-control font-12" id="email" name="email" type="email" value="<?php echo $user['email'] ?>" required />
            <input name="oemail" type="hidden" value="<?php echo $user['email'] ?>" />
          </div>
          <div class="form-group col-sm-6 mb-2">
            <label class="font-weight-bolder mb-0" for="password">Password</label>
            <input class="form-control font-12" id="password" name="password" type="password" />
            <input name="opassword" type="hidden" value="<?php echo $user['password'] ?>" />
          </div>
        <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="phone">Phone</label>
          <input class="form-control font-12" id="phone" name="phone" value="<?php echo $user['phone'] ?>" type="text" />
        </div>
        <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="about">About</label>
          <input class="form-control font-12" id="about" name="about" value="<?php echo $user['about'] ?>" type="text" />
        </div>
        <div class="form-group col-sm-12 mb-2">
          <label class="font-weight-bolder mb-0" for="address">Address</label>
          <input class="form-control font-12" id="address" name="address" value="<?php echo $user['address'] ?>" type="text" />
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="status">Status</label>
          <select name="status" id="status" class="custom-select  font-12">
            <optgroup label="Select">
            <option value="<?php echo $user["status"];?>"> 
            <?php echo app::is_active($user["status"]);?>
            </option>
            </optgroup>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
        <div class="form-group col-sm-6 mb-2">
          <label class="font-weight-bolder mb-0" for="role">Role</label>
          <select name="role" id="role" class="custom-select  font-12">
            <optgroup label="Select">
            <option value="<?php echo $user["role"];?>"> 
             <?php echo app::is_role($user["role"]); ?>
            </option>
            </optgroup>
            <option value="0">Passenger</option>
            <option value="1">Car driver</option>
            <option value="2">Admin</option>
          </select>
        </div>
        </div>
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-light border btn-sm" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-success btn-sm btn-submit" id="btn-submit" type="submit">Proceed</button>
      </div>
    </form>
<?php }} ?>