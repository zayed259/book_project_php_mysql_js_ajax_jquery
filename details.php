<?php
require "configuration.php";
$page = "Book Details";
include 'assets/inc/header.php';
require 'connection.php';
if (isset($_GET['id'])) {
    $postid = $conn->escape_string($_GET['id']);
    $sql = "SELECT `bookposts`.*, `author`.`name` AS `author_name`, `division`.`name` AS `division_name`, `district`.`name` AS `district_name`, `area`.`name` AS `area_name`, `categories`.`name` AS `category_name`, `subcategories`.`name` AS `subcategory_name`, `users`.`mobile` AS `users_number`, `publications`.`name` AS `publications_name`  FROM `bookposts`, `author`, `division`, `district`, `area`, `categories`, `subcategories`, `users`, `publications` WHERE `bookposts`.`author_id` = `author`.`id` AND `bookposts`.`division_id` = `division`.`id` AND `bookposts`.`district_id` = `district`.`id` AND `bookposts`.`area_id` = `area`.`id` AND `bookposts`.`category_id` = `categories`.`id` AND `bookposts`.`subcategory_id` = `subcategories`.`id` AND `bookposts`.`user_id` = `users`.`id` AND `bookposts`.`publications_id` = `publications`.`id` AND `bookposts`.`id` = '$postid'";
    // echo $sql;
} else {
    exit;
}
$result = $conn->query($sql);
$html = '';
while ($row = $result->fetch_assoc()) {
    $images = explode(',', $row['images']);
    $ul = '<ul class="preview-thumbnail nav nav-tabs">';
    foreach ($images as $img) {
        $ul .= '<li><a href="javascript:void(0)" class="imgthumb" data-img="' . $img . '"><img src="assets/upload_images/' . $img . '" /></a></li>';
    }
    $ul .= '</ul>';

    $bookname = $row['name'];
    $bookauthor = $row['author_name'];
    $bookdivision = $row['division_name'];
    $bookdistrict = $row['district_name'];
    $bookarea = $row['area_name'];
    $bookprice = $row['price1'];
    $bookdescription = $row['details'];
    $bookcategory = $row['category_name'];
    $booksubcategory = $row['subcategory_name'];
    $price = $row['price1'];
    $bookusermobile = $row['users_number'];
    $bookpublications = $row['publications_name'];


    $html .= '<div class="wrapper row">
    <div class="preview col-md-4">
        <div class="preview-pic tab-content">
            <div class="tab-pane active"><img id="imgcontainer" src="assets/upload_images/' . $images[0] . '" /></div>
        </div>
        ' . $ul . '
        
    </div>
    <div class="details col-md-6">
        <h3 class="product-title">' . $bookname . '</h3>
        <p> From <span class="text-info">' . $bookarea . ', ' . $bookdistrict . ', ' . $bookdivision . '.</span></p>
        <div><b>Author:</b> ' . $bookauthor . '</div>
        <div><b>Category:</b> ' . $bookcategory . '</div>
        <div><b>Subcategory:</b> ' . $booksubcategory . '</div>
        <div><b>Publication:</b> ' . $bookpublications . '</div>
        <p id="details" class="product-description">' . $bookdescription . '</p>
        <h4 class="price">Price: <span>TK: ' . $price . '</span></h4>
        <div>
            
            <button class="btn btn-primary"><a href="tel:' . $bookusermobile . '" class="text-decoration-none text-light"><i class="fa-solid fa-phone m-2"></i> ' . $bookusermobile . '</a></button>
            <button class="btn btn-primary my-1"><i class="fa-solid fa-comments m-2"></i></button>
            <button id="favbtn" data-bookid="' . $postid . '" class="btn btn-primary my-1"><i class="fa-solid fa-heart m-2"></i></button>
        </div>
    </div>
</div>';
}

?>
<style>
    /*****************globals*************/
    body {
        font-family: 'open sans';
        overflow-x: hidden;
    }

    img {
        max-width: 100%;
    }

    .preview {
        display: flex;
        flex-direction: column;
    }

    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px;
        }
    }

    .preview-pic {
        flex-grow: 1;
    }

    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px;
    }

    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%;
    }

    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block;
    }

    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0;
    }

    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0;
    }

    .tab-content {
        overflow: hidden;
    }

    .tab-content img {
        width: 100%;
        animation-name: opacity;
        animation-duration: .3s;
    }

    .card {
        margin-top: 50px;
        background: #eee;
        padding: 3em;
        line-height: 1.5em;
    }

    @media screen and (min-width: 997px) {
        .wrapper {
            display: flex;
        }
    }

    .details {
        display: flex;
        flex-direction: column;
    }

    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .product-title,
    .price,
    .sizes,
    .colors {
        text-transform: UPPERCASE;
        font-weight: bold;
    }

    .checked,
    .price span {
        color: #ff9f1a;
    }

    .product-title,
    .rating,
    .product-description,
    .price,
    .vote,
    .sizes {
        margin-bottom: 15px;
    }

    .product-title {
        margin-top: 0;
    }

    .size {
        margin-right: 10px;
    }

    .size:first-of-type {
        margin-left: 40px;
    }

    .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px;
    }

    .color:first-of-type {
        margin-left: 20px;
    }

    .add-to-cart,
    .like {
        background: #ff9f1a;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        transition: background .3s ease;
    }

    p#details {
        border: 1px solid gray;
        padding: 5px;
    }

    .add-to-cart:hover,
    .like:hover {
        background: #b36800;
        color: #fff;
    }

    .not-available {
        text-align: center;
        line-height: 2em;
    }

    .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff;
    }

    .orange {
        background: #ff9f1a;
    }

    .green {
        background: #85ad00;
    }

    .blue {
        background: #0076ad;
    }

    .tooltip-inner {
        padding: 1.3em;
    }

    @keyframes opacity {
        0% {
            opacity: 0;
            transform: scale(3);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <?php echo $html ?? ""; ?>
        </div>
    </div>
</div>


<?php include "assets/inc/footer.php"; ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#favbtn").click(function() {
            $bookid = $(this).data("bookid");
            //alert($bookid);
            $.post("users/classes/addtofav.php", {
                bookid: $bookid
            }, function(d) {
                //sweetalert(d);
                Swal.fire(d);
                // alert(d);
            })
        });
        //
        $(".imgthumb").click(function(e) {
            e.preventDefault();
            $t = $(this);
            // alert($t.data("img"))
            $("#imgcontainer").fadeOut(500, function() {
                $("#imgcontainer").attr("src", "assets/upload_images/" + $t.data("img")).fadeIn(500);
            })
        });
    });
</script>
</body>

</html>