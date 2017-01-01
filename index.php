<?php

session_start();
require_once("inc/libs/Smarty.class.php");
require_once 'inc/KLogger.php';
include "inc/connect.php";
include "inc/functions.php";
include "inc/pages.php";

$pages = selected_page($_SERVER['SCRIPT_NAME']);

//retrieve post params
if (isset($_POST['username'])) {
	$username = $_POST['username'];
}
if (isset($_POST['password'])) {
	$password = $_POST['password'];
}

if (!isset($username) || !isset($password)) {
	if (isset($_SESSION['username'])) {
		$smarty = new Smarty;
		$smarty->assign("section", "netfusion i-PBX");
		$smarty->display("header.tpl");
		$smarty->display("content.tpl");
		$smarty->display("footer.tpl");
	} else {
		$smarty = new Smarty;
		$smarty->assign("title", "netfusion IP-PBX");
		$smarty->display("login.tpl");
	}
} elseif (empty($username) || empty($password)) {

	$smarty = new Smarty;
	$smarty->assign("pages", $pages);
	$smarty->assign("title", "netfusion i-PBX");
	$smarty->assign("message", "Παρακαλώ εισάγετε τα δεδομένα");
	$smarty->display("login.tpl");
} else {
	//user validation via sql
	$sql = @postg_query("SELECT username,password,level,access_recordings from administrators where username='$username' and password='$password'", $db);
	$num_rows = pg_numrows($sql);
	$row = pg_fetch_assoc($sql);
	if ($num_rows == 0) {
		$smarty = new Smarty;
		$smarty->assign("title", "netfusion i-PBX.");
		$smarty->assign("message", "Σφάλμα αυθεντικοποίησης");
		$smarty->display("login.tpl");
	} else {
		//εδώ αν έχει τηλεφωνο να δείξω άλλα
		$_SESSION['username'] = $row['username'];
		$_SESSION['access_level'] = $row['level'];
		$_SESSION['access_recordings'] = $row['access_recordings'];
		$smarty = new Smarty;
		$smarty->assign("pages", $pages);
		$smarty->assign("section", "Διαχείρηση IP-PBX");
		$smarty->display("header.tpl");
		$smarty->display("content.tpl");
		$smarty->display("footer.tpl");
	}
}