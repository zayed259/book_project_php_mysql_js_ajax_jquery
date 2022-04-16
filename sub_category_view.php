<?php
require "vendor/autoload.php";
require "configuration.php";
$page = "Sub Category";
include 'assets/inc/header.php';

require "connection.php";
if (isset($_GET['id'])) {
  $subcatid = $conn->escape_string($_GET['id']);
  $query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `bookposts`.`subcategory_id` = '$subcatid' ORDER BY `bookposts`.`subcategory_id` DESC";
  // echo $query;
} else {
  exit;
}


$result = $conn->query($query);
$html = '';
while ($row = $result->fetch_assoc()) {
  $firstImage = explode(",", $row['images'])[0];
  $name = $row['name'];
  $author = $row['author_name'];
  $division = $row['division_name'];
  $district = $row['district_name'];
  $area = $row['area_name'];
  $id = $row['id'];
  $price = $row['price1'];

  $html .= '<div class="col-lg-2 col-md-3 col-sm-4 col-6 g-2">
  <a href="details.php?id=' . $id . '" class="text-decoration-none text-dark">
    <div class="card">
      <div class="text-center bookimage" data-mdb-ripple-color="light">
        <img class="img-fluid samewh" src="assets/upload_images/' . $firstImage . '"  />
      </div>
      <div class="card-body">
        <h5 class="card-title mb-3" title="' . $name . '">' . substr($name, 0, 15) . '</h5>
        <p title="' . $author . '">' . substr($author, 0, 15) . '</p>
        <h6 class="mb-3"><span>' . $price . ' </span> TK</h6>
      </div>
    </div>
  </a>
</div>';
}
?>

<?php $result = getCatSubcatName($subcatid);
$row = $result->fetch_assoc(); ?>
<div class="grey-bg container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a class="text-decoration-none" href="sub_category.php?category=<?php echo $row['cid']; ?>"><?php echo $row['cname']; ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $row['scname'] ?></li>
    </ol>
  </nav>
  <div class="row">
    <?php echo $html ?? ""; ?>
  </div>
</div>

<?php include "assets/inc/footer.php"; ?>
</body>

</html>