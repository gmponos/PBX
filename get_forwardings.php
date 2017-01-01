<?php
error_reporting(E_ALL);

include "inc/config.php";
require_once 'inc/KLogger.php';

$log = new KLogger ( "/tmp/debug.log" , KLogger::DEBUG );

$extension = 5001;
$log->LogInfo("Starting fwd checking for $extension");
$db = pg_connect("host=localhost dbname=pbx user=pbxadmin password=admin") or die('Could not connect: ' . pg_last_error());

$sql = sprintf("select condition,target,timeout from forwardings where extension='%d'",$extension);
$result = pg_query($sql);

if (!$result){
$log->LogInfo("pg_last_error()");
} else {
	while($myrow = pg_fetch_assoc($result)){
	$log->LogInfo("$myrow[condition],$myrow[target],$myrow[timeout]");
	}
}
?>
