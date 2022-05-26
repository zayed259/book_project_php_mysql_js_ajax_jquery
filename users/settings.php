<?php
require "../configuration.php";
$page = "Settings";
require "partial/header.php";
$user_mobile = $_SESSION['user_mobile'];
$user_id = $_SESSION['user_id'];

if (isset($_POST['save_profile'])) {
    require '../connection.php';
    $full_name = $conn->escape_string($_POST['fullName']);
    $mobile_number = $conn->escape_string($_POST['mobileNumber']);
    $division = $conn->escape_string($_POST['division']);
    $district = $conn->escape_string($_POST['district']);
    $area = $conn->escape_string($_POST['area']);
    $email = $conn->escape_string($_POST['email']);
    $website = $conn->escape_string($_POST['website']);
    $facebook = $conn->escape_string($_POST['facebook']);
    $twitter = $conn->escape_string($_POST['twitter']);
    $linkedin = $conn->escape_string($_POST['linkedin']);
    $education = $conn->escape_string($_POST['education']);
    $designation = $conn->escape_string($_POST['designation']);
    $details = $conn->escape_string($_POST['details']);

    $images = $_FILES['images'];
    $images_name = $images['name'];
    $images_tmp = $images['tmp_name'];

    $imagesArr = [];
    if (!$error) {
        for ($i = 0; $i < count($images_name); $i++) {
            $iname = strtolower($images_name[$i]);
            $images_ext = explode('.', $iname);
            $iext = strtolower(end($images_ext));
            $images_new_name = $user_mobile . '_profile.' . $iext;
            $images_destination = '../assets/upload_images' . $images_new_name;
            if (move_uploaded_file($images_tmp[$i], $images_destination)) {
                array_push($imagesArr, $images_new_name);
            }
        }
        $images = implode(',', $imagesArr);
    }
    $updateQuery = "UPDATE `users_profile` SET `user_id` = '$user_id', `division_id` = '$division', `district_id` = '$district', `area_id` = '$area', `email` = '$email', `website` = '$website', `facebook` = '$facebook', `twitter` = '$twitter', `linkedin` = '$linkedin', `education` = '$education', `job_designation` = '$designation', `profile_image` = '$images', `details` = '$details' WHERE `user_id` = '$user_id'";
    $conn->query($updateQuery);
    if ($conn->affected_rows > 0) {
        $message = "Profile Updated Successfully";
    } else {
        $message = "Error";
    }

}

?>
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../assets/images/SZH_3113.jpg"><span class="font-weight-bold">SYED ZAYED HOSSAIN</span><span class="text-black-50">zayedbd24@gmail.com</span><span> </span></div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <label class="labels" for="fullName">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter Full Name" id="fullName" name="fullName" value="">
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="mobileNumber">Mobile Number</label>
                            <input type="text" class="form-control" placeholder="Enter Mobile Number" id="mobileNumber" name="mobileNumber" value="">
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="">Division</label>
                            <select class="form-select" aria-label="Default select example" id="division" name="division">
                                <option selected value="-1">Select</option>
                                <?php
                                $selectDivision = "SELECT * FROM `division` WHERE 1";
                                $selectResult = $conn->query($selectDivision);
                                if ($selectResult->num_rows > 0) {
                                    while ($row = $selectResult->fetch_assoc()) {
                                        $division_id = $row['division_id'];
                                        $division_name = $row['division_name'];
                                        echo "<option value='".$division_id."'>".$division_name."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="">District</label>
                            <select class="form-select " aria-label="Default select example" id="district" name="district">
                                <option selected value="-1">Select</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="">Area</label>
                            <select class="form-select " aria-label="Default select example" id="area" name="area">
                                <option selected value="-1">Select</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="email">Email ID</label>
                            <input type="text" class="form-control" placeholder="Ex: zayedbd24@gmail.com" id="email" name="email" value="">
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="website">Website</label>
                            <input type="text" class="form-control" placeholder="Ex: http://isdbstudents.com/" id="website" name="website" value="">
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="facebook">Facebook</label>
                            <input type="text" class="form-control" placeholder="Ex: https://www.facebook.com/zayed259" id="facebook" name="facebook" value="">
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="twitter">Twitter</label>
                            <input type="text" class="form-control" placeholder="Ex: https://twitter.com/Zayed259" id="twitter" name="twitter" value="">
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="linkedin">Linkedin</label>
                            <input type="text" class="form-control" placeholder="Ex: https://www.linkedin.com/in/zayed259/" id="linkedin" name="linkedin" value="">
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="education">Education</label>
                            <input type="text" class="form-control" placeholder="Education" id="education" name="education" value="">
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="designation">Job Designation</label>
                            <input type="text" class="form-control" placeholder="Designation" id="designation" name="designation" value="">
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="details">Details</label>
                            <textarea name="details" id="details" rows="5" class="form-control"><?php ?></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label class="labels" for="image">Profile Picture</label>
                            <input class="form-control" type="file" name="images" id="image" accept=".jpg, .jpeg, .png" capture>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="button" name="save_profile">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>
<?php require "partial/footer.php" ?>
</body>

</html>