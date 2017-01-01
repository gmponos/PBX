<?

include "inc/auth.php";
include "inc/connect.php";
include "inc/config.php";
include "inc/functions.php";
include "inc/pages.php";
require_once "inc/KLogger.php";

$log = new KLogger("/tmp/debug.log", KLogger::DEBUG);

$pages = selected_page("/extensions.php");

$info = null;
$error = null;
$new_line = null;
$new_modelid = null;
$device = null;

//fetch the devices from the DB
$sql = "SELECT dev_model_id,model_name,max_lines FROM device_models order by model_name";
$result = @postg_query($sql, $db);
if ($result) {
	$data = array();
	$tmp[] = array("device" => "Χωρίς συσκευή", "model_id" => "0-0");
	while($row = pg_fetch_assoc($result)) {
		$device_lines = $row['max_lines'];
		for ($i = 1; $i <= $device_lines; $i++) {
			$tmp[] = array("device" => "$row[model_name]" . " - Γραμμή: " . "$i", "model_id" => "$row[dev_model_id]" . "-" . "$i");
		}
	}
}

$data = $tmp;

//fetch the contexts
$sql = "SELECT context_id,context_description FROM contexts order by context_id";
$result = @postg_query($sql, $db);
if ($result) {
	$contexts = array();
	while($row = pg_fetch_assoc($result)) {
		$contexts[] = array("context_id" => $row['context_id'], "context_description" => $row['context_description']);
	}
}

//if we have an ID in post we are in edit mode.
$edit_id = (isset($_POST['id'])) ? $_POST['id'] : null;
$operation = 'add';

if (isset($edit_id)) {
	$operation = 'edit';
}

//fetch the groups
$sql = "SELECT callgroup,group_description FROM groups ";
$result = @postg_query($sql, $db);
if ($result) {
	$groups[] = array("callgroup" => "-1", "group_description" => "Κανένα", "is_pickgroup" => "0");
	while($row = pg_fetch_assoc($result)) {
		$is_pickupgroup = 0;
		if ($operation == 'edit') {
			$sql_2 = sprintf("SELECT 1 from pickupgroups where callgroup_id='%s' and extension_id='%s'", $row['callgroup'], $edit_id);
			$result_2 = @postg_query($sql_2, $db);
			$rows = pg_num_rows($result_2);
			if ($rows > 0) {
				$is_pickupgroup = 1;
			}
		}
		$groups[] = array("callgroup" => $row['callgroup'], "group_description" => $row['group_description'], "is_pickgroup" => $is_pickupgroup);
	}
}

if ($_POST['delete'] == 'delete' || $_POST['delete'] == "Διαγραφή") {
	$operation = 'delete';
}

//first chech if parameters exist from post
//if we are in add show form else get them from the db

$newpassword = passgen();

$extension = (isset($_POST['extension'])) ? $_POST['extension'] : null;
$password = (isset($_POST['password'])) ? $_POST['password'] : $newpassword;
$pin = (isset($_POST['pin'])) ? $_POST['pin'] : "1234";
$name = (isset($_POST['name'])) ? $_POST['name'] : null;
$surname = (isset($_POST['surname'])) ? $_POST['surname'] : null;
$cid = (isset($_POST['cid'])) ? $_POST['cid'] : null;
$email = (isset($_POST['cid'])) ? $_POST['email'] : null;
$extension_context = (isset($_POST['extension_context'])) ? $_POST['extension_context'] : "1";
$extension_group = (isset($_POST['extension_group'])) ? $_POST['extension_group'] : "-1";
$device = (isset($_POST['device'])) ? $_POST['device'] : "0-0";
$device_mac = (isset($_POST['device_mac'])) ? $_POST['device_mac'] : null;
$cw = (isset($_POST['cw'])) ? $_POST['cw'] : "t";
$call_recording = (isset($_POST['call_recording'])) ? $_POST['call_recording'] : "t";
$gen_config = (isset($_POST['gen_config'])) ? $_POST['gen_config'] : "t";

switch ($operation) {
	case 'add':
		$log->LogInfo("Extension ADD requested");
		if (!isset($_POST['extension'])) {
			$smarty = new Smarty;
			$smarty->assign("pages", $pages);
			$smarty->assign("section", "Διαχείρηση Εσωτερικών");
			$smarty->assign("section_image", "users48.png");
			$smarty->debugging = false;
			$smarty->assign("data", $data);
			$smarty->assign("contexts", $contexts);
			$smarty->assign("extension_context", $extension_contexts);
			$smarty->assign("groups", $groups);
			$smarty->assign("extension_group", $extension_group);
			$smarty->assign("info", $info);
			$smarty->assign("selected", "extensions_list");
			$smarty->assign("extension", $extension);
			$smarty->assign("password", $password);
			$smarty->assign("pin", $pin);
			$smarty->assign("name", $name);
			$smarty->assign("surname", $surname);
			$smarty->assign("cid", $cid);
			$smarty->assign("email", $email);
			$smarty->assign("device", $device);
			$smarty->assign("device_mac", $device_mac);
			$smarty->assign("cw", $cw);
			$smarty->assign("call_recording", $call_recording);
			$smarty->assign("gen_config", $gen_config);
			$smarty->display("header.tpl");
			$smarty->display("extensions/common.tpl");
			$smarty->display("extensions/add.tpl");
			exit;
		}
		break;
	case 'edit':
		if (!isset($_POST['extension'])) {
			//obtain params from db based on id
			$sql = "SELECT extensions.password, extensions.name, extensions.surname, extensions.extension, extensions.context, extensions.call_group, ";
			$sql = $sql . " extensions.callerid, extensions.pin, extensions.email, extensions.mac_address, device_models.dev_model_id,extensions.line,";
			$sql = $sql . " extensions.cw, extensions.call_recording, extensions.gen_config";
			$sql = $sql . " FROM extensions LEFT JOIN device_models ON device_models.dev_model_id=extensions.model_id";
			$sql = $sql . " where user_id='$edit_id'";
			$result = @postg_query($sql, $db);
			while($row = pg_fetch_assoc($result)) {
				$device_mac = $row["mac_address"];
				$extension = $row["extension"];
				$name = $row["name"];
				$surname = $row["surname"];
				$password = $row["password"];
				$pin = $row["pin"];
				$extension_context = $row["context"];
				$extension_group = $row["call_group"];
				$email = $row["email"];
				$cid = $row["callerid"];
				$cw = $row["cw"];
				$call_recording = $row["call_recording"];
				$gen_config = $row["gen_config"];
				if ($row["mac_address"] != '') {
					$device = $row["dev_model_id"] . "-" . $row["line"];
				} else {
					$device = "0-0";
				}
				//also store key params in session
				$_SESSION['db_extension'] = $extension;
				$_SESSION['db_mac_address'] = $device_mac;
				$_SESSION['db_device'] = $device;
			}

			$log->LogInfo("Extension EDIT requested for extension $extension");

			$smarty = new Smarty;
			$smarty->assign("pages", $pages);
			$smarty->assign("section", "Διαχείρηση Εσωτερικών");
			$smarty->assign("section_image", "users48.png");
			$smarty->debugging = false;
			$smarty->assign("data", $data);
			$smarty->assign("contexts", $contexts);
			$smarty->assign("extension_context", $extension_context);
			$smarty->assign("groups", $groups);
			$smarty->assign("extension_group", $extension_group);
			$smarty->assign("info", $info);
			$smarty->assign("selected", "edit");
			$smarty->assign("user_id", $edit_id);
			$smarty->assign("extension", $extension);
			$smarty->assign("password", $password);
			$smarty->assign("pin", $pin);
			$smarty->assign("name", $name);
			$smarty->assign("surname", $surname);
			$smarty->assign("cid", $cid);
			$smarty->assign("email", $email);
			$smarty->assign("device", $device);
			$smarty->assign("device_mac", $device_mac);
			$smarty->assign("cw", $cw);
			$smarty->assign("call_recording", $call_recording);
			$smarty->assign("gen_config", $gen_config);
			$smarty->display("header.tpl");
			$smarty->display("extensions/common.tpl");
			$smarty->display("extensions/add.tpl");
			exit;
		}
		break;
	case 'delete':
		$log->LogInfo("Extension DELETE requested for $extension");
		//find the mac that are provisioned based on edit_id
		//delete them and then  - re-provision - delete the record
		$sql = sprintf("select mac_address from extensions where user_id='%d'", $edit_id);
		$result = @postg_query($sql, $db);
		$rows = pg_num_rows($result);
		if ($rows > 0) {
			while($row = pg_fetch_assoc($result)) {
				$mac2delete = $row['mac_address'];
			}
			if ($mac2delete != '') {
				$tmp = deviceUnProvision($mac2delete);
			}
			$sql = sprintf("delete from extensions where user_id='%d'", $edit_id);
			$result = @postg_query($sql, $db);
			$check1 = pg_affected_rows($result);
			if ($check1 == '1') {
				$sql = sprintf("delete from pickupgroups where extension_id='%d'", $edit_id);
				$result = @postg_query($sql, $db);
				$log->LogInfo("Deleting dids for $exttmp");
				$sql = sprintf("update did set type=null,data=null where type='extension' and data='%s'", $extension);
				$result = @postg_query($sql, $db);
				$log->LogInfo("Deleting forwardings for $extension");
				$sql = sprintf("delete from forwardings where extension='%s'", $extension);
				$result = @postg_query($sql, $db);
				$log->LogInfo("Deleting forwardings for $extension");
				$sql = sprintf("delete from queues where member='%s'", $extension);
				$result = @postg_query($sql, $db);
				asterisk_gen_configs();
				asterisk_reload();
			}
			if ($tmp == '2') {
				deviceProvision($mac2delete);
			}
		}
		$log->LogInfo("Done deleting extension $extension");
		header("Location: extensions.php");

		exit;
		break;
}

if (isset($_POST['extension'])) {
	//validation
	if ($device != "0-0") {
		//mac validation
		if (!preg_match('/^[A-Fa-f0-9]{12}$/i', $_POST['device_mac'])) {
			$error = $error . "Λάθος Mac <br>" . $_POST['device_mac'];
		}
		//dublicate validation
		$tmp = (isset($_POST['device'])) ? explode("-", $_POST['device']) : "0-0";
		$new_line = $tmp[1];
		$new_modelid = $tmp[0];
		$sql = sprintf("select extension from extensions where mac_address='%s' and line='%d'", $_POST['device_mac'], $new_line);
		$result = @postg_query($sql, $db);
		if ($result) {
			$rows = pg_num_rows($result);
			if ($rows > 0 && $operation == 'add') {
				$t_row = pg_fetch_assoc($result);
				$error = $error . "Η γραμμή αυτή έχει δωθεί στο εσωτερικό " . $t_row['extension'] . "<br>";
			}
		}
	} else {
		$device_mac = '';
	}
	if (ereg('[^0-9]', $extension)) {
		$error = $error . "Λάθος εσωτερικός Αριθμός<br>";
	}
	if (strlen($extension) == 0) {
		$error = $error . "Ο εσωτερικός αριθμός δεν μπορεί να είναι κενός<br>";
	}
	if (strlen($extension) > 6) {
		$error = $error . "Ο εσωτερικός αριθμός δεν μπορεί να είναι τόσα ψηφία<br>";
	}
	if (ereg('[^0-9]', $pin)) {
		$error = $error . "Ο Αριθμός PIN πρεπει να αποτελείται μόνο από αριθμούς<br>";
	}
	if (strlen($pin) < 4) {
		$error = $error . "O αριθμός PIN δεν μπορεί να είναι μικρότερος από 4 ψηφία<br>";
	}
	if (strlen($cid) > 16) {
		$error = $error . "Πολύ μεγάλη αναγνώριση κλήσης<br>";
	}
	if (ereg('[^A-Za-z0-9. ]', $cid)) {
		$error = $error . "Αναγνώριση κλήσης - Μόνο Αγγλικοί χαρακτήρες<br>";
	}
	if (strlen($password) > 20) {
		$error = $error . "Πολύ μεγάλος κωδικός πρόσβασης<br>";
	}
	if (strlen($password) == 0) {
		$error = $error . "Ο κωδικός πρόσβασης δεν μπορεί να είναι κενός<br>";
	}
	if (ereg('[^0-9]', $password)) {
		$error = $error . "Ο κωδικός χρήστη πρέπει να είναι μόνο αριθμοί <br>";
	}

	//check if the extension already exists
	$sql = sprintf("SELECT 1 from extensions where extension='%d'", $extension);
	$result = @postg_query($sql, $db);
	if ($result) {
		$rows = pg_num_rows($result);
		if ($rows > 0 && $operation == 'add') {
			$error = $error . "Ο εσωτερικός αριθμός " . $extension . " δεν είναι διαθέσιμος <br>";
		}
	}
	//edit specific validation
	if ($operation == 'edit') {
		if ($extension != $_SESSION['db_extension']) {
			//user wants to change the extension
			//find if new extension is avaiable
			$sql = sprintf("select 1 from extensions where extension='%s' and user_id!='%d'", $extension, $edit_id);
			$result = @postg_query($sql, $db);
			$rows = pg_num_rows($result);
			if ($rows > 0) {
				$t_row = pg_fetch_assoc($result);
				$error = $error . "Η γραμμή αυτή δεν είναι διαθέσιμη <br>";
			}
			$replace_extension = 1;
		}
		if ($device_mac != $_SESSION['db_mac_address'] || $device != $_SESSION['db_device']) {
			$log->LogDebug("Device mac: $device_mac");
			//user wants to change the device mac
			//find if it is assigned
			$sql = sprintf("select extension from extensions where mac_address='%s' and line='%s' and user_id!='%d'", $device_mac, $new_line, $edit_id);
			$result = @postg_query($sql, $db);
			$rows = pg_num_rows($result);
			if ($rows > 0) {
				$t_row = pg_fetch_assoc($result);
				$error = $error . "Το MAC ανήκει στο εσωτερικό " . $t_row['extension'] . " <br>";
			}
			$replace_device = 1;
			//maybe unprovision here or based on flag and session data?
		}
	}

	//add device
	$device_mac = strtolower($device_mac);

	if (strlen($error) == 0 && $operation == 'add') {
		$sql = sprintf("INSERT into extensions (extension, password, pin, name, surname, CallerID, email, mac_address, model_id, line, context, call_group,cw,call_recording,gen_config) values ('%s','%s','%d','%s','%s','%s','%s','%s','%d','%d','%d','%s','%s','%s','%s')", $extension, $password, $pin, $name, $surname, $cid, $email, $device_mac, $new_modelid, $new_line, $extension_context, $extension_group, $cw, $call_recording, $gen_config);
		$result = @postg_query($sql, $db);
		//add pickup groups
		$my_PickUPGroups = $_POST['pickupgroups'];
		if (!empty($my_PickUPGroups)) {
			$get_record_id = "(SELECT user_id from extensions where extension='" . $extension . "')";
			$N = count($my_PickUPGroups);
			for ($i = 0; $i < $N; $i++) {
				$sql = sprintf("INSERT into pickupgroups values (%s,'%s')", $get_record_id, $my_PickUPGroups[$i]);
				$result = @postg_query($sql, $db);
			}
		}
		$log->LogInfo("Generating asterisk config files");
		asterisk_gen_configs();
		asterisk_reload();
		//start with device provisioning
		deviceProvision($device_mac);
		$log->LogDebug("$sql");
		$log->LogInfo("Added extension $extension - $name $surname MAC:$device_mac Model:$new_modelid Line:$new_line");
		$info = "Επιτυχής προσθήκη  <br>";
		$extension = null;
		$password = passgen();
		$pin = "1234";
		$name = null;
		$surname = null;
		$cid = null;
		$email = null;
		$extension_context = (isset($_POST['extension_context'])) ? $_POST['extension_context'] : "1";
		$extension_group = (isset($_POST['extension_group'])) ? $_POST['extension_group'] : "-1";
		$device = "0-0";
		$device_mac = null;
		$cw = (isset($_POST['cw'])) ? $_POST['cw'] : "t";
		$call_recording = (isset($_POST['call_recording'])) ? $_POST['call_recording'] : "t";
		$gen_config = (isset($_POST['gen_config'])) ? $_POST['gen_config'] : "t";
	}

	//edit device
	if (strlen($error) == 0 && $operation == 'edit') {
		echo 'skata';
		$log->LogInfo("Updating extension id: $edit_id");
		$sql = sprintf("UPDATE extensions set pin='%d', name='%s', surname='%s', CallerID='%s', email='%s', context='%d', call_group='%s', cw='%s', call_recording='%s',gen_config='%s' where user_id='%d'", $pin, $name, $surname, $cid, $email, $extension_context, $extension_group, $cw, $call_recording, $gen_config, $edit_id);
		$log->LogDebug("$sql");
		$result = @postg_query($sql, $db);
		//delete old pickup groups
		$sql = sprintf("DELETE from pickupgroups where extension_id='%s'", $edit_id);
		$result = @postg_query($sql, $db);
		//inser new pickup groups
		$my_PickUPGroups = $_POST['pickupgroups'];
		if (!empty($my_PickUPGroups)) {
			$N = count($my_PickUPGroups);
			for ($i = 0; $i < $N; $i++) {
				$sql = sprintf("INSERT into pickupgroups values ('%s','%s')", $edit_id, $my_PickUPGroups[$i]);
				$result = @postg_query($sql, $db);
			}
		}
		echo 'skata2';
		$log->LogInfo("Generating asterisk config files");
		asterisk_gen_configs();
		asterisk_reload();
		echo 'skata21';
		if ($replace_extension == 1) {
			$log->LogDebug("Replacing Extension...");
			$sql = sprintf("UPDATE extensions set extension='%s',password='%s' where user_id='%d'", $extension, $newpassword, $edit_id);
			if ($_SESSION['db_mac_address'] != '') {
				$reprovision = (deviceUnProvision($_SESSION['db_mac_address']));
			}
			$result = @postg_query($sql, $db);
			$log->LogDebug("$sql");
			deviceProvision($device_mac);
			if ($reprovision == '2') {
				deviceProvision($_SESSION['db_mac_address']);
				unset($_SESSION['db_mac_address']);
			}
			unset($_SESSION['db_extension']);
		}
		echo 'skata3';
		if ($replace_device == 1) {
			$log->LogDebug("Device Changed New Model ID $new_modelid New Line $new_line for MAC $device_mac");
			$log->LogDebug("Replacing Device");
			if ($new_modelid == '') {
				$new_modelid = 0;
				$new_line = 0;
				$device_mac = '';
			}
			$log->LogDebug("Updating to new model");
			if ($_SESSION['db_mac_address'] != '') {
				$reprovision = (deviceUnProvision($_SESSION['db_mac_address']));
			}
			//also change the password
			$newpassword = passgen();
			$sql = sprintf("UPDATE extensions set model_id='%s', line='%s', password='%s', mac_address='%s' where user_id='%d'", $new_modelid, $new_line, $newpassword, $device_mac, $edit_id);
			$log->LogDebug("$sql");
			$result = @postg_query($sql, $db);
			deviceProvision($device_mac);
			if ($reprovision == '2') {
				deviceProvision($_SESSION['db_mac_address']);
				unset($_SESSION['db_mac_address']);
			}
			unset($_SESSION['db_device']);
		}
		$log->LogInfo("Generating asterisk config files");
		asterisk_gen_configs();
		asterisk_reload();
		$log->LogInfo("Done editing extension $extension - $name $surname MAC:$device_mac Model:$new_modelid Line:$new_line");
		$info = "Επιτυχής επεξεργασία  <br>";
		header("Location: extensions.php");
		exit;
	}
	$log->LogDebug("Posted error: $error");
	//display result
	$smarty = new Smarty;
	$smarty->assign("pages", $pages);
	$smarty->assign("section", "Διαχείρηση Εσωτερικών");
	$smarty->assign("section_image", "users48.png");
	$smarty->debugging = false;
	$smarty->assign("data", $data);
	$smarty->assign("contexts", $contexts);
	$smarty->assign("extension_context", $extension_context);
	$smarty->assign("groups", $groups);
	$smarty->assign("extension_group", $extension_group);
	$smarty->assign("info", $info);
	$smarty->assign("error", $error);
	$smarty->assign("selected", "extensions_list");
	if ($operation == 'edit') {
		$smarty->assign("selected", "edit");
		$smarty->assign("user_id", $edit_id);
	}
	$smarty->assign("extension", $extension);
	$smarty->assign("password", $password);
	$smarty->assign("pin", $pin);
	$smarty->assign("name", $name);
	$smarty->assign("surname", $surname);
	$smarty->assign("cid", $cid);
	$smarty->assign("email", $email);
	$smarty->assign("device", $device);
	$smarty->assign("device_mac", $device_mac);
	$smarty->assign("gen_config", $gen_config);
	$smarty->assign("cw", $cw);
	$smarty->assign("call_recording", $call_recording);
	$smarty->display("header.tpl");
	$smarty->display("extensions/common.tpl");
	$smarty->display("extensions/add.tpl");
	exit;
}
?>
