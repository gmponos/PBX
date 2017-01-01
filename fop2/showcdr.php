<?php
header("Content-Type: text/html; charset=utf-8");
require_once("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <link rel="stylesheet" type="text/css" href="css/vmail.css" />
    <!--link rel="stylesheet" type="text/css" href="css/calendar.css" /-->
    <script type="text/javascript" src="js/swfobject.js"></script>
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/tinywav.js"></script>
    <!--script type="text/javascript" src="js/calendar.js"></script-->


<?php
if(isset($extrahead)) {
    foreach($extrahead as $bloque) {
        echo "$bloque";
    }
}
?>
<script>

function debug(message) {
    if(window.console !== undefined) {
        console.log(message);
    }
};

function setFilterDir(elem) {
    valor = elem.options[elem.selectedIndex].value;
    insertParam('filterdir',valor);
}

function setFilterDispo(elem) {
    valor = elem.options[elem.selectedIndex].value;
    insertParam('filterdispo',valor);
}


function insertParam(key, value)
{
    key = escape(key); value = escape(value);

    var kvp = document.location.search.substr(1).split('&');

    var i=kvp.length; var x; while(i--) 
    {
        x = kvp[i].split('=');

        if (x[0]==key)
        {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
        }
    }

    if(i<0) {kvp[kvp.length] = [key,value].join('=');}

    //this will reload the page, it's likely better to store this until finished
    document.location.search = kvp.join('&'); 
}

function playVmail(hash,file,iconid) {

    var url  = 'setvar.php';
    var pars = 'sesvar=vfile&value='+file;
    var url2 = "download.php?file="+hash+"!"+file;

    if($(''+iconid).hasClassName('pauseicon')) {
        window.TinyWav.Pause(url2,iconid);
    } else {
        $(''+iconid).addClassName('waiticon');

        var pepe = new Ajax.Request(url, {
          method: 'post',
          postBody:pars,
          onSuccess: function(transp) {
              debug("success "+url2);
              if($(''+iconid).hasClassName('playicon')) {
                  $(''+iconid).removeClassName('waiticon');
                  debug("success play");
                  window.TinyWav.Play(url2,iconid);
              }
          }
        });
    }
}

function downloadVmail(hash,file) {

    var url   = 'setvar.php';
    var pars1 = 'sesvar=vfile&value='+file;
    var pars2 = hash+"!"+file;
    var areq = new Ajax.Request(url, {
      method: 'post',
      postBody:pars1,
      onSuccess: function(transp) {
          downloadFile("download.php",pars2);
      }
    });
}

function downloadFile(url,pars) {
    $('dloadfrm').action = url;
    $('file').value = pars;
    $('dloadfrm').submit();
}

</script>

</head>
<body>
<div style='width: 95%; padding: 1em;'>
<?php

$context   = $_SESSION[MYAP]['context'];
$extension = $_SESSION[MYAP]['extension'];
$allowed   = $_SESSION[MYAP]['phonebook'];
$admin     = $_SESSION[MYAP]['admin'];

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

$grid =  new dbgrid($db);
$grid->set_table('asteriskcdrdb.cdr');
$grid->set_pk('uniqueid');
$grid->add_structure('number', 'text',null,'');
$grid->salt("dldli3ksa");
$grid->set_fields("calldate,IF(dst='".$extension."','inbound','outbound') as direction,IF(dst='".$extension."',src,dst) as number,duration,billsec,disposition,uniqueid");
$grid->hide_field('uniqueid');
$grid->no_edit_field('uniqueid');
$grid->no_edit_field('number');
$grid->set_per_page(10);



$condstring="";

$mifilt = $_REQUEST['filterdir'];

if($mifilt=="") {
    $condstring ="(src='$extension' OR dst='$extension') ";
} else if($mifilt=="inbound") {
    $condstring ="(dst='$extension') ";
} else {
    $condstring="(src='$extension') ";
}

$customboton="<div class='fbutton'>
             <select name='filterby' onchange='setFilterDir(this)'>";
$customboton.="<option value='' "; if($mifilt=='') { $customboton.= 'selected'; }; $customboton.= ">All</option>\n";
$customboton.="<option value='inbound' "; if($mifilt=='inbound'){ $customboton.= 'selected';}; $customboton.= ">Inbound</option>\n";
$customboton.="<option value='outbound' ";if($mifilt=='outbound'){ $customboton.= 'selected';}; $customboton.= ">Outbound</option>\n";
$customboton.="</select>
             </div>\n";

$grid->add_custom_toolbar($customboton);

$mifilt = $_REQUEST['filterdispo'];

if($mifilt<>"") {
    if($condstring<>"") { $condstring .= " AND "; }
    $condstring .="(disposition='".strtoupper($mifilt)."') ";
} 

$customboton="<div class='fbutton'>
             <select name='filterbydispo' onchange='setFilterDispo(this)'>";
$customboton.="<option value='' "; if($mifilt=='') { $customboton.= 'selected'; }; $customboton.= ">All</option>\n";
$customboton.="<option value='answered' "; if($mifilt=='answered'){ $customboton.= 'selected';}; $customboton.= ">Answered</option>\n";
$customboton.="<option value='no answer' ";if($mifilt=='no answer'){ $customboton.= 'selected';}; $customboton.= ">No answer</option>\n";
$customboton.="<option value='busy' ";if($mifilt=='busy'){ $customboton.= 'selected';}; $customboton.= ">Busy</option>\n";
$customboton.="<option value='failed' ";if($mifilt=='failed'){ $customboton.= 'selected';}; $customboton.= ">Failed</option>\n";
$customboton.="</select>
             </div>\n";
$grid->add_custom_toolbar($customboton);


$grid->set_condition($condstring);
/*
$fieldname = Array();
$fieldname[]=trans('Unique ID');
$fieldname[]=trans('Date');
$fieldname[]=trans('Owner Extension');
$fieldname[]=trans('Target Extension');
$fieldname[]=trans('Actions');
$fieldname[]=trans('Duration');
$fieldname[]=trans('Context');
$grid->set_display_name( array('uniqueid','datetime','ownerextension','targetextension','filename','duration','context'),
                         $fieldname);
*/
$grid->set_nocheckbox(true);
$grid->allow_view(true);
$grid->allow_edit(false);
$grid->allow_delete(false);
$grid->allow_add(false);
$grid->allow_export(false);
$grid->allow_import(false);
$grid->allow_search(true);
$grid->set_orderby("calldate");
$grid->set_orderdirection("DESC");
$grid->set_search_fields(array('src','dst','calldate'));

$grid->add_display_filter('disposition','dispoColor');
//$grid->add_display_filter('filename','downloadfile');

/*
$grid->set_input_parent_style("uniqueid","style='width:48%; float:left;'");
$grid->set_input_parent_style("datetime","style='width:48%; float:right; margin-right:10px;'");
$grid->set_input_parent_style("ownerextension","style='clear:both;width:48%; float:left;'");
$grid->set_input_style("ownerextension","style='text-indent:120px;'");
$grid->set_input_style("targetextension","style='text-indent:120px;'");
$grid->set_input_parent_style("targetextension","style='width:48%; float:right; margin-right:10px;'");
*/
//$grid->add_validation_type('email','email');

$grid->add_display_filter('number','clickdial');

$grid->show_grid();

function dispoColor($dispo) {
   $color=array();
   $color['ANSWERED']="<span style='color: green;'>$dispo</span>";
   $color['NO ANSWER']="<span style='color: red;'>$dispo</span>";
   $color['FAILED']="<span style='color: red;'>$dispo</span>";
   $color['BUSY']="<span style='color: orange;'>$dispo</span>";
   if(isset($color[$dispo])) {
      return $color[$dispo];
   } else {
      return $dispo;
   }
}

function downloadfile($filename) {
   $hash=md5($_SESSION[MYAP]['key']);
   return "<div id='$filename' class='playicon' title='Play' onclick='playVmail(\"$hash\",\"$filename\",\"$filename\")'><img src='images/pixel.gif' width=16 height=16 alt='pixel' border='0' /></div><div onclick='javascript:downloadVmail(\"$hash\",\"$filename\");' class='downloadicon' title='Download' id='downloadvm_$filename'><img src='images/pixel.gif' width=16 height=16 alt='pixel' border='0' /></div>";
}

function clickdial($number) {
   $numberstrip = preg_replace("/[^0-9]/","",$number);
   return "<a href='http://www.fop2.com' onclick='parent.dial(\"$numberstrip\"); return false;'>$number</a>";
}


?>
</div>
<form id='dloadfrm' method='post'><input type=hidden id='file' name='file'/></form>
</body>
</html>
