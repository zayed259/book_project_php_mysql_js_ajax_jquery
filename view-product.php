<?php
require "configuration.php";
$page = "Book Details";
include 'assets/inc/header.php';
?>
<!-- <div class="container ">
    <div class="row">
        <div class="col-9 position_center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
            <div>
                <h2>Retro</h2>
            </div>
            <div>
                <h6>Posted on 14 Mar 12:18 am, Noakhali, Chattogram Division</h6>
            </div>

            <img src="assets/images/book-10.png" alt="" height="400px" width="400px">
            <div>
                <h2>TK: 280</h2>
            </div>
            <div><b>Condition:</b> Used</div>
            <div><b>Category:</b> Horror</div>
            <div><b>Author:</b> Humayun Ahmed</div>
            <div><b>Publication:</b> Janani Publications</div>

            <p><b>Description:</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad neque saepe qui similique
                perferendis repudiandae. Libero, possimus. Amet unde illo itaque enim consectetur nulla quos
                reiciendis aut, voluptas nostrum tempore.
                Hic veniam facilis voluptas vero rem quo sequi cumque, repellendus debitis quas? Unde quisquam vero
                fugit molestias ab, explicabo veniam voluptas adipisci. Exercitationem quae atque fugit labore neque
                dolores accusamus.</p>
        </div>
        <div class="col-3  mt-5">
            <div><i class="fa-solid fa-share-nodes"></i> <span>SHARE</span></div>
            <div>For sell by <a href="#" class="text-decoration-none"><b>Tamima</b></a></div>
            <div><button class="btn btn-primary my-1"><i class="fa-solid fa-phone m-2"></i>017XXXXXXXX</button></div>
            <div><button class="btn btn-primary my-1"><i class="fa-solid fa-heart m-2"></i> Wishlist</button></div>
            <div><button class="btn btn-primary my-1"><i class="fa-solid fa-comments m-2"></i></button></div>
        </div>
    </div>
</div> -->
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
p#details{
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
            <div class="wrapper row">
                <div class="preview col-md-4">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="assets/images/Aaj_Robibar_cover.jpg" /></div>
                        <div class="tab-pane" id="pic-2"><img src="assets/images/book-2.png" /></div>
                        <div class="tab-pane" id="pic-3"><img src="assets/images/book-3.png" /></div>
                        <div class="tab-pane" id="pic-4"><img src="assets/images/book-4.png" /></div>
                        <div class="tab-pane" id="pic-5"><img src="assets/images/book-5.png" /></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="assets/images/book-1.png" /></a></li>
                        <li><a data-target="#pic-2" data-toggle="tab"><img src="assets/images/book-2.png" /></a></li>
                        <li><a data-target="#pic-3" data-toggle="tab"><img src="assets/images/book-3.png" /></a></li>
                        <li><a data-target="#pic-4" data-toggle="tab"><img src="assets/images/book-4.png" /></a></li>
                        <li><a data-target="#pic-5" data-toggle="tab"><img src="assets/images/book-5.png" /></a></li>
                    </ul>

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">Aj Robibar-আজ রবিবার</h3>
                    <div><b>Author:</b> Humayun Ahmed</div>
                    <div><b>Category:</b> Novel</div>
                    <div><b>Subcategory:</b> Romantic</div>
                    <!-- <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div> -->
                    <p id="details" class="product-description">A drama about the daily comic incidents taking place in a Dhaka household, the series' opening episode begins with Konka, the younger granddaughter who breaks the fourth wall to introduce characters and premises to the audience. She and her elder sister Titli are fun-loving girls, both secretly in love with the boarder Anis, a nerd who doesn't seem to understand social stuff and never shows affection for any of them. Their father Jamil, the middle son and an architect by profession, is fond of Hason Raja songs and after losing his wife around the time when Konka was born, falls in love with an attractive, mature and intelligent woman named Meera, whom he hires as a governess.</p>
                    <h4 class="price">current price: <span>TK: 180</span></h4>
                    <!-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> -->
                    <div>
                        <button class="btn btn-primary my-1"><i class="fa-solid fa-phone m-2"></i>017XXXXXXXX</button>
                        <button class="btn btn-primary my-1"><i class="fa-solid fa-comments m-2"></i></button>
                        <button class="btn btn-primary my-1"><i class="fa-solid fa-heart m-2"></i></button>
                    </div>
                    <!-- <div class="action">
                        <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</div>


<?php include "assets/inc/footer.php"; ?>
</body>

</html>