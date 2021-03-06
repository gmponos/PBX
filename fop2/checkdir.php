<?php

require_once('config.php');

// Here you can fire your own popups or do whatever you want
// If the function returns ZERO it will disable regular notifications
// If you still want regular notifications, have the function return ONE

function custom_popup($ALLVAR) {

    // For Asternic Tag Call
    if($ALLVAR['poptype']=="ringing") {

        // RINGING NOTIFICATION

        $clidnum   = $ALLVAR['clidnum'];
        $clidname  = $ALLVAR['clidname'];
        $fromqueue = $ALLVAR['fromqueue'];
        $exten     = $ALLVAR['exten'];

        $clidname = base64_decode($ALLVAR['clidname']);
        $clidnum  = base64_decode($ALLVAR['clidnum']);

        // EXAMPLE TO DO A GOOGLE SEARCH ON CALLERID NAME
        // header("Content-type: text/javascript");
        // echo "window.open('http://www.google.com/search?q=$clidname');\n";

        // EXAMPLE TO DO A VTIGER SEARCH ON CALLERID NUMBER
        //header("Content-type: text/javascript");
        //echo "window.open('/vtigercrm/index.php?module=Home&action=UnifiedSearch&query_string=$clidnum')";

        /*
        // EXAMPLE TO UPDATE A FOP2 DIV VIA AJAX
        $par = "?";
        foreach($ALLVAR as $key=>$val) {
            $par.="$key=$val&";
        }
        header("Content-type: text/javascript");
        echo "new Ajax.Updater('asternicTag', 'popupMinicrm.php$par', { method: 'get', evalScripts: true });\n";
        */

    } else {

        // AGENT CONNECT NOTIFICATION

        /*
        // EXAMPLE TO UPDATE A DIV VIA AJAX

        $par = "?";
        foreach($ALLVAR as $key=>$val) {
            $par.="$key=$val&";
        }

        header("Content-type: text/javascript");
        echo "new Ajax.Updater('asternicTag', 'popupMinicrm.php$par', { method: 'get', evalScripts: true });\n";
        */
    }

    return 1;   // We still want regular notifications
}

// Execute custom function
if(function_exists("custom_popup")) {
    $ret = custom_popup($_GET);
    if(!$ret) {
        exit;
    }
}

// If there is no custom function, search in Phonebook Database
// to return Fancy data if we have a match

$context     = (isset($_SESSION[MYAP]['context']))?$_SESSION[MYAP]['context']:'';
$clidnum     = (isset($_GET['clidnum']))?$_GET['clidnum']:"";
$clidname    = (isset($_GET['clidname']))?$_GET['clidname']:"";
$fromqueue   = (isset($_GET['fromqueue']))?$_GET['fromqueue']:"";
$exten       = (isset($_GET['exten']))?$_GET['exten']:"";
$picture     = "images/telephone_128.png";

$decodedClidnum = base64_decode($clidnum);
$largo          = strlen($decodedClidnum);
$significant    = 8;
$startoffset    = 0;

if($largo > $significant) {
    $startoffset=$largo-$significant;
}

$clid_significant = substr( $decodedClidnum, $startoffset );

$res = $db->consulta("SET NAMES utf8");
$res = $db->consulta("SELECT concat(firstname,' ',lastname) AS name,company,picture FROM visual_phonebook WHERE (phone1 LIKE '%%%s'OR phone2 LIKE '%%%s') AND context='%s' ORDER BY LENGTH(CONCAT(phone1,phone2)) LIMIT 1",$clid_significant,$clid_significant,$context);

if($res) {
    if($db->num_rows()>0) {
        $row = $db->fetch_assoc();
        $clidname = $row['name'];
        if($row['company'] <> '') {
            $clidname .= "<br/>".$row['company'];
        }
        $clidname = base64_encode($clidname);
        $picture = ($row['picture']<>'')?$row['picture']:'nopic';

        if($context<>"") {
            $picture=$context."_".$picture;
        }

        if(file_exists("./uploads/".$picture)) {
            $picture = "./uploads/".$picture;
        }  else {
            $picture = "./images/telephone_128.png";
        }
    }
}

Header( "X-JSON: { \"clidnum\": \"$clidnum\", \"clidname\": \"$clidname\", \"picture\": \"$picture\", \"queue\": \"$fromqueue\" }");

?>
