<?php
include '../../connection.php';
if (isset($_POST['deletesend'])) {
    $sql = "DELETE FROM `division` WHERE `id` = " . $_POST['deletesend'];
    $result = $conn->query($sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
}

?>