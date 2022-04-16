<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['logged_in'])) {
  header("location: ../index.php");
}
if (isset($_SESSION['logged_in']) && $_SESSION['user_role'] != '2') {
  header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="../assets/css/dashboard.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Boikhujo.com</title>
</head>

<body>
  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="../index.php"><i class="fa-solid fa-book"></i><span class="ms-2">boikhujo.com</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavBar">
        <ul class="d-flex ms-auto navbar-nav navbar-align">
          <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
              <i class="align-middle" data-feather="settings"></i>
            </a>

            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
              <!-- <img src="assets/images/SZH_3113.jpg" height="30px" width="30px" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> -->
              <i class="fa-solid fa-user"></i>
              <span class="text-light"><?php if (isset($_SESSION['full_name'])) echo "{$_SESSION['full_name']}"; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
              <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
              <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../logout.php">Log out</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- top navigation bar -->
  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li>
            <a href="admin-dashboard.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-speedometer2"></i></span>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="my-2">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <div class="text-light small fw-bold text-uppercase px-3 mb-3">
              <span><i class="fa-solid fa-location-dot"></i></span>
              <span class="ms-2">Location</span>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" href="division-table.php">
              <span class="me-2"><i class="fa-solid fa-table"></i></span>
              <span>Division Table</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </span>
            </a>

            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts2">
              <span class="me-2"><i class="fa-solid fa-table"></i></span>
              <span>Division Table</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts2">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="add-division.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span>
                    <span>Add Division</span>
                  </a>
                </li>
                <li>
                  <a href="division-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-list"></i></span>
                    <span>Division List</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
              <span class="me-2"><i class="fa-solid fa-table"></i></span>
              <span>District Table</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="add-district.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span>
                    <span>Add District</span>
                  </a>
                </li>
                <li>
                  <a href="district-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-list"></i></span>
                    <span>District List</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts3">
              <span class="me-2"><i class="fa-solid fa-table"></i></span>
              <span>Area Table</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts3">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="add-area.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span>
                    <span>Add Area</span>
                  </a>
                </li>
                <li>
                  <a href="area-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-list"></i></span>
                    <span>Area List</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="my-2">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <div class="text-light small fw-bold text-uppercase px-3 mb-3">
              <span><i class="fa-solid fa-book"></i></span>
              <span class="ms-2">Categories</span>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts4">
              <span class="me-2"><i class="fa-solid fa-table"></i></span>
              <span>Author Table</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts4">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="add-author.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span>
                    <span>Add Author</span>
                  </a>
                </li>
                <li>
                  <a href="author-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-list"></i></span>
                    <span>Author List</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts5">
              <span class="me-2"><i class="fa-solid fa-table"></i></span>
              <span>Publications Table</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts5">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="add-publication.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span>
                    <span>Add Publication</span>
                  </a>
                </li>
                <li>
                  <a href="publication-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-list"></i></span>
                    <span>Publications List</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts6">
              <span class="me-2"><i class="fa-solid fa-table"></i></span>
              <span>Catagories Table</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts6">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="add-category.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span>
                    <span>Add Catagory</span>
                  </a>
                </li>
                <li>
                  <a href="categories-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-list"></i></span>
                    <span>Catagories List</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts8">
              <span class="me-2"><i class="fa-solid fa-table"></i></span>
              <span>Subcatagories Table</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts8">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="add-subcategory.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span>
                    <span>Add Subcatagory</span>
                  </a>
                </li>
                <li>
                  <a href="subcategories-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-list"></i></span>
                    <span>Subcatagories List</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="my-2">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <div class="text-light small fw-bold text-uppercase px-3 mb-3">
              <span><i class="fa-solid fa-user-group"></i></span>
              <span class="ms-2">Users</span>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts7">
              <span class="me-2"><i class="fa-solid fa-table"></i></span>
              <span>Users Table</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts7">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="add-user.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span>
                    <span>Add User</span>
                  </a>
                </li>
                <li>
                  <a href="users-list.php" class="nav-link px-3">
                    <span class="me-2"><i class="fa-solid fa-list"></i></span>
                    <span>Users List</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="my-2">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <div class="text-light small fw-bold text-uppercase px-3 mb-3">
              <span><i class="fa-solid fa-user-group"></i></span>
              <span class="ms-2">Others</span>
            </div>
          </li>
          <li>
            <a href="#" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-book-fill"></i></span>
              <span>Pages</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
              Addons
            </div>
          </li>
          <li>
            <a href="#" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-graph-up"></i></span>
              <span>Charts</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-table"></i></span>
              <span>Tables</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- offcanvas -->