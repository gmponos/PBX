<?
include "inc/auth.php";
include "inc/connect.php";
include "inc/config.php";
include "inc/functions.php";
include "inc/pages.php";

$pages = selected_page("/users.php");

$info= null;
$error= null;
$got_device='';

$sql = "SELECT dev_model_id,model_name,max_lines FROM device_models order by model_name";
$result = @postg_query($sql, $db);
if($result){
	$data = array();
	$tmp[]=array("device" =>"Χωρίς συσκευή", "model_id"=>"0-0");
	while($row = pg_fetch_assoc($result)){
		$device_lines=$row['max_lines'];
		for ($i=1; $i <= $device_lines ; $i++) {
			$tmp[]=array("device" =>"$row[model_name]" . " - Γραμμή: " . "$i", "model_id"=>"$row[dev_model_id]" . "-" ."$i");
		}
	}
}
$data = $tmp;

if (!$_POST){
	$done = 0;
	$smarty = new Smarty;
	$smarty->assign("pages", $pages);
	$smarty->assign("section", "Διαχείρηση Χρηστών");
	$smarty->assign("section_image", "users48.png");
	$smarty->debugging = false;
	$smarty->assign("data", $data);
	$smarty->assign("info", $info);
	$smarty->assign("pages", $pages);
	$smarty->assign("selected", "add");
	$smarty->display("users/header.tpl");
	$smarty->display("users/add.tpl");
} 
else{
	//done flag in order to check validation
	$done = 1;

	//check if the extension already exists
	if (isset($_POST['extension'])){
		$sql =sprintf("SELECT 1 from extensions where extension='%s'",$_POST['extension']);
		$result = @postg_query($sql, $db);
		$rows = pg_num_rows($result);
		if(!$rows == 0) {
			$error = $error . "Ο εσωτερικός αριθμός " . $_POST['extension'] . " δεν είναι διαθέσιμος <br>";
			$done = 0;
		}
	}

	If ($_POST['device'] != "0-0"){
	$got_device = 1;
		if (preg_match('/^[A-Fa-f0-9]{12}$/i', $_POST['device_mac'])){
		$done=1;
		} 
		else {
			$error =$error . "Λάθος Mac <br>" . $_POST['device_mac'];
			$done=0;
		}
	}
	if(ereg('[^0-9]',$_POST['extension'])){
		$error =$error . "Λάθος εσωτερικός Αριθμός<br>";
		$done=0;
	}
	if (strlen($_POST['extension']) == 0){
		$error =$error . "Ο εσωτερικός αριθμός δεν μπορεί να είναι κενός<br>";
		$done=0;
	}
	if (strlen($_POST['extension']) > 4){
		$error =$error . "Ο εσωτερικός αριθμός δεν μπορεί να είναι τόσα ψηφία<br>";
        	$done=0;
        } 
	if(strlen($_POST['cid']) > 16 ){
		$error =$error . "Πολύ μεγάλο CID<br>";
		$done=0;
	}
	if (ereg('[^A-Za-z0-9. ]', $_POST['cid'])){
		$error =$error . "CID - Μόνο Αγγλικοί χαρακτήρες<br>";
		$done=0;
	}
	if(strlen($_POST['password']) > 14){
		$error =$error . "Πολύ μεγάλος κωδικός πρόσβασης<br>";
		$done=0;
	}
	if (strlen($_POST['password']) < 1){
        	$error =$error . "Ο κωδικός πρόσβασης δεν μπορεί να είναι κενός<br>";
		$done=0;
        }
	if(ereg('[^0-9]',$_POST['password'])){
		$error =$error . "Ο κωδικός χρήστη πρέπει να είναι μόνο αριθμοί <br>";
		$done=0;
	}

	//check if the extension already exists
	$sql =sprintf("SELECT 1 from extensions where extension=%d",$_POST['extension']);
	$result = @postg_query($sql, $db);
	if ($result) {
		$rows=pg_num_rows($result);
		if($rows > 0) {
			$error = $error . "Ο εσωτερικός αριθμός " . $_POST['extension'] . " δεν είναι διαθέσιμος <br>";
		}
	}

	//check if the mac/line is associated with another device
	if ($got_device == 1){
		$tmp = (isset($_POST['device'])) ? explode("-",$_POST['device']): "0-0";
		$myline = $tmp[1];
		$sql =sprintf("select extension from extensions where mac_address='%s' and line='%d'",$_POST['device_mac'],$myline);
 		$result = @postg_query($sql, $db);
		if($result){
			$rows=pg_num_rows($result);
			if($rows  > 0) {
				while($row = pg_fetch_assoc($result)){
					$ext_exists = $row['extension'];
        			}
			$error = $error . "Η γραμμή αυτή έχει δωθεί στο εσωτερικό " .$ext_exists . "<br>";
			$done = 0;
			}
		}	
	}		
	//done validating

	if ($done == 1){
		if ($got_device == 1){
			//get the db model id for the posted device, in order to write it to the db
			$tmp = (isset($_POST['device'])) ? explode("-",$_POST['device']): "0-0";
			$mymodelid = $tmp[0];
			$uppermac = strtoupper($_POST['device_mac']);
		} else {
			$uppermac = "";
			$mymodelid = "0";
			$myline = "0";
		}
		$sql = sprintf("INSERT into extensions (extension, password, name, surname, CallerID, email, mac_address, model_id,line) values ('%s','%s','%s','%s','%s','%s','%s','%d','%d')",$_POST['extension'],$_POST['password'],$_POST['name'],$_POST['surname'],$_POST['cid'],$_POST['email'],$uppermac,$mymodelid,$myline);
		$result = @postg_query($sql, $db);
		//asterisk_gen_configs();
		//asterisk_reload();
		//start with device provisioning
		$info= $info . $sql . "Επιτυχής εγγραφή";

		$smarty = new Smarty;
		$smarty->assign("pages", $pages);
		$smarty->assign("section", "Διαχείρηση Χρηστών");
		$smarty->assign("section_image", "users48.png");
		$smarty->assign("selected", "add");
		$smarty->debugging=false;
		$smarty->assign("info", $info);
		$smarty->assign("data", $data);
		$smarty->display("users/header.tpl");
	        $smarty->display("users/add.tpl");
	} else { 
		$smarty = new Smarty;
		$smarty->assign("pages", $pages);
		$smarty->assign("section", "Διαχείρηση Χρηστών");
		$smarty->assign("section_image", "users48.png");
		$smarty->assign("selected", "add");
		$smarty->debugging=true;
		$smarty->assign("data", $data);
		$smarty->assign("device_mac", $_POST['device_mac']);
		$smarty->assign("extension", $_POST['extension']);
		$smarty->assign("name", $_POST['name']);
		$smarty->assign("surname", $_POST['surname']);
		$smarty->assign("password", $_POST['password']);
		$smarty->assign("device", $_POST['device']);
		$smarty->assign("email", $_POST['email']);
		$smarty->assign("cid", $_POST['cid']);
		$smarty->assign("error", $error);
		$smarty->display("users/header.tpl");
	 	$smarty->display("users/add.tpl");
	}
}
?>
