<?php
require "partial/header.php";
require "../connection.php";
$session_user_id = $_SESSION['user_id'];
$query = "SELECT * FROM `fav` WHERE `user_id` = '$session_user_id'";




// $query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name`, `categories`.`name` AS `category_name`, `subcategories`.`name` AS `subcategory_name`, `users`.`mobile` AS `users_number`, `publications`.`name` AS `publications_name` FROM `bookposts`, `author`, `division`, `district`, `area`, `categories`, `subcategories`, `users`, `publications`, `fav` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `bookposts`.`category_id` = `categories`.`id` AND `bookposts`.`subcategory_id` = `subcategories`.`id` AND `bookposts`.`user_id` = `fav`.`user_id` AND `bookposts`.`publications_id` = `publications`.`id` AND `bookposts`.`user_id` = '$session_user_id' GROUP BY `bookposts`.`id` ORDER BY `bookposts`.`id` DESC";
$result = $conn->query($query);
$html = '';
while ($row = $result->fetch_assoc()) {
  $firstImage = explode(",", $row['images'])[0];
  $bookpost_id = $row['id'];
  $bookname = $row['name'];
  $bookauthor = $row['author_name'];
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
<!-- <main class=" pt-5">
  <section style="background-color: #eee;">
    <div class="text-center container py-2">
      <hr class="mt-4">
      <h4><strong>Favourites List</strong></h4>
      <hr class="mb-5">

      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
          <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
              <img src="../assets/images/book-6.png" class="w-100" />
              <a href="#!">
                <div class="mask">
                  <div class="d-flex justify-content-start align-items-end h-100">
                    <h5><span class="badge bg-primary ms-2">New</span></h5>
                  </div>
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-reset">
                <h5 class="card-title mb-3">Product name</h5>
              </a>
              <a href="" class="text-reset">
                <p>Category</p>
              </a>
              <h6 class="mb-3">$61.99</h6>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
          <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
              <img src="../assets/images/book-1.png" class="w-100" />
              <a href="#!">
                <div class="mask">
                  <div class="d-flex justify-content-start align-items-end h-100">
                    <h5><span class="badge bg-success ms-2">Eco</span></h5>
                  </div>
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-reset">
                <h5 class="card-title mb-3">Product name</h5>
              </a>
              <a href="" class="text-reset">
                <p>Category</p>
              </a>
              <h6 class="mb-3">$61.99</h6>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
          <div class="card">
            <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
              <img src="../assets/images/book-3.png" class="w-100" />
              <a href="#!">
                <div class="mask">
                  <div class="d-flex justify-content-start align-items-end h-100">
                    <h5><span class="badge bg-danger ms-2">-10%</span></h5>
                  </div>
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-reset">
                <h5 class="card-title mb-3">Product name</h5>
              </a>
              <a href="" class="text-reset">
                <p>Category</p>
              </a>
              <h6 class="mb-3">
                <s>$61.99</s><strong class="ms-2 text-danger">$50.99</strong>
              </h6>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
          <div class="card">
            <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
              <img src="../assets/images/book-3.png" class="w-100" />
              <a href="#!">
                <div class="mask">
                  <div class="d-flex justify-content-start align-items-end h-100">
                    <h5><span class="badge bg-danger ms-2">-10%</span></h5>
                  </div>
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-reset">
                <h5 class="card-title mb-3">Product name</h5>
              </a>
              <a href="" class="text-reset">
                <p>Category</p>
              </a>
              <h6 class="mb-3">
                <s>$61.99</s><strong class="ms-2 text-danger">$50.99</strong>
              </h6>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
          <div class="card">
            <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
              <img src="../assets/images/book-3.png" class="w-100" />
              <a href="#!">
                <div class="mask">
                  <div class="d-flex justify-content-start align-items-end h-100">
                    <h5><span class="badge bg-danger ms-2">-10%</span></h5>
                  </div>
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-reset">
                <h5 class="card-title mb-3">Product name</h5>
              </a>
              <a href="" class="text-reset">
                <p>Category</p>
              </a>
              <h6 class="mb-3">
                <s>$61.99</s><strong class="ms-2 text-danger">$50.99</strong>
              </h6>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
          <div class="card">
            <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
              <img src="../assets/images/book-3.png" class="w-100" />
              <a href="#!">
                <div class="mask">
                  <div class="d-flex justify-content-start align-items-end h-100">
                    <h5><span class="badge bg-danger ms-2">-10%</span></h5>
                  </div>
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-reset">
                <h5 class="card-title mb-3">Product name</h5>
              </a>
              <a href="" class="text-reset">
                <p>Category</p>
              </a>
              <h6 class="mb-3">
                <s>$61.99</s><strong class="ms-2 text-danger">$50.99</strong>
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--   <div class="container-fluid">


        <a href="view-product.php" class="text-decoration-none">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="../assets/images/book-1.png" height="250px" class="img-fluid" alt="Book 1">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">Aaj Robi Bar</h5>
                            <p class="card-text">Dhaka, Humayun Ahmed</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="text-decoration-none">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="../assets/images/book-2.png" class="img-fluid" alt="Book 1">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">Opekkha</h5>
                            <p class="card-text">Faridpur, Humayun Ahmed</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="text-decoration-none">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="../assets/images/book-3.png" class="img-fluid" alt="Book 1">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">Opekkha</h5>
                            <p class="card-text">Faridpur, Humayun Ahmed</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="text-decoration-none">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="../assets/images/book-4.png" class="img-fluid" alt="Book 1">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">Opekkha</h5>
                            <p class="card-text">Faridpur, Humayun Ahmed</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="text-decoration-none">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="../assets/images/book-5.png" class="img-fluid" alt="Book 1">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">Opekkha</h5>
                            <p class="card-text">Faridpur, Humayun Ahmed</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> -->
</main> -->
<main class="mt-2">
  <section style="background-color: #eee;">
    <div class="text-center container py-2">
      <hr class="mt-4">
      <h4><strong>My Favourites</strong></h4>
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