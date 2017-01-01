<?php
define("MYAP",  "FOP2");
define("TITLE", "Flash Operator Panel 2");
if(isset($_SERVER['PATH_INFO'])) {
    define("SELF",  substr($_SERVER['PHP_SELF'], 0, (strlen($_SERVER['PHP_SELF']) - @strlen($_SERVER['PATH_INFO']))));
} else {
    define("SELF",  $_SERVER['PHP_SELF']);
}

// Session start
session_start();

if(!isset($_REQUEST['file'])) {
    die("No filename specified");
}

list ($getid,$filename2) = preg_split("/!/",$_REQUEST['file'],2);
$filename2 = preg_replace("/\.\./","",$filename2);
$filename2 = preg_replace("/%2e/","",$filename2);
$filename2 = preg_replace("/\/+/","/",$filename2);
$file_extension = strtolower(substr(strrchr($filename2,"."),1));

// required for IE, otherwise Content-disposition is ignored
if(ini_get('zlib.output_compression')) {
    ini_set('zlib.output_compression', 'Off');
}

if(!isset($_SESSION[MYAP]['vpath'])) {
    die("no way");
}

if($_SESSION[MYAP]['vfile'] <> $filename2) {
    die("no way");
}

//if(!stristr($_SESSION[MYAP]['vfile'],$_SESSION[MYAP]['vpath'])) {
if(!stristr($_SESSION[MYAP]['vfile'],$_SESSION[MYAP]['vpath']) && !stristr($_SESSION[MYAP]['vfile'],'/var/spool/asterisk/monitor/fop2')) {
    die("no way");
}

$realid=md5($_SESSION[MYAP]['key']);

if($realid<>$getid) {
    die("invalid id");
}

if($file_extension<>"wav" && $file_extension<>"WAV" && $file_extension<>"gsm") {
    die("Only wav or gsm allowed");
}

if( $filename2 == "" ) {
    echo "ERROR: download file NOT SPECIFIED.";
    exit;
} elseif ( ! file_exists( $filename2 ) ) {
    echo "ERROR: File not found.";
    exit;
}

header("Pragma: public"); // required
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // required for certain browsers 
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"".basename($filename2)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename2));
readfile("$filename2");
exit();
?>
