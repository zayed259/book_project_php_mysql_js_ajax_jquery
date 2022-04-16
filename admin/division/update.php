<?php
include '../../connection.php';
if (isset($_POST['updateid'])) {
    $id = $_POST['updateid'];
    $sql = "SELECT * FROM `division` WHERE `id` = $id";
    $result = $conn->query($sql);
    $response = [];
    while ($row = $result->fetch_assoc()) {
        $response = $row;
    }
    echo json_encode($response);
}
else{
    $response['status'] = 'error';
    $response['message'] = 'No data found';
}

//update query
if (isset($_POST['hiddendata'])) {
    $uniqueid = $_POST['hiddendata'];
    $name = $_POST['updatename'];
    $sql = "UPDATE `division` SET `name` = '$name' WHERE `id` = $uniqueid";
    $result = $conn->query($sql);
}
?>