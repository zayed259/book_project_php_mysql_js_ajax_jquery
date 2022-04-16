<?php
include '../../connection.php';
extract($_POST);
if (isset($nameSend)) {
    $sql = "INSERT INTO `division` (`name`) VALUES ('$nameSend')";
    $result = $conn->query($sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
}
?>