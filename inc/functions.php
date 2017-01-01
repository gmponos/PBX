<?php

function el2en($input) {
	$greekfind = array("αι", "οι", "ου", "ει", "ευ", "αυ", "Α", "Β", "Γ", "Δ", "Ε", "Ζ", "Η", "Θ", "Ι", "Κ", "Λ", "Μ", "Ν", "Ξ", "Ο", "Π", "Ρ", "Σ", "Τ", "Υ", "Φ", "Χ", "Ψ", "Ω", "α", "β", "γ", "δ", "ε", "ζ", "η", "θ", "ι", "κ", "λ", "μ", "ν", "ξ", "ο", "π", "ρ", "σ", "τ", "υ", "φ", "χ", "ψ", "ω", "Ά", "ά", "Έ", "έ", "Ή", "ή", "Ί", "ί", "Ό", "ό", "Ύ", "ύ", "Ώ", "ώ", "ΐ", "ΰ", "ϊ", "ϋ", "ς");
	$greekreplace = array("ai", "oi", "ou", "ei", "ef", "af", "A", "V", "G", "D", "E", "Z", "I", "Th", "I", "K", "L", "M", "N", "X", "O", "P", "R", "S", "T", "I", "F", "H", "Ps", "W", "a", "v", "g", "d", "e", "z", "i", "th", "i", "k", "l", "m", "n", "x", "o", "p", "r", "s", "t", "i", "f", "h", "ps", "w", "a", "a", "e", "e", "i", "i", "i", "i", "o", "o", "i", "i", "w", "w", "i", "i", "i", "i", "s");
	$greeklish = str_replace($greekfind, $greekreplace, $input);
	return $greeklish;
}

function postg_query($query, $connection_id) {
	return pg_exec($connection_id, $query);
}

function passgen() {
	$pass = mt_rand(1000000, 99999999);
	return $pass;
}

function sec2hms($sec, $padHours = false) {

	// holds formatted string
	$hms = "";

	// there are 3600 seconds in an hour, so if we
	// divide total seconds by 3600 and throw away
	// the remainder, we've got the number of hours
	$hours = intval(intval($sec) / 3600);

	// add to $hms, with a leading 0 if asked for
	$hms .= ($padHours) ? str_pad($hours, 2, "0", STR_PAD_LEFT) . ':' : $hours . ':';

	// dividing the total seconds by 60 will give us
	// the number of minutes, but we're interested in
	// minutes past the hour: to get that, we need to
	// divide by 60 again and keep the remainder
	$minutes = intval(($sec / 60) % 60);

	// then add to $hms (with a leading 0 if needed)
	$hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT) . ':';

	// seconds are simple - just divide the total
	// seconds by 60 and keep the remainder
	$seconds = intval($sec % 60);

	// add to $hms, again with a leading 0 if needed
	$hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);

	// done!
	return $hms;
}

function strTime($s) {
	$d = intval($s / 86400);
	$s -= $d * 86400;

	$h = intval($s / 3600);
	$s -= $h * 3600;

	$m = intval($s / 60);
	$s -= $m * 60;

	if ($d)
		$str = $d . ':';
	if ($h)
		$str .= $h . ':';
	if ($m)
		$str .= $m . ":";
	if ($s)
		$str .= $s . '';

	return $str;
}

function grdisposition($dispo) {
	switch ($dispo) {
		case 'ANSWERED':
			return 'ΑΠΑΝΤΗΘΗΚΕ';
			break;
		case 'BUSY':
			return 'ΑΠΑΣΧΟΛΗΜΕΝΟ';
			break;
		case 'FAILED':
			return 'ΑΠΕΤΥΧΕ';
			break;
		case 'NO ANSWER':
			return 'ΑΝΑΠΑΝΤΗΤΗ';
			break;
		default:
			return 'ΑΓΝΩΣΤΟ';
	}
}

function numdispo($dispo, $type) {
	switch ($dispo) {
		case 'ANSWERED':
			if ($type == 'IN') {
				return '11';
			} elseif ($type == 'OUT') {
				return '12';
			} else {
				return '10';
			}
			break;

		case 'BUSY':
			if ($type == 'IN') {
				return '21';
			} elseif ($type == 'OUT') {
				return '22';
			} else {
				return '20';
			}
			break;

		case 'NO ANSWER':
			if ($type == 'IN') {
				return '01';
			} elseif ($type == 'OUT') {
				return '02';
			} else {
				return '00';
			}
			break;

		case 'FAILED':
			if ($type == 'IN') {
				return '31';
			} elseif ($type == 'OUT') {
				return '32';
			} else {
				return '30';
			}
			break;


		default:
			return '0';
	}
}

function mysqldate($date, $startend) {
	$year = substr($date, 6, 4);
	$month = substr($date, 3, 2);
	$day = substr($date, 0, 2);
	if ($startend == 'start') {
		$newdate = date("Y-m-d H:i:s", mktime(0, 0, 0, $month, $day, $year));
	} else {
		$newdate = date("Y-m-d H:i:s", mktime(23, 59, 59, $month, $day, $year));
	}
	return $newdate;
}

function get_axfer_parties($callid) {

	$get = "SELECT (split_part(dstchannel,'-',1),'/',2) as dstchan FROM cdr WHERE type='1' and userfield='$callid'";
	if (($result = @postg_query($get, $db)) == 0) {
		echo "\n<hr />Database error: <span>" . mysql_error() . "  </span><br/>\n";
		echo $sql;
		die("MySQL Said: " . mysql_error());
	}
	while($row = pg_fetch_assoc($result)) {
		$axfers[] = $row[dstchan];
		$to_return .= join(',', $axfers);
	}
	return $to_return;
}

function asterisk_reload() {

	require_once "inc/phpagi/phpagi-asmanager.php";

	$asm = new AGI_AsteriskManager();

	if ($asm->connect("localhost", "sync", "!pass!sync")) {
		$asm->command("reload");
		$asm->disconnect();
		return 0;
	} else {
		$error = $error . "Could not connect to asterisk!";
		return ($error);
	}

//	$as = new AGI_AsteriskManager();
//	if ($res = $as->connect("localhost", "sync", "!pass!sync")){
//		$as->send_request('Command', array('Command'=>'reload'));
//		$as->disconnect();
//		return 0;
//	} else {
//		echo "Fail to reload";
//	}
}

function restart_hylafax() {
	exec("/usr/bin/sudo /usr/sbin/service hylafax restart");
}

function asterisk_gen_configs() {

	require_once("inc/libs/Smarty.class.php");
	include "config.php";
	require_once 'inc/KLogger.php';
	$log = new KLogger("/tmp/debug.log", KLogger::DEBUG);

	$get = "SELECT user_id, extension, password, callerid, context_data, call_group, cw, call_recording, gen_config FROM extensions LEFT JOIN contexts ON extensions.context = contexts.context_id where ext_type='SIP' order by extension ";
	$result = pg_query($get);
	$sipdata = array();
	$extensiondata = array();

	while($row = pg_fetch_assoc($result)) {
		$get_pickupgroups = sprintf("SELECT callgroup_id from pickupgroups where extension_id='%s'", $row['user_id']);
		$result_2 = pg_query($get_pickupgroups);
		while($myPickUpGroups = pg_fetch_assoc($result_2)) {
			if ($myPickUpGroups[callgroup_id] != '') {
				$finalPickUpGroup = $finalPickUpGroup . $myPickUpGroups[callgroup_id] . ",";
			}
		}
		$recording = 'rec=' . $row['call_recording'];
		$finalPickUpGroup = deleteTrailingCommas($finalPickUpGroup);
		$sipdata[] = array("extension" => $row["extension"], "password" => $row["password"], "callerid" => $row["callerid"], "context" => $row["context_data"], "call_group" => $row["call_group"], "pickUpGroup" => $finalPickUpGroup, "recording" => $recording, "cw" => $row["cw"]);
		if ($row['gen_config'] != 'f') {
			$extensiondata[] = array("extension" => $row["extension"], "password" => $row["password"], "callerid" => $row["callerid"], "context" => $row["context_data"], "call_group" => $row["call_group"], "pickUpGroup" => $finalPickUpGroup);
		}
		$finalPickUpGroup = '';
	}

	$sql = "SELECT name, extension, call_recording FROM extensions WHERE ext_type = 'QUEUE' order by extension";
	$result = pg_query($sql);
	while($row = pg_fetch_assoc($result)) {
		$sql2 = sprintf("select member,extensions.name,extensions.surname from queues left join extensions on member=extensions.extension where number='%s' order by member", $row["extension"]);
		$member_result = pg_query($sql2);
		while($row2 = pg_fetch_assoc($member_result)) {
			$qtest2[] = array($row["extension"] => $row2["member"], $row["call_recording"]);
		}
		$qtest[] = array("group_name" => $row["name"], "group_number" => $row["extension"], "members" => $qtest2);
		$qtest2 = '';
		$q_data = $qtest;
	}

//dids

	$sql = "SELECT distinct(trunk) from did";
	$result = pg_query($sql);
	while($row = pg_fetch_assoc($result)) {
		$trunk = $row["trunk"];
		$sql2 = sprintf("SELECT did_number,type,data  from did where trunk='%s' and data is not null order by did_number", $trunk);
		$dids_result = pg_query($sql2);

		while($dids_result_row = pg_fetch_assoc($dids_result)) {
			$did_data[] = array("did_number" => $dids_result_row["did_number"], "type" => $dids_result_row["type"], "did_type_data" => $dids_result_row["data"]);
		}
		$smarty = new Smarty;
		$smarty->assign("did_data", $did_data);
		$output = $smarty->fetch("configs/did_extensions.tpl");
		$file = $asterisk_dids . $trunk . ".conf";
		$log->LogDebug("Generating dids: $file");
		$fh = fopen($file, 'w') or die("can't open file $file");
		fwrite($fh, $output);
		fclose($fh);
		$did_data = null;
	}

//did faxes
	$sql = "SELECT did_number,data from did where type='fax' and data is not null order by did_number";
	$log->LogDebug("$sql");
	$result = pg_query($sql);
	while($row = pg_fetch_assoc($result)) {
		$fax_data_tmp[] = array("did_number" => $row["did_number"], "email" => $row["data"]);
	}
	$faxdata = $fax_data_tmp;
	$smarty = new Smarty;
	$smarty->assign("faxdata", $faxdata);
	$output = $smarty->fetch("configs/faxes.tpl");
	$log->LogDebug("Generating faxes: $hylafax_dispatch");
	$fh = fopen($hylafax_dispatch, 'w') or die("can't open file $hylafax_dispatch");
	fwrite($fh, $output);
	fclose($fh);

	$smarty = new Smarty;
	$smarty->assign("data", $extensiondata);
	$output = $smarty->fetch("configs/extensions.tpl");
	$extconf = $asterisk_extensions;
	$fh = fopen($extconf, 'w') or die("can't open file $extconf");
	fwrite($fh, $output);
	fclose($fh);

	$smarty = new Smarty;
	$smarty->assign("q_data", $q_data);
	$output = $smarty->fetch("configs/queues.tpl");
	$q_conf = $asterisk_queues;
	$fh = fopen($q_conf, 'w') or die("can't open file $q_conf");
	fwrite($fh, $output);
	fclose($fh);

	$smarty = new Smarty;
	$smarty->assign("data", $sipdata);
	$output = $smarty->fetch("configs/sip.tpl");
	$fh = fopen($sip_extensions, 'w') or die("can't open file $mybuttons");
	fwrite($fh, $output);
	fclose($fh);

	$smarty = new Smarty;
	$smarty->assign("data", $sipdata);
	$smarty->assign("q_data", $q_data);
	$output = $smarty->fetch("configs/fop_buttons.tpl");
	$mybuttons = $fop_buttons;
	$fh = fopen($mybuttons, 'w') or die("can't open file $mybuttons");
	fwrite($fh, $output);
	fclose($fh);

	exec("/usr/bin/sudo /usr/sbin/service fop2 restart");

	return 0;
}

function deviceProvision($mac_address) {
	require_once("inc/libs/Smarty.class.php");
	include "config.php";

	if ($mac_address == '') {
		$tmp = "Requested provisioning with empty MAC ";
		error_log($tmp);
		$returnCode = false;
		return($returnCode);
	}

	$returnCode = true;

	$tmp = "Provisioning: " . $mac_address;
	error_log($tmp);

	$sql = "SELECT extensions.extension, extensions.password, ";
	$sql = $sql . "extensions.mac_address, device_models.dev_model_id, extensions.line, device_models.mac_is_lowercase, extensions.line, ";
	$sql = $sql . "device_models.template , device_models.phone_tftp_path, device_models.file_prefix, device_models.file_surfix ";
	$sql = $sql . "FROM extensions JOIN device_models ON device_models.dev_model_id=extensions.model_id ";
	$sql = $sql . "where mac_address='$mac_address' ORDER by extensions.line";
	$info = $info . $sql;
	if ($result = pg_query($sql)) {
		while($row = pg_fetch_assoc($result)) {
			$my_template = $row['template'];
			$my_tftp_path = $row['phone_tftp_path'];
			$my_file_prefix = $row['file_prefix'];
			$my_file_surfix = $row['file_surfix'];
			$mac_is_lowercase = $row['mac_is_lowercase'];
			$tmp = $row['line'];
			if ($mac_is_lowercase == 'f') {
				$mac_address = strtoupper($mac_address);
			}
			$provisioning[] = array("extension" => $row['extension'], "password" => $row['password'], "line" => $row['line'], "mac_address" => $mac_address);
		}

		$smarty = new Smarty;
		$smarty->assign("data", $provisioning);
		$template = "configs/" . $my_template . ".tpl";
		$output = $smarty->fetch($template);
		$target = $my_tftp_path . $my_file_prefix . $mac_address . $my_file_surfix;
		$fh = fopen($target, 'c');
		if ($fh) {
			fwrite($fh, $output);
			fclose($fh);
		} else {
			$returnCode = false;
		}
		if ($my_template == 'polycom') {
			$target_line = $my_tftp_path . $my_file_prefix . $mac_address . "-lines" . $my_file_surfix;
			$smarty = new Smarty;
			$smarty->assign("data", $provisioning);
			$template = "configs/polycom-lines.tpl";
			$output = $smarty->fetch($template);
			$target = $my_tftp_path . $my_file_prefix . $mac_address . $my_file_surfix;
			$fh = fopen($target_line, 'c');
			if ($fh) {
				fwrite($fh, $output);
				fclose($fh);
			} else {
				$returnCode = false;
			}
		}
	} else {
		error_log("Mac not found!");
		$returnCode = false;
	}
	return $returnCode;
}

function deviceUnProvision($mac_address) {
	$tmp = "Unprovisioning: " . $mac_address;
	error_log($tmp);
	require_once("inc/libs/Smarty.class.php");
	include "config.php";

	if ($mac_address == '') {
		$tmp = "Requested Unprovisioning with empty MAC ";
		error_log($tmp);
		$returnCode = false;
		return($returnCode);
	}

	$returnCode = 0;

	$sql = "SELECT device_models.dev_model_id, device_models.mac_is_lowercase, device_models.template, ";
	$sql = $sql . "device_models.phone_tftp_path, device_models.file_prefix, device_models.file_surfix ";
	$sql = $sql . "FROM extensions JOIN device_models ON device_models.dev_model_id=extensions.model_id ";
	$sql = $sql . "where mac_address='$mac_address'";
	if ($result = pg_query($sql)) {
		$gotsome = pg_num_rows($result);
		while($row = pg_fetch_assoc($result)) {
			$my_tftp_path = $row['phone_tftp_path'];
			$my_file_prefix = $row['file_prefix'];
			$my_file_surfix = $row['file_surfix'];
			$mac_is_lowercase = $row['mac_is_lowercase'];
			$my_template = $row['template'];
		}
		if ($mac_is_lowercase == 'f') {
			$mac_address = strtoupper($mac_address);
		}
		$provisioned = $my_tftp_path . $my_file_prefix . $mac_address . $my_file_surfix;
		if (file_exists($provisioned)) {
			$tmp = "Deleting Device file: " . $provisioned;
			if ($my_template == 'polycom') {
				$provisioned_line = $my_tftp_path . $my_file_prefix . $mac_address . "-lines.cfg";
				unlink($provisioned_line);
			}
			error_log($tmp);
			unlink($provisioned);
			$retruncode = 0;
		} else {
			$returnCode = 1;
		}
		if ($gotsome > 1) {
			$tmp = "The device  " . $mac_address . " Has more lines attached.";
			error_log($tmp);
			$returnCode = 2;
		}
	} else {
		error_log("Mac not found!");
		$returnCode = 1;
	}
	return($returnCode);
}

function deleteTrailingCommas($str) {
	return trim(preg_replace("/(.*?)((,|s)*)$/m", "$1", $str));
}

?>
