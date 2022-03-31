<?php
if(isset($_GET['category'])){
require "../../connection.php";
$selectSubcategory = "SELECT * FROM `subcategories` WHERE `category_id`='".$_GET['category']."'";
$selectResult = $conn->query($selectSubcategory);

if($selectResult->num_rows > 0 ){
	$row = array();
	while($r = $selectResult->fetch_array(MYSQLI_ASSOC)){
		$row[] = $r;
		}
		echo json_encode(["result"=>"1","records"=>$row]);
	}
else echo json_encode(["result"=>"0"]);

}