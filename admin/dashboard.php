<?php require_once "../classes/database.php"; ?>

<?php app::isLogout("id", "admin/index.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title>Dashboard</title>
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
        <li class="breadcrumb-item active">Home</li>
      </ol>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"><i class="fa fa-fw fa-users"></i></div>
              <div class="mr-5">
                <?php
                $Users = DB::count("id", "id")::table("users")::execute();
                $Users = DB::fetch("one"); ?>
                <h3 class="text-white m-0">
                  <?php echo $Users["id"]; ?>
                  <small class="font-12">Users</small>
                </h3>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="users.php">
              <span class="float-left">View Details</span>
              <span class="float-right"><i class="fa fa-angle-right"></i></span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"><i class="fa fa-fw fa-car"></i></div>
              <div class="mr-5">
                <?php
                $vehicle = DB::count("id", "id")::table("vehicles")::execute();
                $vehicle = DB::fetch("one"); ?>
                <h3 class="text-white m-0">
                  <?php echo $vehicle["id"]; ?>
                  <small class="font-12">Vehicles</small>
                </h3>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="vehicles.php">
              <span class="float-left">View Details</span>
              <span class="float-right"><i class="fa fa-angle-right"></i></span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"><i class="fa fa-fw fa-info"></i></div>
              <div class="mr-5">
                <?php
                $queries = DB::count("id", "id")::table("queries")::execute();
                $queries = DB::fetch("one"); ?>
                <h3 class="text-white m-0">
                  <?php echo $queries["id"]; ?>
                  <small class="font-12">Queries</small>
                </h3>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="queries.php">
              <span class="float-left">View Details</span>
              <span class="float-right"><i class="fa fa-angle-right"></i></span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"><i class="fa fa-fw fa-plus"></i></div>
              <div class="mr-5">
                <?php
                $requests = DB::count("id", "id")::table("requests")::execute();
                $requests = DB::fetch("one"); ?>
                <h3 class="text-white m-0">
                  <?php echo $requests["id"]; ?>
                  <small class="font-12">Requests</small>
                </h3>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="requests.php">
              <span class="float-left">View Details</span>
              <span class="float-right"><i class="fa fa-angle-right"></i></span>
            </a>
          </div>
        </div>
      </div>

      <div class="card shadow p-0 bg-white">
        <div class="d-flex align-items-center p-3 border-bottom">
          <h4 class="m-0 font-20 align-middle">
            <i class="fa fa-book text-success"></i> Books
          </h4>
          <button class="btn btn-success font-12 rounded ml-auto createBtn" type="button" data-toggle="modal"
            data-target="#modalForm">
            <span class="fa fa-plus-circle"></span> Create
          </button>
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
              <th class="border-0" scope="col">Name</th>
              <th class="border-0" scope="col">Edition</th>
              <th class="border-0" scope="col">Price</th>
              <th class="border-0" scope="col">Category</th>
              <th class="border-0" scope="col">Sub category</th>
              <th class="border-0" scope="col">Author</th>
              <th class="border-0" scope="col">Publisher</th>
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
  <!-- /.container-fluid-->
  </div>

  <div class="modal fade" id="modalForm" data-keyboard="false" data-backdrop="static" aria-labelledby="create"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" id="form" role="Form"></div>
  </div>

  <?php app::component("footer"); ?>
</body>

</html>