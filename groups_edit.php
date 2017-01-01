<?
include "inc/auth.php";
include "inc/connect.php";
include "inc/config.php";
include "inc/functions.php";
include "inc/pages.php";
require_once "inc/KLogger.php";

$log = new KLogger ( "/tmp/debug.log" , KLogger::DEBUG );

$pages = selected_page("/extensions.php");

$info = null;
$error = null;

$group_number = (isset($_POST['group_number'])) ? $_POST['group_number']:null ;
$group_name = (isset($_POST['group_name'])) ? $_POST['group_name']:null ; 
$group_member = (isset($_POST['group_member'])) ? $_POST['group_member']:null ; 
$operation = (isset($_POST['operation'])) ? $_POST['operation']:"edit" ; 


switch ($operation) {
    case 'add_member':
	$log->LogDebug("Add member $group_member requested for group $group_number");
	$sql = sprintf("select 1 from extensions where extension='%s' and ext_type='SIP' ",$group_member);
	$log->LogDebug("$sql");
	if(($result = @postg_query($sql, $db)) == 0){
		$log->LogError("Database error");
	}
	$rows= pg_num_rows($result);
	if ($rows > 0) {
		$log->LogDebug("$group_member is a vaild extension");
		$sql = sprintf("select 1 from queues where number='%s' and member='%s' ",$group_number,$group_member);
		$log->LogDebug("$sql");
		if(($result = @postg_query($sql, $db)) == 0){
			$log->LogError("Database error");
		}
		$rows= pg_num_rows($result);
		$log->LogDebug("$rows");
		if ($rows == 0) {
			$sql = sprintf("insert into queues (number,member) values ('%s','%s')",$group_number,$group_member);
			$log->LogDebug("$sql");
			if(($result = @postg_query($sql, $db)) == 0){
				$log->LogError("Database error");
			} else { 
				asterisk_gen_configs();
                asterisk_reload();
			}
		}
	} else {
		$error = $error . "To εσωτερικο " . $group_member . " δεν βρέθηκε";
	}

    break;
    case 'delete_member':
	$sql = sprintf("delete from queues where member='%s' and number='%s'",$group_member, $group_number);
	$log->LogDebug("Deleting member $group_member from group $group_number");
	if(($result = @postg_query($sql, $db)) == 0){
  	     	$log->LogError("Database error");
	} else {
		asterisk_gen_configs();
		asterisk_reload();
	}
    break;
}

$sql = sprintf("select member,extensions.name,extensions.surname from queues left join extensions on member=extensions.extension where number='%s' order by member",$group_number);

if(($result = @postg_query($sql, $db)) == 0){
	$log->LogError("Database error");
}

$data = array();
while( $row = pg_fetch_assoc($result)){
	$test = array("member" => $row["member"], "assigned_name" => $row["name"] . " " . $row["surname"]);
	$data[] = $test;
}

$log->LogInfo("New group addition requested");
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->assign("pages", $pages);
$smarty->assign("section", "Διαχείρηση ομάδων κλήσης");
$smarty->assign("section_image", "users48.png");
$smarty->assign("group_number", $group_number);
$smarty->assign("group_name", $group_name);
$smarty->assign("data", $data);
$smarty->assign("info", $info);
$smarty->assign("error", $error);
$smarty->display("header.tpl");
$smarty->display("extensions/common.tpl");
$smarty->display("extensions/groups_edit.tpl");
exit;
?>
