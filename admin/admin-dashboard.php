<?php
require "partial/header.php";

require "../connection.php";
$query = "SELECT `id` FROM `users`";
$result = $conn->query($query);
$totalUsers = $result->num_rows;
$result->free();

$query = "SELECT `id` FROM `bookposts`";
$result = $conn->query($query);
$totalPost = $result->num_rows;
$result->free();

$query = "SELECT `id` FROM `author`";
$result = $conn->query($query);
$totalAuthor = $result->num_rows;
$result->free();

$query = "SELECT `id` FROM `publications`";
$result = $conn->query($query);
$totalPublications = $result->num_rows;
$result->free();

$query = "SELECT `id` FROM `division`";
$result = $conn->query($query);
$totalDivisions = $result->num_rows;
$result->free();

$query = "SELECT `id` FROM `district`";
$result = $conn->query($query);
$totalDistrict = $result->num_rows;
$result->free();

$query = "SELECT `id` FROM `area`";
$result = $conn->query($query);
$totalArea = $result->num_rows;
$result->free();

$query = "SELECT `id` FROM `categories`";
$result = $conn->query($query);
$totalCategories = $result->num_rows;
$result->free();

$query = "SELECT `id` FROM `subcategories`";
$result = $conn->query($query);
$totalSubcategories = $result->num_rows;
$result->free();


$query = "SELECT * FROM `bookposts` WHERE 1";
$bookResult = $conn->query($query);
$conn->close();
?>

<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4>Dashboard</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 mb-3">
        <div class="card bg-light h-100">
          <div class="card-header text-center fw-bold">Total Post</div>
          <div class="card-body text-center">
            <h1><?php echo $totalPost ?? ""; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-light h-100">
          <div class="card-header text-center fw-bold">Total Users</div>
          <div class="card-body text-center">
            <h1><?php echo $totalUsers ?? ""; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-light h-100">
          <div class="card-header text-center fw-bold">Total Authors</div>
          <div class="card-body text-center">
            <h1><?php echo $totalAuthor ?? ""; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-light h-100">
          <div class="card-header text-center fw-bold">Total Publications</div>
          <div class="card-body text-center">
            <h1><?php echo $totalPublications ?? ""; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-light h-100">
          <div class="card-header text-center fw-bold">Total Division</div>
          <div class="card-body text-center">
            <h1><?php echo $totalDivisions ?? ""; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-light h-100">
          <div class="card-header text-center fw-bold">Total District</div>
          <div class="card-body text-center">
            <h1><?php echo $totalDistrict ?? ""; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-light h-100">
          <div class="card-header text-center fw-bold">Total Area</div>
          <div class="card-body text-center">
            <h1><?php echo $totalArea ?? ""; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-light h-100">
          <div class="card-header text-center fw-bold">Total Categories</div>
          <div class="card-body text-center">
            <h1><?php echo $totalCategories ?? ""; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-light h-100">
          <div class="card-header text-center fw-bold">Total Subcategories</div>
          <div class="card-body text-center">
            <h1><?php echo $totalSubcategories ?? ""; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4>Recent Post Table</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-table me-2"></i></span> Data Table
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Details</th>
                      <th>Price1</th>
                      <th>Price2</th>
                      <th>User Id</th>
                      <th>Category Id</th>
                      <th>Subcategory Id</th>
                      <th>Division Id</th>
                      <th>District Id</th>
                      <th>Area Id</th>
                      <th>Author Id</th>
                      <th>Publication Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = $bookResult->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . $row['details'] . "</td>";
                      echo "<td>" . $row['price1'] . "</td>";
                      echo "<td>" . $row['price2'] . "</td>";
                      echo "<td>" . $row['user_id'] . "</td>";
                      echo "<td>" . $row['category_id'] . "</td>";
                      echo "<td>" . $row['subcategory_id'] . "</td>";
                      echo "<td>" . $row['division_id'] . "</td>";
                      echo "<td>" . $row['district_id'] . "</td>";
                      echo "<td>" . $row['area_id'] . "</td>";
                      echo "<td>" . $row['author_id'] . "</td>";
                      echo "<td>" . $row['publications_id'] . "</td>";
                      echo "<td><button class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i> Edit</button> <button class='btn btn-danger'> <i class='fa-solid fa-trash-can'></i> Delete</button></td>";
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Details</th>
                      <th>Price1</th>
                      <th>Price2</th>
                      <th>User Id</th>
                      <th>Category Id</th>
                      <th>Subcategory Id</th>
                      <th>Division Id</th>
                      <th>District Id</th>
                      <th>Area Id</th>
                      <th>Author Id</th>
                      <th>Publication Id</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
<script>
  $(document).ready(function() {
    //add
    $('#add').click(function() {
      
    });

    //edit
    $('#edit').click(function() {

    });

    //delete
    $('#delete').click(function() {

    });


    //show
  });
</script>

<?php require "partial/footer.php" ?>
</body>

</html>