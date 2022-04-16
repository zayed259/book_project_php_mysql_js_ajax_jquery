<?php
function conn(){
global $sitename;
global $username;
global $password;
global $database;

$conn = new mysqli($sitename, $username, $password, $database) or die("Connection failed: " . $conn->connect_error);
$conn->set_charset("utf8");
return $conn;
}
if (!function_exists('sayHello')) {
    function sayHello()
    {
        return 'Hello!';
    }
}

if (!function_exists('sq')) {
function sq($n){
    return $n*$n;
}
}

if (!function_exists('hello')) {
function hello(){
    return "Hello World";
}
}

if (!function_exists('HumanTime')) {
function HumanTime($date){
    $date2 = date("Y-m-d H:i:s");
    $diff = abs(strtotime($date2) - strtotime($date));
    $years = floor($diff / (365 * 60 * 60 * 24));
    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
    $minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
    $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));
    $difference = $years . " years, " . $months . " months, " . $days . " days, " . $hours . " hours, " . $minutes . " minutes, " . $seconds . " seconds";
    if ($years == 0 && $months == 0 && $days == 0 && $hours == 0 && $minutes == 0 && $seconds == 0) {
        $difference = "Just Now";
    } elseif ($years == 0 && $months == 0 && $days == 0 && $hours == 0 && $minutes == 0) {
        $difference = $seconds . " seconds ago";
    } elseif ($years == 0 && $months == 0 && $days == 0 && $hours == 0) {
        $difference = $minutes . " minutes ago";
    } elseif ($years == 0 && $months == 0 && $days == 0) {
        $difference = $hours . " hours ago";
    } elseif ($years == 0 && $months == 0) {
        $difference = $days . " days ago";
    } elseif ($years == 0) {
        $difference = $months . " months ago";
    } else {
        $difference = $years . " years ago";
    }
    return $difference;
}
}


function getCatSubcatName($subcatid){
    $conn = conn();
    $q = "select categories.id as cid ,categories.name as cname, subcategories.id as scid, subcategories.name as scname from categories,subcategories where categories.id = subcategories.category_id and subcategories.id = $subcatid";
    $result = $conn->query($q);
    return $result;
}
