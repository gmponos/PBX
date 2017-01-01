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

$did_number = (isset($_POST['did_number'])) ? $_POST['did_number']:null ;
$trunk = (isset($_POST['trunk'])) ? $_POST['trunk']:null ;
$type= (isset($_POST['type'])) ? $_POST['type']:null ;
$type_data = (isset($_POST['type_data'])) ? $_POST['type_data']:null ;

$operation = (isset($_POST['operation'])) ? $_POST['operation']:null ;

$log->LogInfo("$operation requested for DID: $did_number on trunk: $trunk assigned as $type $type_data");

//fetch the available extensions from the DB
$sql = "SELECT extension FROM extensions order by extension";
$result = @postg_query($sql, $db);
if($result){
        $data = array();
        while($row = pg_fetch_assoc($result)){
                        $tmp[]=array("extension" =>"$row[extension]");
                }
        }
$extensions = $tmp;

switch ($operation) {
	case 'edit':
		$smarty = new Smarty;
                $smarty->assign("pages", $pages);
                $smarty->assign("section", "Διαχείρηση Διεπιλογικών αριθμών");
                $smarty->assign("section_image", "users48.png");
                $smarty->debugging = false;
                $smarty->assign("extensions", $extensions);
                $smarty->assign("did_number", $did_number);
                $smarty->assign("trunk", $trunk);
                $smarty->assign("type", $type);
                $smarty->assign("type_data", $type_data);
                $smarty->display("header.tpl");
                $smarty->display("extensions/common.tpl");
                $smarty->display("extensions/did_edit.tpl");
                exit;
break;
	case 'update':
		if($type == 'extension'){
			if(ereg('[^0-9]',$type_data)){
                		$error =$error . "Λάθος εσωτερικός Αριθμός<br>";
			} else {
				$sql = sprintf("SELECT 1 FROM extensions where extension='%d' and ext_type='SIP'",$type_data);
				$result = pg_numrows(@postg_query($sql, $db));
				
				if($result > 0){
					$log->LogInfo("Validation ok for ext:$type_data");
					$sql = sprintf("UPDATE did set type='extension',data='%d' where trunk='%s' and did_number='%s'",$type_data,$trunk,$did_number);
					$result = @postg_query($sql, $db);
					asterisk_gen_configs();
					asterisk_reload();
				} else{
                			$error =$error . "Το εσωτερικό " . $type_data . " δεν υπάρχει<br>";
				}
			}
		}

		if($type == 'group'){
			if(ereg('[^0-9]',$type_data)){
                		$error =$error . "Λάθος αριθμός group<br>";
			} else {
				$sql = sprintf("SELECT 1 FROM queues where number='%d'",$type_data);
				$log->LogInfo("$sql");
				$result = pg_numrows(@postg_query($sql, $db));
				
				if($result > 0){
					$log->LogInfo("Validation ok for group:$type_data");
					$sql = sprintf("UPDATE did set type='group',data='%d' where trunk='%s' and did_number='%s'",$type_data,$trunk,$did_number);
					$log->LogInfo("$sql");
					$result = @postg_query($sql, $db);
					asterisk_gen_configs();
					asterisk_reload();
				} else{
                			$error =$error . "Η ομάδα " . $type_data . " δεν έχει μέλη. Προσθέστε μελη και προσπαθήστε ξανά...<br>";
				}
			}
		}
		
		
		if($type == 'fax'){
			if(!ereg('^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$', $type_data)){	
                	$error =$error . "Λάθος διεύθηνση mail<br>";
			} else {
					$log->LogInfo("Validation ok for mail:$type_data");
					$sql = sprintf("UPDATE did set type='fax',data='%s' where trunk='%s' and did_number='%s'",$type_data,$trunk,$did_number);
					$log->LogInfo("$sql");
					$result = @postg_query($sql, $db);
					asterisk_gen_configs();
					asterisk_reload();
					restart_hylafax();
					}
		}

		if (strlen($error) != 0){
			$smarty = new Smarty;
		       	$smarty->assign("pages", $pages);
                	$smarty->assign("section", "Διαχείρηση Διεπιλογικών αριθμών");
		       	$smarty->assign("section_image", "users48.png");
		       	$smarty->debugging = false;
                	$smarty->assign("error", $error);
	               	$smarty->assign("extensions", $extensions);
		        $smarty->assign("did_number", $did_number);
                	$smarty->assign("trunk", $trunk);
		       	$smarty->assign("type", $type);
	               	$smarty->assign("type_data", $type_data);
		        $smarty->display("header.tpl");
                	$smarty->display("extensions/common.tpl");
		       	$smarty->display("extensions/did_edit.tpl");
                	exit;
		} else {
			header("Location: did.php");
		}
break;
}
?>
