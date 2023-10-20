<?php require_once "./classes/database.php"; ?>
<?php  
  $locations = DB::columns(["id","name"]);
  $locations = DB::table("locations");
  $locations = DB::execute();
  $locations = DB::fetch("all");
?>


<!Doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/stylesheet.css">
  <link rel="stylesheet" href="./assets/css/form.css">
  <link rel="stylesheet" href="./assets/libs/themify/themify-icons.css">

</head>

<body class="d-flex flex-column bg-light">
  <?php app::component("navbar"); ?>
  <main class="container">
    <div class="text-center">
      <h1><b>Vehicles</b></h1>
      <p>Search vehicles</p>
    </div>
    <form  id="filter" class="mb-5">
      <div class="row align-items-center">
      <div class="form-group col-lg-4 col-md-4 col-sm-6 col-6">
      <label class="font-weight-bolder mb-0" for="location">Location</label>
        <select class="custom-select font-12" id="location" name="location" required>
          <option value="">Select</option>
          <?php foreach ($locations as $opt): ?>
            <option value="<?php echo $opt["id"]; ?>"><?php echo ucfirst($opt["name"]); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-6">
          <label class="font-weight-bolder mb-0" for="arrival">Arrival</label>
          <select name="arrival" id="arrival" class="custom-select  font-12" required>
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
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-6">
          <label class="font-weight-bolder mb-0" for="departure">Departure</label>
          <select name="departure" id="departure" class="custom-select  font-12" required>
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
        <div class="col-lg-2 col-md-2 col-sm-2 col-12 py-1">
          <button type="submit" class="btn font-12 btn-outline-dark rounded btn-block filter-btn">
            <span class="fas fa-sliders-h"></span>
            Filter
          </button>
        </div>
      </div>
    </form>
    <div class="row" id="data"></div>
  </main>

  <div class="modal fade" id="modalForm" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" id="form" role="Form"></div>
  </div>


  <?php app::component("footer"); ?>

  <script src="./modules/vehicles/js/data.js"></script>
  <script src="./modules/messages/js/message.js"></script>

</body>

</html>