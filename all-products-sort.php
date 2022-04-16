<?php require "assets/inc/leftcol.php";
// require __DIR__."vendor/autoload.php";
use App\CommonFx;

//query from bookposts table and join with author table
if (isset($_GET['authid'])) {
    $author_sort_id = $conn->escape_string($_GET['authid']);
    $query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `author_id` = '$author_sort_id' ORDER BY `author`.`id` DESC";
    $author_result = $conn->query($query);
    $author_html = '';
    while ($author_row = $author_result->fetch_assoc()) {
        $author_first_image = explode(",", $author_row['images'])[0];
        $name = $author_row['name'];
        $author = $author_row['author_name'];
        $division = $author_row['division_name'];
        $district = $author_row['district_name'];
        $area = $author_row['area_name'];
        $author_id = $author_row['id'];
        $date1 = $author_row['created'];
        $timeago = CommonFx::HumanTime($date1);

        $author_html .= '<a href="details.php?id=' . $author_id . '" class="text-decoration-none">
      <div class="card mb-3">
          <div class="row g-0">
              <div class="col-4">
                  <img src="assets/upload_images/' . $author_first_image . '" class="img-fluid" alt="Book 1">
              </div>
              <div class="col-8">
                  <div class="card-body">
                      <h5 class="card-title">' . $name . '</h5>
                      <p class="card-text">' . $author . '</p>
                      <p class="card-text">' . $area . ', ' . $district . ', ' . $division . '</p>
                      <p class="card-text"><small class="text-muted">Last updated: '.$timeago.'</small></p>
                  </div>
              </div>
          </div>
      </div>
    </a>';
    }
}
//query from bookposts table and join with categories table
if (isset($_GET['catid'])) {
    $category_sort_id = $conn->escape_string($_GET['catid']);
    $query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `category_id` = '$category_sort_id' ORDER BY `category_id` DESC";
    $category_result = $conn->query($query);
    $category_html = '';
    while ($category_row = $category_result->fetch_assoc()) {
        $category_first_image = explode(",", $category_row['images'])[0];
        $name = $category_row['name'];
        $author = $category_row['author_name'];
        $division = $category_row['division_name'];
        $district = $category_row['district_name'];
        $area = $category_row['area_name'];
        $category_id = $category_row['id'];
        $date1 = $category_row['created'];
        $timeago = CommonFx::HumanTime($date1);

        $category_html .= '<a href="details.php?id=' . $category_id . '" class="text-decoration-none">
      <div class="card mb-3">
          <div class="row g-0">
              <div class="col-4">
                  <img src="assets/upload_images/' . $category_first_image . '" class="img-fluid" alt="Book 1">
              </div>
              <div class="col-8">
                  <div class="card-body">
                      <h5 class="card-title">' . $name . '</h5>
                      <p class="card-text">' . $author . '</p>
                      <p class="card-text">' . $area . ', ' . $district . ', ' . $division . '</p>
                      <p class="card-text"><small class="text-muted">Last updated: '.$timeago.'</small></p>
                  </div>
              </div>
          </div>
      </div>
    </a>';
    }
}

//query from bookposts table and join with publications table
if (isset($_GET['publicid'])) {
    $publication_sort_id = $conn->escape_string($_GET['publicid']);
    $query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `publications_id` = '$publication_sort_id' ORDER BY `publications_id` DESC";
    $publication_result = $conn->query($query);
    $publication_html = '';
    while ($publication_row = $publication_result->fetch_assoc()) {
        $publication_first_image = explode(",", $publication_row['images'])[0];
        $name = $publication_row['name'];
        $author = $publication_row['author_name'];
        $division = $publication_row['division_name'];
        $district = $publication_row['district_name'];
        $area = $publication_row['area_name'];
        $publication_id = $publication_row['id'];
        $date1 = $publication_row['created'];
        $timeago = CommonFx::HumanTime($date1);

        $publication_html .= '<a href="details.php?id=' . $publication_id . '" class="text-decoration-none">
      <div class="card mb-3">
          <div class="row g-0">
              <div class="col-4">
                  <img src="assets/upload_images/' . $publication_first_image . '" class="img-fluid" alt="Book 1">
              </div>
              <div class="col-8">
                  <div class="card-body">
                      <h5 class="card-title">' . $name . '</h5>
                      <p class="card-text">' . $author . '</p>
                      <p class="card-text">' . $area . ', ' . $district . ', ' . $division . '</p>
                      <p class="card-text"><small class="text-muted">Last updated: '.$timeago.'</small></p>
                  </div>
              </div>
          </div>
      </div>
    </a>';
    }
}


//query from bookposts table and join with division table
if (isset($_GET['divid'])) {
    $division_sort_id = $conn->escape_string($_GET['divid']);
    $query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `bookposts`.`division_id` = '$division_sort_id' ORDER BY `division`.`id` DESC";
    
    // echo $query;
    // exit;
    
    $division_result = $conn->query($query);
    $division_html = '';
    while ($division_row = $division_result->fetch_assoc()) {
        $division_first_image = explode(",", $division_row['images'])[0];
        $name = $division_row['name'];
        $author = $division_row['author_name'];
        $division = $division_row['division_name'];
        $district = $division_row['district_name'];
        $area = $division_row['area_name'];
        $division_id = $division_row['id'];
        $date1 = $division_row['created'];
        $timeago = CommonFx::HumanTime($date1);

        $division_html .= '<a href="details.php?id=' . $division_id . '" class="text-decoration-none">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="assets/upload_images/' . $division_first_image . '" class="img-fluid" alt="Book 1">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">' . $name . '</h5>
                            <p class="card-text">' . $author . '</p>
                            <p class="card-text">' . $area . ', ' . $district . ', ' . $division . '</p>
                            <p class="card-text"><small class="text-muted">Last updated: '.$timeago.'</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>';
    }
}

//query from bookposts table and join with district table
if (isset($_GET['distid'])) {
    $district_sort_id = $conn->escape_string($_GET['distid']);
    $query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `bookposts`.`district_id` = '$district_sort_id' ORDER BY `district`.`id` DESC";
    $district_result = $conn->query($query);
    $district_html = '';
    while ($district_row = $district_result->fetch_assoc()) {
        $district_first_image = explode(",", $district_row['images'])[0];
        $name = $district_row['name'];
        $author = $district_row['author_name'];
        $division = $district_row['division_name'];
        $district = $district_row['district_name'];
        $area = $district_row['area_name'];
        $district_id = $district_row['id'];
        $date1 = $district_row['created'];
        $timeago = CommonFx::HumanTime($date1);

        $district_html .= '<a href="details.php?id=' . $district_id . '" class="text-decoration-none">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-4">
                    <img src="assets/upload_images/' . $district_first_image . '" class="img-fluid" alt="Book 1">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">' . $name . '</h5>
                        <p class="card-text">' . $author . '</p>
                        <p class="card-text">' . $area . ', ' . $district . ', ' . $division . '</p>
                        <p class="card-text"><small class="text-muted">Last updated: '.$timeago.'</small></p>
                    </div>
                </div>
            </div>
        </div>
    </a>';
    }
}

//query from bookposts table and join with area table
if (isset($_GET['areaid'])) {
    $area_sort_id = $conn->escape_string($_GET['areaid']);
    $query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `area_id` = '$area_sort_id' ORDER BY `area`.`id` DESC";
    $area_result = $conn->query($query);
    $area_html = '';
    while ($area_row = $area_result->fetch_assoc()) {
        $area_first_image = explode(",", $area_row['images'])[0];
        $name = $area_row['name'];
        $author = $area_row['author_name'];
        $division = $area_row['division_name'];
        $district = $area_row['district_name'];
        $area = $area_row['area_name'];
        $area_id = $area_row['id'];
        $date1 = $area_row['created'];
        $timeago = CommonFx::HumanTime($date1);

        $area_html .= '<a href="details.php?id=' . $area_id . '" class="text-decoration-none">
          <div class="card mb-3">
              <div class="row g-0">
                  <div class="col-4">
                      <img src="assets/upload_images/' . $area_first_image . '" class="img-fluid" alt="Book 1">
                  </div>
                  <div class="col-8">
                      <div class="card-body">
                          <h5 class="card-title">' . $name . '</h5>
                          <p class="card-text">' . $author . '</p>
                          <p class="card-text">' . $area . ', ' . $district . ', ' . $division . '</p>
                          <p class="card-text"><small class="text-muted">Last updated: '.$timeago.'</small></p>
                      </div>
                  </div>
              </div>
          </div>
      </a>';
    }
}


?>
<div class="col-lg-6">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Home</a></li>
            <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>
    <?php echo $area_html ?? ''; ?>
    <?php echo $author_html ?? ''; ?>
    <?php echo $category_html ?? ''; ?>
    <?php echo $publication_html ?? ''; ?>
    <?php echo $division_html ?? ''; ?>
    <?php echo $district_html ?? ''; ?>
</div>
<div class="col-lg-2">

</div>
</div>
</div>

<?php include "assets/inc/footer.php"; ?>
</body>

</html>