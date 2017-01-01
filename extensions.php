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
	$edit_id = (isset($_POST['id'])) ? $_POST['id']:null ;
        $log->LogInfo("Delete requested for id: $edit_id ");
        $sql = sprintf("select extension, mac_address from extensions where user_id='%d'",$edit_id);
        $result = @postg_query($sql, $db);
        $rows = pg_num_rows($result);
        if($rows  > 0 ) {
                while($row = pg_fetch_assoc($result)){
			$exttmp = $row['extension'];
        		$log->LogInfo("Deleting extension: $exttmp");
                        $mac2delete =  $row['mac_address'];
                }
                if ($mac2delete != ''){
                        $log->LogInfo("UnProvisioning $mac2delete");
                        $tmp = deviceUnProvision($mac2delete);
                }
                $sql = sprintf("delete from extensions where user_id='%d'",$edit_id);
                $result = @postg_query($sql, $db);
                $check1 = pg_affected_rows($result);
                if ($check1 == '1'){
                        $log->LogInfo("Deleting pickup groups");
                        $sql = sprintf("delete from pickupgroups where extension_id='%d'",$edit_id);
                        $result = @postg_query($sql, $db);
                        $log->LogInfo("Deleting dids for $exttmp");
                        $sql = sprintf("update did set type=null,data=null where type='extension' and data='%s'",$exttmp);
                        $result = @postg_query($sql, $db);
                        $log->LogInfo("Deleting forwardings for $exttmp");
                        $sql = sprintf("delete from forwardings where extension='%s'",$exttmp);
                        $result = @postg_query($sql, $db);
                        $log->LogInfo("Deleting forwardings for $exttmp");
			$sql = sprintf("delete from queues where member='%s'",$exttmp);
                        $result = @postg_query($sql, $db);
			asterisk_gen_configs();
			asterisk_reload();
                }
                if ($tmp == '2'){
                        $log->LogDebug("ReProvisioning $mac2delete");
                        deviceProvision($mac2delete);
                }
        }
	$info = $info . 'Επιτυχής διαγραφή ';
        $log->LogDebug("Done deleting extension $exttmp");
}

$pages = selected_page($_SERVER['SCRIPT_NAME']);

$smarty = new Smarty;
$smarty->assign("pages", $pages);
$smarty->assign("section", "Διαχείρηση Εσωτερικών");
$smarty->assign("section_image", "users48.png");
$smarty->assign("selected", "extensions_list");
$smarty->assign("info", $info);
$sql = "SELECT extensions.name,extensions.surname,extensions.extension,device_models.model_name,extensions.line,extensions.mac_address,";
$sql = $sql . " extensions.callerid,extensions.email,extensions.user_id,extensions.ext_type,contexts.context_description,groups.group_description,";
$sql = $sql . " forwardings.target,forwardings.condition,forwardings.timeout";
$sql = $sql . " FROM extensions LEFT JOIN device_models ON device_models.dev_model_id=extensions.model_id ";
$sql = $sql . " LEFT JOIN contexts ON contexts.context_id=extensions.context";
$sql = $sql . " LEFT JOIN groups ON groups.callgroup=extensions.call_group";
$sql = $sql . " LEFT JOIN forwardings ON forwardings.extension=extensions.extension";
$sql = $sql . " WHERE extensions.ext_type='SIP' order by extensions.extension;";
$totalsql = "SELECT count(*) AS total FROM extensions WHERE extensions.ext_type='SIP'";

if(($result = @postg_query($sql, $db)) == 0){
	$log->LogError("Database error");
}

$data = array();
while( $row = pg_fetch_assoc($result)){ 
	$test = array("name" => $row["name"] . " " .$row["surname"], "extension" => $row["extension"], "CallerID" => $row["callerid"], "device" => $row["model_name"], "mac" => $row["mac_address"], "email" => $row["email"], "context" => $row["context_description"], "group" => $row["group_description"],"user_id" => $row["user_id"], "fwd_target" => $row["target"],"fwd_condition" => $row["condition"], "fwd_timeout" => $row["timeout"] );
	$data[] = $test;
	}
	$t_result = @postg_query($totalsql, $db);
	$t_row = pg_fetch_assoc($t_result);
        $total_records = $t_row['total'];
	$num_rows = $total_records;
	$smarty->debugging = false;
	$smarty->assign("data", $data);
	$smarty->assign("info", $info);
	$smarty->assign("records", $num_rows);
        $smarty->display("header.tpl");
        $smarty->display("extensions/common.tpl");
        $smarty->display("extensions/list.tpl");
?>
