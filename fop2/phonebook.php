<?php
header("Content-Type: text/html; charset=utf-8");
require_once("config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us" >
<head>
<?php
if(isset($page_title)) { 
    echo "    <title>$page_title></title>\n"; 
} else {
    echo "    <title>".TITLE."</title>\n"; 
}
?>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="imagetoolbar" content="false"/>
    <meta name="MSSmartTagsPreventParsing" content="true"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link rel="stylesheet" type="text/css" href="css/fluid/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/fluid/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/dbgrid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/stable.css" media="screen" />

<?php
if(isset($extrahead)) {
    foreach($extrahead as $bloque) {
        echo "$bloque";
    }
}
?>
</head>
<body style='overflow-x: hidden;'>
<div style='width: 95%; padding: 1em;'>
<?php

$context   = $_SESSION[MYAP]['context'];
$extension = $_SESSION[MYAP]['extension'];
$allowed   = $_SESSION[MYAP]['phonebook'];

if($allowed <> "yes") {
   die("You do not have permissions to access this resource.");
}

if($context=="") { 
    $addcontext="";
} else {
    $addcontext="${context}_";
}

// Sanitize Input
$addcontext = preg_replace("/\.[\.]+/", "", $addcontext);
$addcontext = preg_replace("/^[\/]+/", "", $addcontext);
$addcontext = preg_replace("/^[A-Za-z][:\|][\/]?/", "", $addcontext);

$extension = preg_replace("/'/", "",  $extension );
$extension = preg_replace("/\"/", "", $extension );
$extension = preg_replace("/;/", "",  $extension );

$res = $db->consulta("DESC visual_phonebook");
if(!$res) {
    $querycreate = "CREATE TABLE `visual_phonebook` (
      `id` int(11) NOT NULL auto_increment,
      `firstname` varchar(50) default NULL,
      `lastname` varchar(50) default NULL,
      `company` varchar(100) default NULL,
      `phone1` varchar(50) default NULL,
      `phone2` varchar(50) default NULL,
      `owner` varchar(50) default '',
      `private` enum('yes','no') default 'no',
      `picture` varchar(100) default NULL,
      `context` varchar(150) default '',
      PRIMARY KEY  (`id`),
      KEY `search` (`firstname`,`lastname`,`company`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8";
    $ris = $db->consulta($querycreate);
    if(!$ris) {
        echo "<h1><br/>Could not connect/create the phonebook table.<br/><br/>Please verify your mysql credentials in config.php.</h1>";
        die();
    } else {
        // Intento importar la base vieja
        if(is_readable("config.old.php")) {
            $lineas = file("config.old.php");
            $end=0;
            foreach ($lineas as $num=>$linea) {
                $linea = preg_replace("/\s+/","",$linea);
                if(preg_match("/Donotmodify/",$linea)) {
                    $end=1;
                }
                if($end==0) {
                   if(preg_match('/^\$DBHOST/',$linea)) {
                       $linea=preg_replace("/DBHOST/","DBHOST1",$linea);
                       eval($linea);
                   }
                   if(preg_match('/^\$DBNAME/',$linea)) {
                       $linea=preg_replace("/DBNAME/","DBNAME1",$linea);
                       eval($linea);
                   }
                   if(preg_match('/^\$DBUSER/',$linea)) {
                       $linea=preg_replace("/DBUSER/","DBUSER1",$linea);
                       eval($linea);
                   }
                   if(preg_match('/^\$DBPASS/',$linea)) {
                       $linea=preg_replace("/DBPASS/","DBPASS1",$linea);
                       eval($linea);
                   }
                }
            }

            $db2 = new dbcon($DBHOST1, $DBUSER1, $DBPASS1, $DBNAME1, false);
            if($db2->is_connected()) {
                $queryout="SELECT * INTO OUTFILE '/tmp/visphonebak.db' FROM visual_phonebook";
                $db2->consulta($queryout);
                $db2->close();
                $lineas = file("/tmp/visphonebak.db", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lineas as $num=>$linea) {
                    $campos=preg_split("/\t/",$linea);
                    $query="INSERT INTO visual_phonebook VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
                    $db->consulta($query,$campos[0],$campos[1],$campos[2],$campos[3],$campos[4],$campos[5],$campos[6],$campos[7],$campos[8],$campos[9]);
                }
                unlink('/tmp/visphonebak.db');
            }
        }
    }
} 

$grid = new dbgrid($db);
$grid->set_table('visual_phonebook');
//$grid->set_caption(trans('Manage Phonebook'));
$grid->salt("dldli3ks");
$grid->hide_field('id');
$grid->hide_field('private');
$grid->no_edit_field('id');
$grid->set_per_page(5);
$grid->set_fields('id,firstname,lastname,phone1,phone2,company,context,owner,picture,private');
$grid->set_condition("context='$context' AND (owner='$extension' OR (owner<>'$extension' AND private='no'))");
$grid->set_default_values("context",$context);
$grid->set_default_values("owner",$extension);
$grid->set_input_type("context","hidden");
$grid->set_input_type("owner","hidden");
$grid->hide_field('context');
$grid->hide_field('owner');
$grid->edit_field_condition("private",'owner','=',$extension);


$grid->set_input_style("private","style='width:100px;'");
$grid->set_input_parent_style("firstname","style='width:48%; float:left;'");
$grid->set_input_parent_style("lastname","style='width:48%; float:right; margin-right:10px;'");
$grid->set_input_parent_style("company","style='clear:both;'");
$grid->set_input_parent_style("phone1","style='width:48%; float:left;clear:both;'");
$grid->set_input_parent_style("phone2","style='width:48%; float:right; margin-right:10px;'");
$grid->set_input_parent_style("picture","style='float:left;'");
$grid->set_input_parent_style("private","style='float:right;'");

$fieldname = Array();
$fieldname[]=trans('First Name');
$fieldname[]=trans('Last Name');
$fieldname[]=trans('Phone 1');
$fieldname[]=trans('Phone 2');
$fieldname[]=trans('Company');
$fieldname[]=trans('Private');
$fieldname[]=trans('Picture');

//$grid->set_fields ( "id,firstname,lastname,company,phone1,phone2,owner,private,picture"); 
$grid->set_display_name( array('firstname','lastname','phone1','phone2','company','private','picture'),
                         $fieldname);
$grid->allow_view(true);
$grid->allow_edit(true);
$grid->allow_delete(true);
$grid->allow_add(true);
$grid->allow_export(true);
$grid->allow_import(true);
$grid->allow_search(true);
$grid->set_search_fields(array('firstname','lastname','company','phone1','phone2'));

$grid->set_input_type('picture','img');
//$grid->set_input_type('owner','select',array($extension,''));

$grid->force_import_field("context",$context);
$grid->force_import_field("owner",$extension);

$grid->add_display_filter('picture','display_image');
$grid->add_display_filter('phone1','clickdial');
$grid->add_display_filter('phone2','clickdial');

$grid->set_user_directory('./uploads/'.$addcontext);

//$grid->add_validation_type('email','email');
$grid->show_grid();


function display_image($img) {
    global $addcontext;
    if(is_file("./uploads/${addcontext}$img")) {
        return "<img src='./uploads/${addcontext}$img' height='45' style='max-height: 45px; max-width:100px'/>";
    } else { 
        return "<div style='height: 45px; max-height: 45px;'></div>"; 
    }
}

function clickdial($number) {
   $numberstrip = preg_replace("/[^0-9]/","",$number);
   return "<a href='http://www.fop2.com' onclick='parent.dial(\"$numberstrip\"); return false;'>$number</a>";
}

?>
</div>
</body>
</html>
