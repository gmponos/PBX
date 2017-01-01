<?
include "inc/auth.php";
include "inc/connect.php";
include "inc/config.php";
include "inc/functions.php";
include "inc/pages.php";
require_once "inc/KLogger.php";

$log = new KLogger ( "/tmp/debug.log" , KLogger::DEBUG );

$info = null;
$error = null;

$group_number = (isset($_POST['group_number'])) ? $_POST['group_number']:null ;
$group_name = (isset($_POST['group_name'])) ? $_POST['group_name']:null ; 
$rec = (isset($_POST['call_recording'])) ? $_POST['call_recording']:'null' ; 

$log->LogInfo("New group addition requested $group_number $group_name");

if(isset($_POST['group_number'])){
	if(ereg('[^0-9]',$group_number)) {
		$error =$error . "Λάθος αριθμός ομάδας<br>";
	}
	if(strlen($group_number) == 0 ){
		$error =$error . "Δεν επιτρέπεται κενός αριθμός ομάδας<br>";
	} 
	if(strlen($error) == 0 ){
		$sql = sprintf("select extension from extensions where extension='%s'",$group_number);
		$log->LogDebug("$sql");
		$result = @postg_query($sql, $db);
		if($result){
			$rows=pg_num_rows($result);
        	if($rows  > 0) {
				$error = $error . "Ο εσωτερικός αριθμός δεν είναι διαθέσιμος<br>";
			} else {
				$sql = sprintf("insert into extensions (extension,name,ext_type,call_recording) values ('%s','%s','QUEUE','%s')",$group_number,$group_name,$rec);
				$result = @postg_query($sql, $db);
				$log->LogDebug("$sql");
				$info = $info . "H ομάδα " . $group_name . " προστέθηκε <br>";
			}
		}
	}
}
	
$smarty = new Smarty;
$smarty->assign("pages", $pages);
$smarty->assign("section", "Διαχείρηση ομάδων κλήσης");
$smarty->assign("section_image", "users48.png");
$smarty->debugging = false;
$smarty->assign("group_number", $group_number);
$smarty->assign("group_name", $group_name);
$smarty->assign("info", $info);
$smarty->assign("error", $error);
$smarty->display("header.tpl");
$smarty->display("extensions/common.tpl");
if ((isset($_POST['group_number'])) && strlen($error) == 0) {
	$smarty->display("extensions/groups_edit.tpl");
} else {
	$smarty->display("extensions/groups_add.tpl");
}

?>
