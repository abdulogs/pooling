<?php require_once "./classes/database.php"; ?>

<!Doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>
  <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/stylesheet.css">
  <link rel="stylesheet" href="./assets/css/form.css">
  <link rel="stylesheet" href="./assets/libs/themify/themify-icons.css">

</head>

<body class="d-flex flex-column bg-light">
  <?php app::component("navbar"); ?>


  <main class="container h-100">
    <div class="container-fluid">
      <ol class="breadcrumb bg-transparent">
        <li class="breadcrumb-item">
          <a href="index.php" class="text-success">Home</a>
        </li>
        <li class="breadcrumb-item active">Messages</li>
      </ol>
      <div class="card shadow p-0 bg-white">
        <div class="d-flex align-items-center px-3 py-2 border-bottom">
          <h4 class="m-0 font-20 align-middle">
            <i class="ti-comment text-success"></i> Messages
          </h4>
        </div>
        <form class="px-2 py-1" id="filter">
          <div class="form-row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-12  p-1">
              <div class="input-group mb-0">
                <div class="input-group-prepend">
                  <span class="input-group-text  bg-white font-12">Search</span>
                </div>
                <input type="text" class="form-control font-12" id="search" placeholder="Search...">
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-6 py-1">
              <div class="input-group mb-0">
                <div class="input-group-prepend">
                  <span class="input-group-text font-12 bg-white">Records</span>
                </div>
                <select id="limit" class="custom-select font-12">
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="20">20</option>
                  <option value="30">30</option>
                  <option value="40">40</option>
                  <option value="60">60</option>
                  <option value="70">70</option>
                  <option value="80">80</option>
                  <option value="90">90</option>
                  <option value="100">100</option>
                  <option value="all">All</option>
                </select>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-12 py-1">
              <button type="submit" class="btn font-12 btn-outline-dark rounded btn-block filter-btn">
                <span class="ti-sliders"></span>
                Filter
              </button>
            </div>
          </div>
        </form>
        <table class="table table-card table-sm mb-0">
          <thead class="bg-light border-top">
            <tr>
              <?php  if ($_SESSION["role"] == 1): ?>
              <th class="px-3 border-0" scope="col">Passenger</th>
              <?php else: ?>
              <th class="px-3 border-0" scope="col">Driver</th>
              <?php endif; ?>
              <th class="border-0" scope="col">Message</th>
              <th class="border-0" scope="col">Created at</th>
              <th class="px-3 border-0" scope="col">Controls</th>
            </tr>
          </thead>
          <tbody id="data" class="font-12"></tbody>
        </table>
      </div>
    </div>
  </main>

  <div class="modal fade" id="modalForm" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" id="form" role="Form"></div>
  </div>

  <?php app::component("footer"); ?>

  <script src="./modules/messages/js/data.js"></script>
  <script src="./modules/messages/js/message.js"></script>

</body>

</html>