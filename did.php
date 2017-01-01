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

$pages = selected_page('/extensions.php');

if ($_GET['action'] == 'delete') {
        $trunk = (isset($_POST['trunk'])) ? $_POST['trunk']:null ;
        $did_number = (isset($_POST['did'])) ? $_POST['did']:null ;
        $log->LogInfo("Delete requested for did: $did_number on trunk $trunk ");
        $sql = sprintf("select 1 from did where trunk='%d' and did_number='%s'",$trunk,$did_number);
        $log->LogDebug("$sql");
        $result = @postg_query($sql, $db);
        $rows = pg_num_rows($result);
        if($rows  > 0 ) {
        	$log->LogInfo("DID is valid - Clearing data ");
        	$sql = sprintf("update did set type=null,data=null where trunk='%d' and did_number='%s'",$trunk,$did_number);
        	$log->LogDebug("$sql");
        	$result = @postg_query($sql, $db);
        }
		asterisk_gen_configs();
		asterisk_reload();
		restart_hylafax();
        $info = $info . 'Επιτυχής διαγραφή ';
        $log->LogInfo("Done clearing did $did_number");
}

$smarty = new Smarty;
$smarty->assign("pages", $pages);
$smarty->assign("section", "Διαχείρηση διεπιλογικών αριθμών");
$smarty->assign("section_image", "users48.png");
$smarty->assign("selected", "did_list");
$smarty->assign("info", $info);
$sql = "SELECT did_number,trunk,type,data from did order by did_number";

if(($result = @postg_query($sql, $db)) == 0){
	$log->LogError("Database error");
}

$data = array();
while( $row = pg_fetch_assoc($result)){ 
	$test = array("did_number" => $row["did_number"] , "trunk" => $row["trunk"], "type" => $row["type"], "type_data" => $row["data"]);
	$data[] = $test;
	}
	$smarty->debugging = false;
	$smarty->assign("data", $data);
        $smarty->display("header.tpl");
        $smarty->display("extensions/common.tpl");
        $smarty->display("extensions/did_list.tpl");
?>
