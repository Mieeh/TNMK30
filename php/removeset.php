<?php

session_start();

require "config.php";
include "script.php";

$SetID = $_POST["SetID"];
$UserID = $_SESSION["user_id"];

$host = $config["db"]["special_edit"]["host"];
$dbname = $config["db"]["special_edit"]["dbname"]; 
$db_username = $config["db"]["special_edit"]["username"]; 
$password =	$config["db"]["special_edit"]["password"];
 
$db = mysqli_connect($host, $db_username, $password, $dbname) or die("Failed to connect to database");

$query = "DELETE FROM users_sets WHERE users_sets.set_id = '$SetID' AND users_sets.user_id = '$UserID' LIMIT 1";
mysqli_query($db, $query);

// new set count
$_SESSION["user_set_count"] = getUserSetCount();

// Make sure we're not "overeaching" a page now that we've removed something
$page_number = $_SESSION["mypage_page"];
$max_page_number = getNumberOfPages($_SESSION['user_set_count']);
if($page_number > $max_page_number){
	$_SESSION["mypage_page"]--;
}

// Redirect back to add page
header("location:../site/mypage.php");


?>