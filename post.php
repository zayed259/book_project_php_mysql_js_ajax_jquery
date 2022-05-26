<?php
require "configuration.php";
$page = "Post Your Ad";
include 'assets/inc/header.php';
if (!isset($_SESSION['logged_in'])) {
    header("location: login.php?redirect=post");
}
$session_id = $_SESSION['user_id'];
$error = false;
$errormessage = [];
//add product
if (isset($_POST['add_product'])) {
    require 'connection.php';
    $book_name = isset($_POST['bookname']) ? $conn->escape_string($_POST['bookname']) : "";
    if (empty($book_name)) {
        $error = true;
        $errormessage[] = "book name required!!";
    }

    $author = isset($_POST['author']) ? $conn->escape_string($_POST['author']) : "";
    if ($author == "-1") {
        $error = true;
        $errormessage[] = "author name required!!";
    }

    $publications = isset($_POST['publications']) ? $conn->escape_string($_POST['publications']) : "";
    if ($publications == "-1") {
        $error = true;
        $errormessage[] = "publication name required!!";
    }

    $details = isset($_POST['details']) ? $conn->escape_string($_POST['details']) : "";
    if (empty($details)) {
        $error = true;
        $errormessage[] = "details required!!";
    }

    $price = isset($_POST['price']) ? $conn->escape_string($_POST['price']) : "";
    if (empty($price)) {
        $error = true;
        $errormessage[] = "price required!!";
    }

    $category = isset($_POST['category']) ? $conn->escape_string($_POST['category']) : "";
    if ($category == "-1") {
        $error = true;
        $errormessage[] = "category required!!";
    }

    $subcategory = isset($_POST['subcategory']) ? $conn->escape_string($_POST['subcategory']) : "";
    if ($subcategory == "-1") {
        $error = true;
        $errormessage[] = "subcategory required!!";
    }

    $division = isset($_POST['division']) ? $conn->escape_string($_POST['division']) : "";
    if ($division == "-1") {
        $error = true;
        $errormessage[] = "division required!!";
    }

    $district = isset($_POST['district']) ? $conn->escape_string($_POST['district']) : "";
    if ($district == "-1") {
        $error = true;
        $errormessage[] = "district required!!";
    }

    $area = isset($_POST['area']) ? $conn->escape_string($_POST['area']) : "";
    if ($area == "-1") {
        $error = true;
        $errormessage[] = "area required!!";
    }

    $condition = isset($_POST['condition']) ? $conn->escape_string($_POST['condition']) : "";
    if (empty($condition)) {
        $error = true;
        $errormessage[] = "condition required!!";
    }

    $checkout = isset($_POST['checkout']) ? $conn->escape_string($_POST['checkout']) : "";
    if (empty($checkout)) {
        $error = true;
        $errormessage[] = "checkout required!!";
    }

    $images = $_FILES['images'];
    $images_name = $images['name'];
    $images_tmp = $images['tmp_name'];
    $images_size = $images['size'];
    $images_error = $images['error'];
    $images_type = $images['type'];

    $imagesArr = [];
    if (!$error) {
        for ($i = 0; $i < count($images_name); $i++) {
            $iname = strtolower($images_name[$i]);
            $images_ext = explode('.', $iname);
            $iext = strtolower(end($images_ext));
            $images_new_name = uniqid('', true) . '.' . $iext;
            $images_destination = 'assets/upload_images/' . $images_new_name;
            if (move_uploaded_file($images_tmp[$i], $images_destination)) {
                array_push($imagesArr, $images_new_name);
            }
        }
        $images = implode(',', $imagesArr);

        if ($book_name == '' || $author == '' || $publications == '' || $details == '' || $price == '' || $category == '' || $subcategory == '' || $division == '' || $district == '' || $area == '' || $condition == '' || $checkout == '' || $images == '') {
            $message = "All fields are required";
        } else {
            $insertQuery = "INSERT INTO `bookposts` (`name`, `details`, `price1`, `type`, `user_id`, `category_id`, `subcategory_id`, `division_id`, `district_id`, `area_id`, `author_id`, `publications_id`, `images`) VALUES ('$book_name', '$details', '$price', '$condition', '$session_id', '$category', '$subcategory', '$division', '$district', '$area', '$author', '$publications', '$images')";
            $conn->query($insertQuery);
            if ($conn->affected_rows > 0) {
                $message = "Product Added Successfully";
            } else {
                $message = "Product Not Added";
            }
        }
    } //error false end
}

?>
<div class="container mt-5">
    <!-- add product -->
    <?php echo $message ?? ''; ?>
    <?php
    if ($error) {
        echo "<ul>";
        foreach ($errormessage as  $value) {
            echo "<li>{$value}</li>";
        }
        echo "</ul>";
    }
    ?>
    <form class="form-control p-4" id="bookForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="bookname" class="form-label">Book Name</label>
            <input type="text" class="form-control" id="bookname" name="bookname" value="<?php echo $book_name ?? ""; ?>">
        </div>
        <div class="mb-4">
            <label class="form-label" for="author">Author Name</label>
            <select class="form-select" aria-label="Default select example" id="author" name="author">
                <option selected value="-1">Select</option>
                <?php
                require 'connection.php';
                $author_sql1 = "SELECT * FROM `author` ORDER BY `name` ASC";
                $author_result = $conn->query($author_sql1);
                while ($row = $author_result->fetch_assoc()) {
                    if (isset($author)) {
                        if ($author == $row['id']) {
                            echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
                        } else {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    } else {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="publications">Publications</label>
            <select class="form-select" aria-label="Default select example" id="publications" name="publications">
                <option selected value="-1">Select</option>
                <?php
                require 'connection.php';
                $publications_sql1 = "SELECT * FROM `publications` ORDER BY `name` ASC";
                $publications_result = $conn->query($publications_sql1);
                while ($row = $publications_result->fetch_assoc()) {
                    if (isset($publications)) {
                        if ($publications == $row['id']) {
                            echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
                        } else {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    } else {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="details" class="form-label">Details</label>
            <textarea name="details" id="details" rows="5" class="form-control"><?php echo $details ?? ''; ?></textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $price ?? ''; ?>">
        </div>
        <div class="mb-4">
            <label class="form-label" for="category">Category</label>
            <select class="form-select" aria-label="Default select example" id="category" name="category">
                <option selected value="-1">Select</option>
                <?php
                require 'connection.php';
                $categoriessql1 = "SELECT * FROM `categories` ORDER BY `name` ASC";
                $categoriessql1_result = $conn->query($categoriessql1);
                while ($row = $categoriessql1_result->fetch_assoc()) {
                    if (isset($category)) {
                        if ($category == $row['id']) {
                            echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
                        } else {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    } else {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="subcategory">Subcategory</label>
            <select class="form-select" aria-label="Default select example" id="subcategory" name="subcategory">
                <option selected value="-1">Select</option>
                <?php
                if ($error && $category && $category != "-1") {
                    require_once "assets/classes/subcategories.php";
                    $scatrows = getSubcat($category)['records'];
                    foreach ($scatrows as $row) {
                        if (isset($subcategory)) {
                            if ($subcategory == $row['id']) {
                                echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
                            } else {
                                echo "<option value='{$row['id']}'>{$row['name']}</option>";
                            }
                        } else {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    }
                }
                ?>

            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">Division</label>
            <select class="form-select " aria-label="Default select example" id="division" name="division">
                <option selected value="-1">Select</option>
                <?php
                $selectDivision = "SELECT * FROM `division` WHERE 1";
                $selectResult = $conn->query($selectDivision);

                if ($selectResult->num_rows > 0) {                   
                    while ($row = $selectResult->fetch_assoc()) {
                        if (isset($division)) {
                            if ($division == $row['id']) {
                                echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
                            } else {
                                echo "<option value='{$row['id']}'>{$row['name']}</option>";
                            }
                        } else {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    }
                }
                ?>

            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">District</label>
            <select class="form-select " aria-label="Default select example" id="district" name="district">
                <option selected value="-1">Select</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">Area</label>
            <select class="form-select " aria-label="Default select example" id="area" name="area">
                <option selected value="-1">Select</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label" for="">Condition :</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="condition" id="condition1" value="used">
                <label class="form-check-label" for="condition1">Used</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="condition" id="condition2" value="new">
                <label class="form-check-label" for="condition2">New</label>
            </div>
        </div>
        <div class="mb-4">
            <label for="image" class="form-label">Choose Image</label>
            <input class="form-control form-control-sm" type="file" name="images[]" id="image" accept=".jpg, .jpeg, .png" multiple capture>
        </div>
        <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="checkout" name="checkout">
            <label class="form-check-label" for="checkout">Check me out</label>
        </div>

        <button type="submit" id="submitBtn" class="btn btn-dark" name="add_product">Submit</button>
    </form>
</div>

<?php include 'assets/inc/footer.php'; ?>

<script>
    $(document).ready(function() {
        //author name hide/show
        $("#newauth").hide();
        $("#newauthcheck").change(function() {
            if ($(this).prop("checked")) {
                $("#newauth").show(500);
            } else {
                $("#newauth").hide(500);
            }
        })
        //publication name hide/show
        $("#newpublications").hide();
        $("#newpublicationscheck").change(function() {
            if ($(this).prop("checked")) {
                $("#newpublications").show(500);
            } else {
                $("#newpublications").hide(500);
            }
        })

        //for category start
/*         $.getJSON("assets/classes/categories.php", function(data) {
            var category_opt = "";
            $.each(data, function(k, v) {
                category_opt += "<option value='" + v.id + "'>" + v.name + "</option>";
            });
            $("#category").append(category_opt);
        }); */
        //for category end

        //for subcategory start
        $("#category").change(function(e) {
            var selected_category = $(this).val();
            if (selected_category == "-1") {
                return;
            }
            $.getJSON("assets/classes/subcategories.php", {
                    category: selected_category,
                    rand: Math.random()
                },
                function(data) {
                    let category_opt = "";
                    if (data.result == "0") {
                        category_opt = "<option value='-1'>Select</option>";
                    } else {
                        category_opt = "<option value='-1'>Select</option>";
                        $.each(data.records, function(k, v) {
                            category_opt += "<option value='" + v.id + "'>" + v.name + "</option>";
                        });
                    }
                    $("#subcategory").html(category_opt);
                });
        });
        //for subcategory end


        //for division start
/*         $.getJSON("assets/classes/division.php", function(data) {
            var division_opt = "";
            $.each(data, function(k, v) {
                division_opt += "<option value='" + v.id + "'>" + v.name + "</option>";
            });
            $("#division").append(division_opt);
        }); */
        //for division end

        //for district start
        $("#division").change(function(e) {
            var selected_division = $(this).val();
            if (selected_division == "-1") {
                return;
            }
            $.getJSON("assets/classes/district.php", {
                    division: selected_division,
                    rand: Math.random()
                },
                function(data) {
                    let district_opt = "";
                    if (data.result == "0") {
                        district_opt = "<option value='-1'>Select</option>";
                    } else {
                        district_opt = "<option value='-1'>Select</option>";
                        $.each(data.records, function(k, v) {
                            district_opt += "<option value='" + v.id + "'>" + v.name + "</option>";
                        });
                    }
                    $("#district").html(district_opt);
                });
        });
        //for disrtict end

        //for area start
        $("#district").change(function(e) {
            var selected_district = $(this).val();
            if (selected_district == "-1") {
                return;
            }
            $.getJSON("assets/classes/area.php", {
                    district: selected_district,
                    rand: Math.random()
                },
                function(data) {
                    let area_opt = "";
                    if (data.result == "0") {
                        area_opt = "<option value='-1'>Select</option>";
                    } else {
                        area_opt = "<option value='-1'>Select</option>";
                        $.each(data.records, function(k, v) {
                            area_opt += "<option value='" + v.id + "'>" + v.name + "</option>";
                        });
                    }
                    $("#area").html(area_opt);
                });
        });
        //for area end

        //submit book info start
        $("#submitBtn").click(function() {
            //get all form values in variables
            let bookForm = document.getElementById('bookForm');
            var bookInfo = new FormData(bookForm);
            // 
            $.ajax({
                url: "classes/productAdd.php",
                type: "POST",
                data: bookInfo,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    //return;
                    //alert(data);
                    if (!data.error) {
                        alert(data.message);
                        $("#productinsertform").hide(200);
                        $("#addproductbtn").show();
                        $("#updateproductbtn").hide();
                        clearform();
                        showProducts(0);
                    } else {
                        alert(data.message);
                    }
                }
            });
            // 

        })
        //submit book info end
    });
</script>
</body>

</html>