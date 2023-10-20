<?php app::sessionRoleRedirect("role", 2, "403.php"); ?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand p-2" href="index.php">
        <b><span class="text-success">E</span>library</b>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="users.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
                <a class="nav-link" href="users.php">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Users</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Routes">
                <a class="nav-link" href="routes.php">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Routes</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Locations">
                <a class="nav-link" href="locations.php">
                    <i class="fa fa-fw fa-map"></i>
                    <span class="nav-link-text">Locations</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Vehicles">
                <a class="nav-link" href="vehicles.php">
                    <i class="fa fa-fw fa-car"></i>
                    <span class="nav-link-text">Vehicles</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Requests">
                <a class="nav-link" href="requests.php">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">Requests</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Queries">
                <a class="nav-link" href="queries.php">
                    <i class="fa fa-fw fa-info"></i>
                    <span class="nav-link-text">Queries</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
                <a class="nav-link" href="profile.php">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">Profile</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="../index.php">
                    <i class="fa fa-fw fa-globe"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" data-toggle="modal" data-target="#logout">
                    <i class="fa fa-fw fa-sign-out"></i>Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- /Navigation-->