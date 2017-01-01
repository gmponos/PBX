<?
include "inc/auth.php";
include "inc/connect.php";
include "inc/config.php";
include "inc/functions.php";
include "inc/pages.php";
require_once 'inc/KLogger.php';

//$log = new KLogger ( "log.txt" , KLogger::OFF );
$log = new KLogger ( "/tmp/debug.log" , KLogger::DEBUG );

$info = null;

if ($_GET['action'] == 'delete') {
	$group = (isset($_POST['group'])) ? $_POST['group']:null ;
        $log->LogInfo("Delete requested for group: $group ");
        $sql = sprintf("delete from queues where number='%d'",$group);
        $log->LogDebug("$sql ");
        $result = @postg_query($sql, $db);
        $sql = sprintf("delete from extensions where extension='%d'",$group);
        $log->LogDebug("$sql ");
        $result = @postg_query($sql, $db);
        $sql = sprintf("update did set type='',data='' where type='group' and data='%d'",$group);
        $log->LogDebug("$sql ");
        $result = @postg_query($sql, $db);
		$info = $info . 'Επιτυχής διαγραφή';
        $log->LogInfo("Done deleting group $group");
		asterisk_gen_configs();
        asterisk_reload();
}

$pages = selected_page(extensiosn.php);

$smarty = new Smarty;
$smarty->assign("pages", $pages);
$smarty->assign("section", "Διαχείρηση Ομάδων κλήσεων");
$smarty->assign("section_image", "users48.png");
$smarty->assign("selected", "groups_list");
$smarty->assign("info", $info);
$sql = "SELECT name,extension,call_recording FROM extensions WHERE ext_type='QUEUE' order by extension;";

if(($result = @postg_query($sql, $db)) == 0){
	$log->LogError("Database error");
}

while( $row = pg_fetch_assoc($result)){ 
		$sql2 = sprintf("select member,extensions.name,extensions.surname from queues left join extensions on member=extensions.extension where number='%s' order by member",$row["extension"]);
		$member_result = @postg_query($sql2, $db);
		while( $row2 = pg_fetch_assoc($member_result)){
			$test2[] = array($row["extension"] => $row2["member"] . " (" . $row2["name"] . " " . $row2["surname"] . ")");
		}
		$test[] = array("group_name" => $row["name"], "group_number" => $row["extension"], "call_recording" => $row["call_recording"], "members" => $test2);
		$test2= '';
		$log->LogDebug("$sql2");
		$data = $test;
	}
	$smarty->debugging = false;
	$smarty->assign("data", $data);
	$smarty->assign("members_data", $members_data);
	$smarty->assign("info", $info);
        $smarty->display("header.tpl");
        $smarty->display("extensions/common.tpl");
        $smarty->display("extensions/groups_list.tpl");
?>
