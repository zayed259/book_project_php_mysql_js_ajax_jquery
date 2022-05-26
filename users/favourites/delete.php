<?php
include '../../connection.php';
if (isset($_POST['deletesend'])) {
    $sql = "DELETE FROM `fav` WHERE `bookpost_id` = " . $_POST['deletesend'];
    $result = $conn->query($sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
}

?>