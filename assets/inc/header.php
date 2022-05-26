<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page) ? $site . " | " . $page : $site; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/colors.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.extened.css"> -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <style>
        .bookimage img:hover {
            transform: scale(1.1);
        }

        img.img-fluid {
            height: 200px;
            overflow: hidden;
            transition: all 0.2s;
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="assets/images/white-logo.png" alt="logo" height="55px" width="130px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="all-products.php">All Books</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <div class="input-group searchBar">
                        <input class="form-control" type="search" placeholder="type here.." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link border rounded ms-lg-4" role="button" aria-current="page" href="post.php">Post Your Ad</a>
                    </li>
                    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if (isset($_SESSION['full_name'])) echo "{$_SESSION['full_name']}"; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="
                            <?php
                                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == '1') {
                                    echo "users/my-profile.php";
                                } else {
                                    echo "admin/admin-dashboard.php";
                                }
                            ?>
                            ">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li class="nav-item login">
                        <a class="nav-link ms-lg-2" aria-current="page" href="login.php"><i class="fa-solid fa-user"></i> Login</a>
                    </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>