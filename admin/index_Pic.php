<?php
include 'index_theconnect.php';

if ($_GET['SocialPic']) {
	$SocialSelect = "SELECT SocialPic FROM Social WHERE SocialID = '".$_GET["SocialPic"]."' ";
	$SocialQuery = mysql_query($SocialSelect);
	$SocialData = mysql_fetch_array($SocialQuery);
	echo $SocialData["SocialPic"];
}

if ($_GET['PhotoMoreID']) {
	$PhotoMoreSelect = "SELECT PhotoMoreFile FROM PhotoMore WHERE PhotoMoreID = '".$_GET["PhotoMoreID"]."' ";
	$PhotoMoreQuery = mysql_query($PhotoMoreSelect);
	$PhotoMoreData = mysql_fetch_array($PhotoMoreQuery);
	echo $PhotoMoreData["PhotoMoreFile"];
}

?>
