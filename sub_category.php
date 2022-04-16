<?php
require "configuration.php";
$page = "Category";
include 'assets/inc/header.php';

require "connection.php";
if (isset($_GET['category'])) {
  $cid = $conn->escape_string($_GET['category']);
  $query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name`, `categories`.`name` AS `category_name`, `subcategories`.`name` AS `subcategory_name`, `users`.`mobile` AS `users_number`, `publications`.`name` AS `publications_name`, count(*) as `total`  FROM `bookposts`, `author`, `division`, `district`, `area`, `categories`, `subcategories`, `users`, `publications` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `bookposts`.`category_id` = `categories`.`id` AND `bookposts`.`subcategory_id` = `subcategories`.`id` AND `bookposts`.`user_id` = `users`.`id` AND `bookposts`.`publications_id` = `publications`.`id` AND `bookposts`.`category_id` = '$cid' GROUP BY `subcategory_id`";


  //query from bookposts table and join with category table
  $query2 = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE`bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `bookposts`.`category_id` = '$cid' ORDER BY `bookposts`.`category_id` DESC";
  // echo $query2;
} else {
  exit;
}

$result = $conn->query($query);

$html = '';
while ($row = $result->fetch_assoc()) {
  $catname = $row['category_name'];
  $name = $row['subcategory_name'];
  $total = $row['total'];
  $subcatid = $row['subcategory_id'];

  $html .= '<div class="col-xl-3 col-sm-6 col-12 g-2">
                <a href="sub_category_view.php?id=' . $subcatid . '" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="align-self-center fs-1">
                                        <i class="fa-solid fa-book font-large-2 float-left"></i>
                                      </div>
                                    <div class="align-self-center ms-5">
                                        <h5 title="' . $name . '">' . substr($name, 0, 15) . '</h5>
                                        <span>' . $total . ' Books</span>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>';
}

$result2 = $conn->query($query2);
$html2 = '';
while ($row2 = $result2->fetch_assoc()) {
  $firstImage = explode(",", $row2['images'])[0];
  $name = $row2['name'];
  $author = $row2['author_name'];
  $division = $row2['division_name'];
  $district = $row2['district_name'];
  $area = $row2['area_name'];
  $id = $row2['id'];
  $price = $row2['price1'];

  $html2 .= '<div class="col-lg-2 col-md-3 col-sm-4 col-6 g-2">
  <a href="details.php?id=' . $id . '" class="text-decoration-none text-dark">
    <div class="card">
      <div class="text-center bookimage" data-mdb-ripple-color="light">
        <img class="img-fluid samewh" src="assets/upload_images/' . $firstImage . '"  />
      </div>
      <div class="card-body">
        <h5 class="card-title mb-3" title="' . $name . '">' . substr($name, 0, 12) . '</h5>
        <p title="' . $author . '">' . substr($author, 0, 15) . '</p>
        <h6 class="mb-3"><span>' . $price . ' </span> TK</h6>
      </div>
    </div>
  </a>
</div>';
}
?>

<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $catname ?? ""; ?></li>
    </ol>
  </nav>
  <div class="row">
    <?php echo $html ?? ""; ?>
  </div>
  <div class="row">
    <?php echo $html2 ?? ""; ?>
  </div>
</div>

<?php include "assets/inc/footer.php"; ?>
</body>

</html>