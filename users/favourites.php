<?php
require "../configuration.php";
$page = "Favourites";
require "partial/header.php";
require "../connection.php";
$session_user_id = $_SESSION['user_id'];
$query = "SELECT `users`.`id` AS `user_id`, `users`.`full_name` AS `user_name`, `bookposts`.*, `fav`.`id` AS `favourite_id`, `author`.`name` AS `author_name` FROM `users`, `bookposts`, `fav`, `author` WHERE `users`.`id` = `fav`.`user_id` and `bookposts`.`id` = `fav`.`bookpost_id` and `bookposts`.`author_id` = `author`.`id` and `fav`.`user_id` = '$session_user_id'  ORDER BY `bookposts`.`id` DESC";
// echo $query;
// exit;

$result = $conn->query($query);
$html = '';
while ($row = $result->fetch_assoc()) {
  $firstImage = explode(",", $row['images'])[0];
  $bookpost_id = $row['id'];
  $bookname = $row['name'];
  $bookauthor = $row['author_name'];
  $bookprice = $row['price1'];


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
        <button class="btn btn-danger btn-sm" onclick="removebooks(' . $bookpost_id . ')"><i class="fa-solid fa-circle-minus"></i> Remove</button>
      </div>
    </div>

</div>';
}
?>
<main class="pt-5">
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {

  });
  //delete function
  function removebooks(removeid) {
    var confirm = window.confirm("Are you sure you want to delete?");
    if (confirm) {
      $.ajax({
        url: "favourites/delete.php",
        method: "POST",
        data: {
          deletesend: removeid
        },
        success: function(data) {
          if (data == "Success") {
            // alert("Successfully Deleted");
            location.reload();
          } else {
            alert("Error");
          }
        }
      });
    }
    // if (confirm) {
    //   $.ajax({
    //     url: 'favourites/delete.php',
    //     type: 'POST',
    //     data: {
    //       deletesend: removeid
    //     },
    //     success: function(data, response) {

    //     }
    //   });
    // } else {
    //   return false;
    // }
  }
</script>
</body>

</html>