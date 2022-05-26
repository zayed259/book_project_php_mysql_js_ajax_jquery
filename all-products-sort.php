<?php require "assets/inc/leftcol.php";
// require __DIR__."vendor/autoload.php";
use App\CommonFx;

$search_string = "where 1";
if (isset($_GET['authid'])) {
    $author_sort_id = $conn->escape_string($_GET['authid']);
    $search_string = "`author_id` = '$author_sort_id'";
}
if (isset($_GET['catid'])) {
    $cat_sort_id = $conn->escape_string($_GET['catid']);
    $search_string = "`category_id` = '$cat_sort_id'";
}
if (isset($_GET['publicid'])) {
    $publication_sort_id = $conn->escape_string($_GET['publicid']);
    $search_string = "`publications_id` = '$publication_sort_id'";
}
if (isset($_GET['divid'])) {
    $division_sort_id = $conn->escape_string($_GET['divid']);
    $search_string = "`division_id` = '$division_sort_id'";
}
if (isset($_GET['distid'])) {
    $district_sort_id = $conn->escape_string($_GET['distid']);
    $search_string = "`district_id` = '$district_sort_id'";
}
if (isset($_GET['areaid'])) {
    $area_sort_id = $conn->escape_string($_GET['areaid']);
    $search_string = "`area_id` = '$area_sort_id'";
}

$query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND " . $search_string . " ORDER BY `bookposts`.`id` DESC, `bookposts`.`deleted` is null LIMIT $start, $count";

$totalquery = "SELECT count(*) as `total` FROM `bookposts`, `author`, `division`, `district`, `area` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND " . $search_string . " ORDER BY `bookposts`.`id` DESC, `bookposts`.`deleted` is null";

$qr = $conn->query($totalquery);
$totalrec = $qr->fetch_row();
$totalrec = $totalrec[0];

$result = $conn->query($query);
$html = '';
while ($row = $result->fetch_assoc()) {
    $first_image = explode(",", $row['images'])[0];
    $name = $row['name'];
    $author = $row['author_name'];
    $division = $row['division_name'];
    $district = $row['district_name'];
    $area = $row['area_name'];
    $id = $row['id'];
    $date1 = $row['created'];
    $timeago = CommonFx::HumanTime($date1);

    $html .= '<a href="details.php?id=' . $id . '" class="text-decoration-none">
      <div class="card mb-3">
          <div class="row g-0">
              <div class="col-4">
                  <img src="assets/upload_images/' . $first_image . '" class="img-fluid" alt="Book 1">
              </div>
              <div class="col-8">
                  <div class="card-body">
                      <h5 class="card-title">' . $name . '</h5>
                      <p class="card-text">' . $author . '</p>
                      <p class="card-text">' . $area . ', ' . $district . ', ' . $division . '</p>
                      <p class="card-text"><small class="text-muted">Last updated: ' . $timeago . '</small></p>
                  </div>
              </div>
          </div>
      </div>
    </a>';
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
    <?php echo $html ?? ''; ?>
    <?php //echo $_SERVER['QUERY_STRING']; 
    ?>
    <!-- pagination -->
    <?php
    $qs = "&";
    if (isset($_GET['authid'])) {
        $qs .= "authid=" . $_GET['authid'];
    }
    if (isset($_GET['catid'])) {
        $qs .= "catid=" . $_GET['catid'];
    }
    if (isset($_GET['publicid'])) {
        $qs .= "publicid=" . $_GET['publicid'];
    }
    if (isset($_GET['divid'])) {
        $qs .= "divid=" . $_GET['divid'];
    }
    if (isset($_GET['distid'])) {
        $qs .= "distid=" . $_GET['distid'];
    }
    if (isset($_GET['areaid'])) {
        $qs .= "areaid=" . $_GET['areaid'];
    }
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            $total_pages = ceil($totalrec / $count);
            // echo $total_pages;
            if ($pages > 1) {
                echo "<li class='page-item'><a class='page-link' href='?page=" . ($pages - 1) . $qs . "'>Previous</a></li>";
                // echo "<li class='page-item'><a class='page-link' href='?page=1'>1</a></li>";
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                if (abs($i - $pages) > 2) continue;
                if ($i == $pages) {
                    echo "<li class='page-item active'><a class='page-link' href='?page=" . $i .  $qs . "'>" . $i . "</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . $i .  $qs . "'>" . $i . "</a></li>";
                }
            }
            if ($pages < $total_pages) {
                echo "<li class='page-item'><a class='page-link' href='?page=" . ($pages + 1) .  $qs . "'>Next</a></li>";
            }
            ?>
        </ul>
    </nav>

</div>
<div class="col-lg-2">

</div>
</div>
</div>

<?php include "assets/inc/footer.php"; ?>
</body>

</html>