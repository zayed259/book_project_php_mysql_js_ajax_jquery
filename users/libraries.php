<?php
require "../configuration.php";
$page = "My Library";
require "partial/header.php";
require "../connection.php";
$session_id = $_SESSION['user_id'];

//bookposts table query
$query = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name`, `categories`.`name` AS `category_name`, `subcategories`.`name` AS `subcategory_name`, `users`.`mobile` AS `users_number`, `publications`.`name` AS `publications_name` FROM `bookposts`, `author`, `division`, `district`, `area`, `categories`, `subcategories`, `users`, `publications` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `bookposts`.`category_id` = `categories`.`id` AND `bookposts`.`subcategory_id` = `subcategories`.`id` AND `bookposts`.`user_id` = `users`.`id` AND `bookposts`.`publications_id` = `publications`.`id` AND `bookposts`.`user_id` = '$session_id' AND `bookposts`.`deleted` IS NULL GROUP BY `bookposts`.`id` ORDER BY  `bookposts`.`id` DESC";
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
    <div class="card">
    <a href="../details.php?id=' . $bookpost_id . '" class="text-decoration-none text-dark">
      <div class="text-center bookimage" data-mdb-ripple-color="light">
        <img class="img-fluid samewh" src="../assets/upload_images/' . $firstImage . '" />
      </div>
      <div class="card-body">
        <h5 class="card-title mb-3">' . $bookname . '</h5>
        <p>' . $bookauthor . '</p>
        <h6 class="mb-3"><span>' . $bookprice . ' </span> TK</h6>
      </div>
    </a>
      <div class="card-footer">
        <button class="btn btn-dark btn-sm" onclick="getUpdate(' . $bookpost_id . ')"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
        <button class="btn btn-danger btn-sm" onclick="deletebooks(' . $bookpost_id . ')"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
    </div>
</div>';
}

?>
<main class="pt-5">
  <!-- update modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Bookpost</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="updateName" class="form-label">Name</label>
            <input type="text" class="form-control" id="updateName">
          </div>
          <div class="form-group mb-3">
            <label for="updateAuthor" class="form-label">Author</label>
            <input type="text" class="form-control" id="updateAuthor">
          </div>
          <div class="form-group mb-3">
            <label for="updatePrice" class="form-label">Price</label>
            <input type="text" class="form-control" id="updatePrice">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <input type="hidden" id="hiddendata">
        </div>
      </div>
    </div>
  </div>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {
    display();
  });
  //delete function
  function deletebooks(deleteid) {
    var confirm = window.confirm("Are you sure you want to delete?");
    if (confirm) {
      $.ajax({
        url: 'libraries/delete.php',
        type: 'POST',
        data: {
          deletesend: deleteid
        },
        success: function(data, response) {
          location.reload();
        }
      });
    } else {
      return false;
    }
  }

  //update function
  function getUpdate(updateid) {
    $('#hiddendata').val(updateid);
    $.post('libraries/update.php', {
      updateid: updateid
    }, function(data, status) {
      var obj = JSON.parse(data);
      $('#updateName').val(obj.name);
    });
    $('#updateModal').modal('show');
  }
  // onclick event function
  function updateDetails() {
    var updatename = $('#updateName').val();
    var hiddendata = $('#hiddendata').val();
    $.post('libraries/update.php', {
      updatename: updatename,
      hiddendata: hiddendata
    }, function(data, status) {
      $('#updateModal').modal('hide');
      display();
    });
  }
</script>

</body>

</html>