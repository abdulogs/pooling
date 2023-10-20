<?php
require_once "../../classes/database.php";

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
  if (!empty($_POST['id'])) {
  $id = app::post('id', ["tags", "entities", "chars"]); 
  $user = DB::columns(["first_name","last_name","avatar"]);
  $user = DB::table("users");
  $user = DB::where(["id" => $id]);
  $user = DB::execute();
  $user = DB::fetch("one");
  
  $sender_id = app::getSession("id");
  $receiver_id = $id;
  
  ?>
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header d-flex align-items-center align-middle p-2">
        <div class="media">
          <img src="admin/uploads/avatars/<?php echo $user["avatar"]; ?>" class="rounded-circle" width="40" height="40px" alt="">
          <div class="media-body ml-2">
            <h6 class="font-14 mt-1"><b><?php echo $user["first_name"]; ?> <?php echo $user["last_name"]; ?></b></h6>
            <!-- <p class="m-0">Driver</p> -->
          </div>
        </div>
        <button class="btn text-dark btn-sm ti-close" data-dismiss="modal"></button>
      </div>
      <div class="modal-body d-flex flex-column bg-light" id="messages" style="height:400px;">
        <?php 
         $messages = DB::columns(["message","sender_id","receiver_id","created_at"])::table("messages");
         $messages = DB::where(["sender_id" => $sender_id, "receiver_id" => $receiver_id]);
         $messages = DB::or(["sender_id" => $receiver_id, "receiver_id" => $sender_id]);
         $messages = DB::execute();
         $messages = DB::fetch("all"); ?>
          <?php if ($messages): ?>
          <?php foreach ($messages as $message): ?>
            <?php if ($message["sender_id"] == $sender_id && $message["receiver_id"] == $receiver_id):?>
              <div class="d-flex align-self-end">
                <p class="bg-dark text-white p-2 rounded shadow-sm d-inline-block">
                  <?php echo $message["message"];?>
                </p>
              </div>
            <?php elseif($message["sender_id"] == $receiver_id && $message["receiver_id"] == $sender_id): ?>         
              <div class="d-flex ">
                <p class="bg-white text-dark p-2 rounded shadow-sm d-inline-block">
                  <?php echo $message["message"];?>
                </p>
              </div>  
            <?php endif;?>
          <?php endforeach;?>
        <?php else:?>
        <p class="text-center">No messages</p>
        <?php endif; ?>
      </div>
      <form class="p-2 d-flex align-items-center align-content-center border-top" id="sendMessage">
        <input class="form-control shadow-sm border" type="text" placeholder="Write your message" id="message">
        <input type="hidden" id="receiver_id" value="<?php echo $receiver_id; ?>">
        <button class="btn btn-success btn-sm btn-submit ml-2" id="btn-submit" type="submit">Send</button>
      </form>
    </div>
<?php }} ?>

<script>
    const body = document.getElementById("messages");
    body.scrollTop = body.scrollHeight;
</script>