<?php require_once "../classes/app.php"; ?>
<?php app::isLogout("id", "admin/index.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Requests</title>
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/admin.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">

<?php app::component("navigation"); ?>

    <div class="content-wrapper">
      <div class="container-fluid">
          <ol class="breadcrumb bg-transparent">
              <li class="breadcrumb-item">
                  <a href="dashboard.php">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Requests</li>
          </ol>
          <div class="card shadow p-0 bg-white">
          <div class="d-flex align-items-center px-3 py-2 border-bottom">
              <h4 class="m-0 font-20 align-middle">
                <i class="fa fa-user text-success"></i> Requests
              </h4>
            </div>
            <form class="px-2 py-1" id="filter">
              <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12  p-1">
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
                          <span class="input-group-text bg-white font-12">Sort</span>
                      </div>
                      <select id="sort" class="custom-select font-12">
                          <option value="recent">Recents</option>
                          <option value="oldest">Oldest</option>
                      </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-6 py-1">
                    <div class="input-group mb-0">
                      <div class="input-group-prepend" >
                          <span class="input-group-text font-12 bg-white">Records</span>
                      </div>
                      <select id="limit" class="custom-select font-12" >
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
                    <span class="fas fa-sliders-h"></span>
                    Filter
                  </button>
                </div>
              </div>
            </form>
            <table class="table table-card table-sm mb-0">
              <thead class="bg-light border-top">
                <tr>
                  <th class="px-3 border-0" scope="col">ID</th>
                  <th class="border-0" scope="col">Passenger</th>
                  <th class="border-0" scope="col">Driver</th>
                  <th class="border-0" scope="col">Location</th>
                  <th class="border-0" scope="col">Fare</th>
                  <th class="border-0" scope="col">Arrival</th>
                  <th class="border-0" scope="col">Departure</th>
                  <th class="border-0" scope="col">Status</th>
                  <th class="border-0" scope="col">Created at</th>
                  <th class="border-0" scope="col">Updated at</th>
                  <th class="px-3 border-0" scope="col">Controls</th>
                </tr>
              </thead>
              <tbody id="data" class="font-12"></tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalForm" data-keyboard="false" data-backdrop="static" aria-labelledby="create" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" id="form" role="Form"></div>
    </div>

    <?php app::component("footer"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/admin.js"></script>
    <script src="modules/requests/js/data.js"></script>
</body>

</html>
