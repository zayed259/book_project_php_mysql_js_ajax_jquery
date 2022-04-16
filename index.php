<?php
require "configuration.php";
$page = "Home";
include "assets/inc/header.php";

require "connection.php";
//bookposts table and join with category table
$query = "SELECT `bookposts`.`id` AS `id`, `categories`.`name` AS `category_name`, `categories`.`id` AS `category_id`, count(*) as `total` FROM `bookposts`, `categories` WHERE `bookposts`.`category_id` = `categories`.`id` GROUP BY `category_id` ORDER BY `category_id` ASC";
$result = $conn->query($query);
//category
$html = '';
while ($row = $result->fetch_assoc()) {
    $name = $row['category_name'];
    $id = $row['category_id'];
    $total = $row['total'];
    $html .= '<div class="col-xl-3 col-sm-6 col-12 g-2">
                <a href="sub_category.php?category=' .  $id . '" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="align-self-center fs-1">
                                        <i class="fa-solid fa-book font-large-2 float-left"></i>
                                    </div>
                                    <div class="align-self-center ms-5">
                                        <h5 class="textOverflow" title="' . $name . '">' . substr($name, 0, 20) . '</h5>
                                        <span>' . $total . ' Books</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
}

// $query2 = "SELECT `category_id`, COUNT(*) AS `Total` FROM `bookposts` WHERE 1 GROUP BY `category_id`";
// $result2 = $conn->query($query2);


//select category_id, count(*) as total from bookposts where 1 group by `category_id`;

//recent posts
$sql = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE`bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` ORDER BY `id` DESC limit 10";
$recentresult = $conn->query($sql);
$recentpost = "";
while ($recentrow = $recentresult->fetch_assoc()) {
    $firstImage = explode(",", $recentrow['images'])[0];
    $name = $recentrow['name'];
    $price = $recentrow['price1'];
    $id = $recentrow['id'];

    $recentpost .= '<div class="item">
    <div class="sq_box shadow">
        <div class="pdis_img">
            <span class="wishlist">
                <a alt="Add to Wish List" title="Add to Wish List" href="javascript:void(0);"> <i class="fa fa-heart"></i></a>
            </span>
            <a href="details.php?id=' . $id . '">
                <img src="assets/upload_images/' . $firstImage . '">
            </a>
        </div>
        <h4 class="mb-1" title="' . $name . '"> <a href="details.php?id=' . $id . '"> ' . substr($recentrow['name'], 0, 20) . ' </a> </h4>
        <div class="price-box mb-2">
            <!-- <span class="price"> Price 200 </span> -->
            <span class="offer-price">Price ' . $price . ' </span>
        </div>
        <div class="btn-box text-center">
            <a class="btn btn-sm" href="details.php?id=' . $id . '"><i class="fa-solid fa-binoculars"></i> View Details </a>
        </div>
    </div>
</div>';
}




?>
<!-- carousel section -->
<div class="container-fluid py-2 carousel">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/Book1.png" class="d-block w-100" height="300px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/Book2.png" class="d-block w-100" height="300px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/book3.png" class="d-block w-100" height="300px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/Book4.png" class="d-block w-100" height="300px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/book5.png" class="d-block w-100" height="300px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/Book6.png" class="d-block w-100" height="300px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/book7.png" class="d-block w-100" height="300px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p> -->
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- carousel end -->

<!-- category start -->
<div class="grey-bg container-fluid mt-1">
    <div class="row">
        <div class="col-12 mb-1">
            <h4 class="text-uppercase">Categories</h4>
        </div>
    </div>
    <div class="row">
        <?php echo $html ?? ""; ?>
    </div>
</div>
<!-- category end -->

<!-- owl carousel start -->
<section class="sec bg-light">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 title_bx">
                <h3 class="title"> Recent Post </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 list-slider mt-4">
                <div class="owl-carousel common_wd  owl-theme" id="recent_post">
                    <?php echo $recentpost ?? ""; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- owl carousel end -->

<?php include "assets/inc/footer.php"; ?>
</body>

</html>