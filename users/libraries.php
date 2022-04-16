<?php require "partial/header.php" ?>
<?php
require "../connection.php";
$session_id = $_SESSION['user_id'];

//bookposts table query
$query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name`, `categories`.`name` AS `category_name`, `subcategories`.`name` AS `subcategory_name`, `users`.`mobile` AS `users_number`, `publications`.`name` AS `publications_name` FROM `bookposts`, `author`, `division`, `district`, `area`, `categories`, `subcategories`, `users`, `publications` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `bookposts`.`category_id` = `categories`.`id` AND `bookposts`.`subcategory_id` = `subcategories`.`id` AND `bookposts`.`user_id` = `users`.`id` AND `bookposts`.`publications_id` = `publications`.`id` AND `bookposts`.`user_id` = '$session_id' GROUP BY `bookposts`.`id` ORDER BY `bookposts`.`id` DESC";
$result = $conn->query($query);
$html = '';
while ($row = $result->fetch_assoc()) {
  $firstImage = explode(",", $row['images'])[0];
  $bookpost_id = $row['id'];
  $bookname = $row['name'];
  $bookauthor = $row['author_name'];
  $bookdivision = $row['division_name'];
  $bookdistrict = $row['district_name'];
  $bookarea = $row['area_name'];
  $bookprice = $row['price1'];
  $bookdescription = $row['details'];
  $bookcategory = $row['category_name'];
  $booksubcategory = $row['subcategory_name'];
  // $bookimage = $row['image'];
  $price = $row['price1'];
  $bookusermobile = $row['users_number'];
  $bookpublications = $row['publications_name'];

$html .= '<div class="col-lg-3 col-md-3 col-sm-4 col-6 mb-4">
  <a href="../details.php?id='.$bookpost_id.'" class="text-decoration-none text-dark">
    <div class="card">
      <div class="text-center bookimage" data-mdb-ripple-color="light">
        <img class="img-fluid samewh" src="../assets/upload_images/' . $firstImage . '" />
      </div>
      <div class="card-body">
        <h5 class="card-title mb-3">'.$bookname.'</h5>
        <p>'.$bookauthor.'</p>
        <h6 class="mb-3"><span>'.$bookprice. ' </span> TK</h6>
      </div>
    </div>
  </a>
</div>';
}

?>
<main class=" pt-5">
  <section style="background-color: #eee;">
    <div class="text-center container py-2">
      <hr class="mt-4">
      <h4><strong>My Liabrary</strong></h4>
      <hr class="mb-4">
      <div class="row">
        <?php echo $html ?? ''; ?>

      </div>
    </div>
  </section>
</main>
<?php require "partial/footer.php" ?>
</body>

</html>