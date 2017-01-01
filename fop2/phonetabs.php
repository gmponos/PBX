<?php
require_once("config.php");
$recordings=1;
$res = $db->consulta("DESC fop2recordings");
if(!$res) {
  $recordings=0;
}
$cdr=1;
$res = $db->consulta("DESC asteriskcdrdb.cdr");
if(!$res) {
  $cdr=0;
}
?>
<script type="text/javascript">
//<![CDATA[
function loadTabs() {
var tabs = new tabset('ptabs'); // name of div to crawl for tabs and panels
tabs.autoActivate($('tab_first')); // name of tab to auto-select if none exists in the url
}
loadTabs();
//]]>
</script>

<div id="ptabs">
<ul id="tabnav">
  <li><a href="http://www.fop2.com" onclick='event.returnValue=false; return false;' id="tab_first" class="tab"><span id='phonebook'>Phonebook</span></a></li>
<?php if($recordings==1) { ?>
  <li><a href="http://www.fop2.com" onclick='event.returnValue=false; return false;' id="tab_second" class="tab"><span id='recordings'>Recordings</span></a></li>
<?php } ?>
<?php if($cdr==1) { ?>
  <li><a href="http://www.fop2.com" onclick='event.returnValue=false; return false;' id="tab_third" class="tab"><span id='cdrrecords'>Call History</span></a></li>
<?php } ?>
</ul>
<div id="panel_first" class="panel">
  <iframe src="phonebook.php" name="window" align='center' width='920' height='479'>
  </iframe>
</div>
<div id="panel_second" class="panel">
  <iframe src="recordings.php" name="window" align='center' width='920' height='479'>
  </iframe>
</div>
<div id="panel_third" class="panel">
  <iframe src="showcdr.php" name="window" align='center' width='920' height='479'>
  </iframe>
</div>
</div>
