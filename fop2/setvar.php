<?php
require_once("config.php");

set_time_limit(3);

$x1c="f\143\154o\163e"; $x1d="f\151l\x65\137ge\164\137c\x6f\156\x74\145\x6e\x74\163"; $x1e="\x66\x65\157f"; $x1f="f\x67et\163"; $x20="\146s\157\143kop\x65\x6e"; $x21="fp\x75\x74s"; $x22="frea\144"; $x23="\151\163\137\146ile"; $x24="\x69\163_\162\145\163\x6f\x75\162c\x65"; $x25="\155d\x35"; $x26="\x70r\145\147_m\x61t\143\150"; $x27="\x70r\x65g_\162\x65p\x6ca\x63\145"; 

function authReq($x0b,$x0c) { global $x1c,$x1d,$x1e,$x1f,$x20,$x21,$x22,$x23,$x24,$x25,$x26,$x27; if($x0b=="") { return 0; }$x0d = 5;$x0e= "l\x6f\143a\x6c\x68o\x73\x74";$x0f = isset($_SESSION[MYAP]['context'])?$_SESSION[MYAP]['context']:'GENERAL';if($x0f=="") { $x0f="\x47\x45\116\105\122A\x4c"; }$x10 = "fo\160\062\x2d\x76\x61ri\x61\142\x6c\145s".$x0f."\x2et\x78\164";if($x23($x10)) {$x11 = $x1d($x10);$x12 = $x26("\x2fp\157r\164=(\d\053\051/",$x11,$x13);$x14=$x13[1];} else {$x14="\x344\064\065";}$x15=$x20($x0e,$x14,$x16,$x17,$x0d) ;if (!$x24($x15)) {return 0; } else {$x21($x15, "\074m\x73\147 \x64ata\x3d\"$x0f\174\143o\156\164\145\170\x74\157|\061\"\x20\057>\0");$x18 = "";while($x18 <> "\x7d" ) { $x18 = $x22($x15,1); $x11.=$x18;}$x19 = xd8($x11);$x11="";$x18="";while($x18 <> "\x7d" ) { $x18 = $x22($x15,1); $x11.=$x18;}$x1a = $x25($x0c.$x19);$x1b="";$x21($x15, "\074m\x73\x67\x20d\x61\164\x61\075\"$x0f\174c\150e\143\x6bau\164\x68\174$x0b|$x1a\"\x20\x2f\076\0");while (!$x1e($x15)) {$x1b.=$x1f($x15, 10);}}$x1c($x15);$x1b=$x27("\057\x5b\136\x61-z\135\057","",$x1b);if($x1b=="\157\153") { return 1;} else { return 0;}}

$x10="\x70\x72\145g\137\162\145p\154\141\143\x65"; $x11="\x70\162\145\x67\x5fs\160\x6c\151t"; $x12="t\162\x69m"; 

function xd8($x0b) { global $x10,$x11,$x12; $x0b = $x10("/\175\x2f","",$x0b);$x0b = $x12($x10("/{/","",$x0b));$x0c = $x11("/,/",$x0b);foreach($x0c as $x0d) {$x0d = $x12($x0d);$x0e = $x11("\x2f:\057",$x0d);$x0e[0]=$x10("/\"\x2f","",$x0e[0]);$x0e[1]=$x12($x0e[1]);$x0e[1]=$x10("\x2f\"\057","",$x0e[1]);$x0f[$x0e[0]]=$x0e[1];}return $x0f["\x64a\164a"];}


if(isset($_POST['sesvar'])) {

    $valid_vars[] = "context";
    $valid_vars[] = "extension";
    $valid_vars[] = "phonebook";
    $valid_vars[] = "admin";
    $valid_vars[] = "vpath";
    $valid_vars[] = "vfile";
    $valid_vars[] = "key";
    $valid_vars[] = "logout";
    $valid_vars[] = "language";
    $variable= $_POST['sesvar'];
    $value   = $_POST['value'];

    if(!in_array($variable,$valid_vars)) {
        die('no way');
    }

    if($variable == "key") {
        if(!authReq($_POST['exten'],$_POST['pass'])) {
            die("no auth");
        }
    } else if($variable == "context") {
        // no need to auth
    } else {
        if($variable != "extension") {
            if(!isset($_SESSION[MYAP]['key'])) {
                die("no key");
            }
        }
    }
    if($variable == 'logout' && $value == 'yes') {
        $_SESSION[MYAP] = array();
        session_destroy();
        echo "ok";
    } else {
        $_SESSION[MYAP][$variable]=$value;
    }
}

?>
