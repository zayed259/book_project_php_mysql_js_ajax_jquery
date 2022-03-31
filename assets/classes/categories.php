<?php
require "../../connection.php";

$selectCategories = "SELECT * FROM `categories` WHERE 1";
$selectResult = $conn->query($selectCategories);

if($selectResult->num_rows > 0 ){
	$row = array();
	while($r = $selectResult->fetch_array(MYSQLI_ASSOC)){
		$row[] = $r;
		}
		echo json_encode($row);
	}
else json_encode(["result"=>"no data found"]);