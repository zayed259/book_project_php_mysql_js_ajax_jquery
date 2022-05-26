<?php
include '../../connection.php';
if (isset($_POST['deletesend'])) {
    // $sql = "DELETE FROM `bookposts` WHERE `id` = " . $_POST['deletesend'];
    //soft delete query
    $sql = "UPDATE `bookposts` SET `deleted` = CURRENT_TIMESTAMP WHERE `id` = " . $_POST['deletesend'];
    $result = $conn->query($sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
}

?>