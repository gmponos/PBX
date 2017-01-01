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

$extension = (isset($_POST['extension'])) ? $_POST['extension']:null ;
$target = (isset($_POST['target'])) ? $_POST['target']:null ;
$condition= (isset($_POST['condition'])) ? $_POST['condition']:null ;
$timeout = (isset($_POST['timeout'])) ? $_POST['timeout']:null ;

if($_POST['delete'] == 'delete' || $_POST['delete'] == "Διαγραφή" ) {
	$log->LogInfo("Deleting fwd for $extension");
	$sql = sprintf("DELETE from forwardings where extension='%s'",$extension);
	$log->LogInfo("$sql");
	$result = pg_numrows(@postg_query($sql, $db));
	header("Location: extensions.php");
	exit;
}

$operation = (isset($_POST['operation'])) ? $_POST['operation']:null ;

$log->LogInfo("$operation forwarding requested for extension: $extension");

switch ($operation) {
	case 'edit':
		$smarty = new Smarty;
                $smarty->assign("pages", $pages);
                $smarty->assign("section", "Διαχείρηση εκτροπής");
                $smarty->assign("section_image", "users48.png");
                $smarty->debugging = false;
                $smarty->assign("extension", $extension);
                $smarty->assign("target", $target);
                $smarty->assign("condition", $condition);
                $smarty->assign("timeout", $timeout);
                $smarty->display("header.tpl");
                $smarty->display("extensions/common.tpl");
                $smarty->display("extensions/forwardings.tpl");
                exit;
break;
	case 'update':
		if(ereg('[^0-9]',$target) || $extension == $target || $target == '' ){
                	$error =$error . "Λάθος παραμέτρων<br>";
		} else {
		       /* $sql = sprintf("SELECT 1 FROM extensions where extension='%d'",$target);
			$log->LogInfo("$sql");
			$result = pg_numrows(@postg_query($sql, $db));
				
			if($result > 0){
			$log->LogInfo("target validation ok for ext: $target");
			*/
			$sql = sprintf("SELECT 1 FROM forwardings where extension='%d'",$extension);
			$result = pg_numrows(@postg_query($sql, $db));
				if($result > 0){
					if ($timeout < 5 || $timeout == '') 
						$timeout=5;
					$sql = sprintf("UPDATE forwardings set target='%s',condition='%s',timeout='%d' where extension='%s'",$target,$condition,$timeout,$extension);
					$log->LogInfo("$sql");
					$result = pg_numrows(@postg_query($sql, $db));
				} else {
					$sql = sprintf("INSERT into forwardings values('%s','%s','%s','%d')",$extension,$condition,$target,timeout);
					$log->LogInfo("$sql");
					$result = @postg_query($sql, $db);
				}
			/*} else{
                		$error =$error . "Το εσωτερικό " . $type_data . " δεν υπάρχει<br>";
			}
			*/
		}

		if (strlen($error) != 0){
			$smarty = new Smarty;
		       	$smarty->assign("pages", $pages);
                	$smarty->assign("section", "Διαχείρηση εκτροπής");
		       	$smarty->assign("section_image", "users48.png");
                	$smarty->debugging = false;
                	$smarty->assign("extension", $extension);
               		$smarty->assign("target", $target);
                	$smarty->assign("condition", $condition);
                	$smarty->assign("timeout", $timeout);
                	$smarty->assign("error", $error);
		        $smarty->display("header.tpl");
                	$smarty->display("extensions/common.tpl");
                	$smarty->display("extensions/forwardings.tpl");
                	exit;
		} else {
			header("Location: extensions.php");
		}
break;
}
?>
