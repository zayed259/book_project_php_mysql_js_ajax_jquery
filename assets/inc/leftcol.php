<?php
require __DIR__ . "/../../vendor/autoload.php";
require "configuration.php";
$page = "All Books";
include 'assets/inc/header.php';
require "connection.php";

use App\CommonFx;

$count = 2;
$pages = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($pages - 1) * $count;


$sql = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` ORDER BY `bookposts`.`id` DESC, `bookposts`.`deleted` = null LIMIT $start, $count";

$result = $conn->query($sql);

$q = "SELECT COUNT(*) FROM `bookposts` WHERE `deleted` is null";
$qr = $conn->query($q);
$totalrec = $qr->fetch_row();
$totalrec = $totalrec[0];


$post = "";
while ($row = $result->fetch_assoc()) {
    $firstImage = explode(",", $row['images'])[0];
    $name = $row['name'];
    $author = $row['author_name'];
    $division = $row['division_name'];
    $district = $row['district_name'];
    $area = $row['area_name'];
    $id = $row['id'];

    //difference between two dates
    $date1 = $row['created'];
    // $timeago = HumanTime($date1);
    $timeago = CommonFx::HumanTime($date1);
    $post .= '<a href="details.php?id=' . $id . '" class="text-decoration-none">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-4">
                    <img src="assets/upload_images/' . $firstImage . '" class="img-fluid" alt="Book 1">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">' . $name . '</h5>
                        <p class="card-text">' . $author . '</p>
                        <p class="card-text">' . $area . ', ' . $district . ', ' . $division . '</p>
                        <p class="card-text"><small class="text-muted">Last updated: ' . $timeago . ' </small></p>
                    </div>
                </div>
            </div>
        </div>
    </a>';
}


//author list query
$author_sql = "SELECT `author`.`name` AS `author_name`, `author`.`id` AS `author_id`, count(*) as `total` FROM `bookposts`, `author` WHERE `bookposts`.`author_id` = `author`.`id` GROUP BY `author_id`";
$author_result = $conn->query($author_sql);
$author_list = "";
while ($author_row = $author_result->fetch_assoc()) {
    $author_name = $author_row['author_name'];
    $author_id = $author_row['author_id'];
    $total = $author_row['total'];
    $author_list .= '<div>
    <a href="all-products-sort.php?authid=' . $author_id . '" class="text-decoration-none">
        <div>
            <span><i class="fa-solid fa-user"></i></span>
            <span>' . $author_name . '</span>
            <span>(' . $total . ')</span>
        </div>
    </a>
    </div>';
}

//category list query
$category_sql = "SELECT `categories`.`name` AS `category_name`, `categories`.`id` AS `category_id`, count(*) as `total` FROM `bookposts`, `categories` WHERE `bookposts`.`category_id` = `categories`.`id` GROUP BY `category_id`";
$category_result = $conn->query($category_sql);
$category_list = "";
while ($category_row = $category_result->fetch_assoc()) {
    $category_name = $category_row['category_name'];
    $category_id = $category_row['category_id'];
    $total = $category_row['total'];
    $category_list .= '<div>
    <a href="all-products-sort.php?catid=' . $category_id . '" class="text-decoration-none">
        <div>
            <span><i class="fa-solid fa-list"></i></span>
            <span>' . $category_name . '</span>
            <span>(' . $total . ')</span>
        </div>
    </a>
    </div>';
}

//publications list query
$publication_sql = "SELECT `publications`.`name` AS `publication_name`, `publications`.`id` AS `publication_id`, count(*) as `total` FROM `bookposts`, `publications` WHERE `bookposts`.`publications_id` = `publications`.`id` GROUP BY `publication_id`";
$publication_result = $conn->query($publication_sql);
$publication_list = "";
while ($publication_row = $publication_result->fetch_assoc()) {
    $publication_name = $publication_row['publication_name'];
    $publication_id = $publication_row['publication_id'];
    $total = $publication_row['total'];
    $publication_list .= '<div>
    <a href="all-products-sort.php?publicid=' . $publication_id . '" class="text-decoration-none">
        <div>
            <span><i class="fa-solid fa-book"></i></span>
            <span>' . $publication_name . '</span>
            <span>(' . $total . ')</span>
        </div>
    </a>
    </div>';
}

//division list query
$division_sql = "SELECT  `division`.`id` AS `division_id` , `division`.`name` AS `division_name`, count(*) as `total` FROM `bookposts`, `division` WHERE `bookposts`.`division_id` = `division`.`id` GROUP BY bookposts.`division_id`";
$division_result = $conn->query($division_sql);
$division_list = "";
while ($division_row = $division_result->fetch_assoc()) {
    $division_name = $division_row['division_name'];
    $division_id = $division_row['division_id'];
    $total = $division_row['total'];
    $division_list .= '<div>
    <a href="all-products-sort.php?divid=' . $division_id . '" class="text-decoration-none">
        <div>
            <span><i class="fa-solid fa-map-marker-alt"></i></span>
            <span>' . $division_name . '</span>
            <span>(' . $total . ')</span>
        </div>
    </a>
    </div>';
}

//district list query
$district_sql = "SELECT `district`.`name` AS `district_name`, `district`.`id` AS `district_id`, count(*) as `total` FROM `bookposts`, `district` WHERE `bookposts`.`district_id` = `district`.`id` GROUP BY `district_id`";
$district_result = $conn->query($district_sql);
$district_list = "";
while ($district_row = $district_result->fetch_assoc()) {
    $district_name = $district_row['district_name'];
    $district_id = $district_row['district_id'];
    $total = $district_row['total'];
    $district_list .= '<div>
    <a href="all-products-sort.php?distid=' . $district_id . '" class="text-decoration-none">
        <div>
            <span><i class="fa-solid fa-map-marker-alt"></i></span>
            <span>' . $district_name . '</span>
            <span>(' . $total . ')</span>
        </div>
    </a>
    </div>';
}

//area list query
$area_sql = "SELECT `area`.`name` AS `area_name`, `area`.`id` AS `area_id`, count(*) as `total` FROM `bookposts`, `area` WHERE `bookposts`.`area_id` = `area`.`id` GROUP BY `area_id`";
$area_result = $conn->query($area_sql);
$area_list = "";
while ($area_row = $area_result->fetch_assoc()) {
    $area_name = $area_row['area_name'];
    $area_id = $area_row['area_id'];
    $total = $area_row['total'];
    $area_list .= '<div>
    <a href="all-products-sort.php?areaid=' . $area_id . '" class="text-decoration-none">
        <div>
            <span><i class="fa-solid fa-map-marker-alt"></i></span>
            <span>' . $area_name . '</span>
            <span>(' . $total . ')</span>
        </div>
    </a>
    </div>';
}

?>
<div class="container my-1">
    <div class="row">
        <div class="col-lg-6">

        </div>
        <div class="col-lg-6">
            <form>
                <div class="input-group position-end">
                    <input class="form-control me-2" type="search" placeholder="type here.." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                            Authors
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <?php echo $author_list ?? ""; ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Categories
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <?php echo $category_list ?? ""; ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Publications
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <?php echo $publication_list ?? ""; ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne2" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne2">
                            Division
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne2">
                        <div class="accordion-body">
                            <?php echo $division_list ?? ""; ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo2" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo2">
                            District
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo2">
                        <div class="accordion-body">
                            <?php echo $district_list ?? ""; ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree3" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree3">
                            Area
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree3" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree3">
                        <div class="accordion-body">
                            <?php echo $area_list ?? ""; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>