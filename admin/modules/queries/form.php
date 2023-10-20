<?php
require_once "../../../classes/app.php";
require_once "../../../classes/database.php";

if (!isset($_POST) and $_SERVER['REQUEST_METHOD'] !== "POST") {
  echo "Request failed";
} else if (!empty($_POST['id'])) {
  $id = app::post('id', ["tags", "entities", "chars"]); 
  $query = DB::columns(["id", "email","message"]);
  $query = DB::table("queries");
  $query = DB::where(["id" => $id]);
  $query = DB::execute();
  $query = DB::fetch("one");

  if ($query) { ?>
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
            <label class="font-weight-bolder mb-0" for="name">Subject</label>
            <input class="form-control font-12" type="text" name="name" id="name" />
            <input type="hidden" value="<?php echo $query['id']; ?>" name="id"  required />
          </div>
          <div class="form-group col-sm-6 mb-2">
            <label class="font-weight-bolder mb-0" for="email">Email</label>
            <input class="form-control font-12" type="text" name="email" id="email" value="<?php echo $query['email']; ?>" />
          </div>
          <div class="form-group col-sm-12 mb-2">
            <label class="font-weight-bolder mb-0" for="query">Query</label>
            <textarea class="form-control font-12" disabled rows="4" id="query"><?php echo $query['message']; ?></textarea>
          </div>
          <div class="form-group col-sm-12 mb-2">
            <label class="font-weight-bolder mb-0" for="message">Send message</label>
            <textarea class="form-control font-12" name="message" id="message" rows="4"></textarea>
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