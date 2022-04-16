<?php
require "configuration.php";

$conn = new mysqli($sitename, $username, $password, $database) or die("Connection failed: " . $conn->connect_error);
$conn->set_charset("utf8");
