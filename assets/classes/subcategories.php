<?php

if(isset($_GET['category'])){
	require "../../connection.php";
	$rows = getSubcat($_GET['category']);
echo json_encode($rows);
}
function getSubcat($catId){
	global $conn;
	$selectSubcategory = "SELECT * FROM `subcategories` WHERE `category_id`='".$catId."'";
	$selectResult = $conn->query($selectSubcategory);
	if($selectResult->num_rows > 0 ){
		$row = array();
		while($r = $selectResult->fetch_array(MYSQLI_ASSOC)){
			$row[] = $r;
			}
			//$conn->close();
			return ["result"=>"1","records"=>$row];
		}
	else return ["result"=>"0"];	
	}
