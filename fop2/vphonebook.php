<?php
error_reporting(0);
require_once("config.php");

$texto     = $_REQUEST['input'];
$context   = $_REQUEST['context'];
$extension = $_REQUEST['extension'];

//$extension = $_SESSION[MYAP]['extension'];


if($context=="general") { $context=""; }


header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");              // Date in the past
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header ("Cache-Control: no-cache, must-revalidate");            // HTTP/1.1
header ("Pragma: no-cache");                                    // HTTP/1.0
header("Content-Type: text/xml; charset=utf-8");



echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?><Suggestions>";

if(preg_match("/\.tel$/",$texto)) {
    query_tel($texto);
} else {
    query_phonebook($texto);
}
echo "</Suggestions>";

function query_phonebook($texto) {
    global $db;
    global $context;
    global $extension;
    $db->consulta("SET NAMES 'UTF8'");
    $res=$db->consulta("SELECT phone1,phone2,CONCAT(firstname,' ',lastname,' (',company,')') AS name FROM visual_phonebook WHERE CONCAT(firstname,' ',lastname,' ',company) LIKE '%%%s%%' AND context='%s' AND (owner='%s' OR (owner<>'%s' AND private='no')) ",$texto,$context,$extension,$extension);
    $contador=0;
    if($db->num_rows()>0) {
        while($row=$db->fetch_assoc()) {
            $htmlname = htmlspecialchars($row['name']);
            $htmlname = preg_replace("/\(\)/","",$htmlname);
            $phone1 = preg_replace("/[^0-9]/","", $row['phone1']); 
            $phone2 = preg_replace("/[^0-9]/","", $row['phone2']); 

            //$htmlphone2 = htmlentities($phone2);
            if($row['phone1']<>"") {
                echo "<suggestion id='".$phone1."' info='".$phone1."'>".$htmlname.": $phone1</suggestion>";
                $contador++;
            }
            if($row['phone2']<>"") {
                echo "<suggestion id='".$phone2."' info='".$phone2."'>".$htmlname.": $phone2</suggestion>";
                $contador++;
            }
        }
    }
}

function query_tel($domain) {

    $server       = "4.2.2.2";
    $port         = 53;
    $timeout      = 60;
    $type         = "NAPTR";

    $query  = new DNSConsulta($server,$port,$timeout);
    $result = $query->Query($domain,$type);

    ShowSection($result);

}

function ShowSection($result) {
    $tel=array();
    $voip=array();
    $replaceArray = array(array(), array()); 
    for ($i=0; $i<32; $i++)                 {
        $replaceArray[0][] = chr($i);
        $replaceArray[1][] = "";
    }
    for ($i=127; $i<160; $i++) {
        $replaceArray[0][] = chr($i);
        $replaceArray[1][] = "";
    }

    for ($i=0; $i<$result->count; $i++) {
//        echo $i.". ";
        if ($result->results[$i]->string=="") {
            echo $result->results[$i]->typeid."(".$result->results[$i]->type.") => ".$result->result;
        } else {
//            print $result->results[$i]->string."<br>";



$pepa = str_replace($replaceArray[0], $replaceArray[1], $result->results[$i]->string); 
$pepe = split(" ",$pepa);
//echo $pepa;
/*
print_r($result->results[$i]->string);
echo "nico $pepe";
*/


 //           $pepe = split(" ",$result->results[$i]->string);
            $papo = split("!",substr($pepe[2],7));
            if(preg_match("/voice/",$papo[0])) {
               $tel[] = preg_replace("/tel:/","",$papo[2]);
            }  
            if(preg_match("/voip/",$papo[0]) || preg_match("/sip/",$papo[0])) {
               $voip[] = preg_replace("/sip:/","SIP/",$papo[2]);
            }  
            if(preg_match("/skype/i",$papo[0])) {
               $voip[] = preg_replace("/skype:/i","SKYPE/",$papo[2]);
            }  
            if(preg_match("/web/",$papo[0])) {
               $web[] = preg_replace("/web:/","",$papo[2]);
            }  
        }   
        
    }
    foreach($tel as $valor) { 
        if($valor<>"") {
            echo "<suggestion id='".$valor."' info='".$valor."'>Voice: $valor</suggestion>";
        }
    }
    foreach($voip as $valor) { 
        if($valor<>"") {
            echo "<suggestion id='".$valor."' info='".$valor."'>Voip: $valor</suggestion>";
        }
    }
    foreach($web as $valor) { 
        if($valor<>"") {
            echo "<suggestion id='".$valor."' info='".$valor."'>WWW: $valor</suggestion>";
        }
    }
}   



?>
