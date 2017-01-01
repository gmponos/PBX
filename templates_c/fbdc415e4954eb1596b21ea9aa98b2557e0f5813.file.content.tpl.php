<?php /* Smarty version Smarty-3.1.7, created on 2013-07-29 12:34:23
         compiled from "./templates/cdr/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158793036951f6371f778b17-35755012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbdc415e4954eb1596b21ea9aa98b2557e0f5813' => 
    array (
      0 => './templates/cdr/content.tpl',
      1 => 1362007022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158793036951f6371f778b17-35755012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pages' => 0,
    'selected' => 0,
    'sqldebug' => 0,
    'sdate' => 0,
    'edate' => 0,
    'gotIncoming' => 0,
    'gotOutgoing' => 0,
    'gotInternal' => 0,
    'filter' => 0,
    'fval' => 0,
    'filter2' => 0,
    'total_records' => 0,
    'fromStart' => 0,
    'number_of_pages' => 0,
    'current_page' => 0,
    'first_rec' => 0,
    'last_rec' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_51f637205779a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f637205779a')) {function content_51f637205779a($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/inc/libs/plugins/function.cycle.php';
?><ul id="maintab">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pages']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
<li <?php if ($_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['is_selected']=='1'){?> class="selected" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['page'];?>
"><img width="16" height="16" align="Texttop" border="0" src="images/<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['image'];?>
"><?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</a></li>
<?php endfor; endif; ?>
</ul>
<div id="tabcontent" class="clearfix"><ul>
<?php if ($_smarty_tpl->tpl_vars['selected']->value=='list'){?>
<li class="selected"><a href="cdr.php?action=start">Έγγραφες</a></li>
<?php }else{ ?>
<li><a href="cdr.php?action=start">Έγγραφες</a></li>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['selected']->value=='stats'){?>
<li class="selected"><a href="stats.php">Στατιστικά Χρήσης</a></li>
<?php }else{ ?>
<li><a href="stats.php">Στατιστικά Χρήσης</a></li>
<?php }?>
</ul>
</div>
</div>
<!-- calendar stylesheet -->
  <link rel="stylesheet" type="text/css" media="all" href="inc/libs/jscalendar/calendar-win2k-cold-1.css" title="win2k-cold-1" />
  <script type="text/javascript" src="inc/libs/jscalendar/calendar.js"></script>
  <script type="text/javascript" src="inc/libs/jscalendar/lang/calendar-el.js"></script>
  <script type="text/javascript" src="inc/libs/jscalendar/calendar-setup.js"></script>

<?php if ($_smarty_tpl->tpl_vars['selected']->value=='list'){?>
<div id="mainContent">
	<?php echo $_smarty_tpl->tpl_vars['sqldebug']->value;?>

   <table border=0 width=100%<?php ?>><tr><td width=1% valign="top">
      <div class="contentbox">
     <table class="cdrmenu" border=0>
	<tr><td class="hed" colspan=3 align=left>Χρονική Περίοδος</tr></td>
        <form name=search method = "POST" action = "cdr.php?action=list">
	<tr><td align=left>Από: </td><td><input type="text" name="sdate" id="s_date" size=9 readonly="1" value="<?php echo $_smarty_tpl->tpl_vars['sdate']->value;?>
"/></td><td><img src="inc/libs/jscalendar/img.gif" id="s_date_trigger" style="cursor: pointer; border: 0px solid red;" title="Επιλογή Αρχικής Ημερομηνίας" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></td> </tr>
	
	<script type="text/javascript">
    	Calendar.setup({
        inputField     :    "s_date",     
        ifFormat       :    "%d-%m-%Y",      
        button         :    "s_date_trigger",  
        align          :    "Bl",           
        singleClick    :    true,
        firstDay       :    1,
        weekNumbers    :    false});
	calendar.setDate(new Date());
       </script>
	
	<tr><td align=left >Έως:</td><td> <input type="text" name="edate" id="e_date" size=9 readonly="1" value="<?php echo $_smarty_tpl->tpl_vars['edate']->value;?>
"/></td><td><img src="inc/libs/jscalendar/img.gif" id="e_date_trigger" style="cursor: pointer; border: 0px solid red;" title="Επιλογή Τελικής Ημερομηνίας" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></td> </tr>
	
	<script type="text/javascript">
    	Calendar.setup({
        inputField     :    "e_date",     
        ifFormat       :    "%d-%m-%Y",      
        button         :    "e_date_trigger",  
        align          :    "Bl",           
        singleClick    :    true,
        firstDay       :    1,
        weekNumbers    :    false});
       </script>
	
     </table>
	<br/>
    <table class="cdrmenu" border=0>
      <tr><td class="hed" colspan=3 align=left>Κλήσεις</tr></td>
      <tr><td align=left colspan=3><input type="checkbox" <?php echo $_smarty_tpl->tpl_vars['gotIncoming']->value;?>
 name="Incoming" value="true"> Εισερχόμενες </td> </tr>
      <tr><td align=left colspan=3><input type="checkbox" <?php echo $_smarty_tpl->tpl_vars['gotOutgoing']->value;?>
 name="Outgoing" value="true"> Εξερχόμενες </td> </tr>
      <tr><td align=left colspan=3><input type="checkbox" <?php echo $_smarty_tpl->tpl_vars['gotInternal']->value;?>
 name="Internal" value="true"> Εσωτερικες </td> </tr>
     </table>
        <br/>
    <table class="cdrmenu" border=0>
      <tr><td class="hed" colspan=3 align=left>Φίλτρο ως προς</tr></td>
      <tr><td align=center colspan=3><SELECT name="filter">
	<?php if ($_smarty_tpl->tpl_vars['filter']->value=='dst'){?>
	<OPTION value="src">Αρ. Προέλευσης</OPTION>
	<OPTION selected value="dst">Αρ. Προορισμού</OPTION></td> </tr>
	<?php }else{ ?>
	<OPTION selected value="src">Αρ. Προέλευσης</OPTION>
	<OPTION value="dst">Αρ. Προορισμού</OPTION></td> </tr>
	<?php }?>
      <tr><td align=center colspan=3><input type="text" name="fval" value="<?php echo $_smarty_tpl->tpl_vars['fval']->value;?>
" size=12> </td> </tr>
      <tr><td class="hed" colspan=3 align=left>Αποτέλεσμα</tr></td>
      <tr><td align=center colspan=3><SELECT name="filter2">
	<?php if ($_smarty_tpl->tpl_vars['filter2']->value=='all'){?>
	<OPTION selected value="all">Όλα</OPTION>
	<OPTION value="answered">Απαντήθηκαν</OPTION>
	<OPTION value="not_answered">Αναπάντητες</OPTION></td> </tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['filter2']->value=='answered'){?>
	<OPTION value="all">Όλα</OPTION>
	<OPTION selected value="answered">Απαντήθηκαν</OPTION>
	<OPTION value="not_answered">Αναπάντητες</OPTION></td> </tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['filter2']->value=='not_answered'){?> 
	<OPTION value="all">Όλα</OPTION>
	<OPTION value="answered">Απαντήθηκαν</OPTION><
	<OPTION selected value="not_answered">Αναπάντητες</OPTION></td></tr>
	<?php }?>
      <tr><td align=center colspan=3><input class="go" type="submit" value="Εκτέλεση" title="Πατήστε για εκτέλεση" border="0" /> </td> </tr>
        </form>
      </tr>
     </table>
	</div>
      <?php if ($_smarty_tpl->tpl_vars['total_records']->value>0&&$_smarty_tpl->tpl_vars['fromStart']->value!='true'){?>
	<div class="contentbox">
		<table class="cdrmenu">
		 <tr><td align="center">
		<a href="cdrexport.php"><img src="images/excel.gif" style="border: 0px none ; cursor: pointer;"></a></td></tr>
		<tr><td align="center"> Εξαγωγή σε αρχείο EXCEL</td></tr></table>
	</div>
      <?php }?>
   <td width=99%  valign="top">
      <?php if ($_smarty_tpl->tpl_vars['total_records']->value>0&&$_smarty_tpl->tpl_vars['fromStart']->value!='true'){?>
	<div class="contentbox">
	<table width=100%<?php ?>><tr><td align="right"><span class="cdrtopspan">
			<?php if (($_smarty_tpl->tpl_vars['number_of_pages']->value>'1')&&$_smarty_tpl->tpl_vars['current_page']->value!='1'){?><a href="cdr.php?action=list&page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
">< Προηγούμενη</a> <?php }?>
			<b><?php echo $_smarty_tpl->tpl_vars['first_rec']->value;?>
</b> - <b><?php echo $_smarty_tpl->tpl_vars['last_rec']->value;?>
</b> από <b><?php echo $_smarty_tpl->tpl_vars['total_records']->value;?>
</b>
			<?php if (($_smarty_tpl->tpl_vars['number_of_pages']->value>'1')&&$_smarty_tpl->tpl_vars['current_page']->value!=$_smarty_tpl->tpl_vars['number_of_pages']->value){?><a href="cdr.php?action=list&page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
"> Επόμενη ></a><?php }?>
</span></td></tr>
      <tr><td align="center">
      <table class="kold">
       <tr>
	<td colspan=9>
       </td>
       </tr>
       <tr>
        <td class="hed">&nbsp;</td>
        <td class="hed">Ημερομηνία</td>
        <td class="hed">Αρ.Προέλευσης</td>
        <td class="hed">Αρ.Κλήσης</td>
        <td class="hed">Διάρκεια</td>
        <td class="hed">Παρατηρήσες</td>
      </tr>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
        <tr class="<?php echo smarty_function_cycle(array('values'=>"odd,even"),$_smarty_tpl);?>
">
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='00')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/internal_na.gif" title="ΕΣΩΤΕΡΙΚΗ-ΑΝΑΠΑΝΤΗΤΗ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='00')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/internal_na.gif" title="ΕΣΩΤΕΡΙΚΗ-ΑΝΑΠΑΝΤΗΤΗ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='01')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/Callin_na.gif" title="ΕΙΣΕΡΧΟΜΕΝΗ-ΑΝΑΠΑΝΤΗΤΗ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='01')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/Callin_na.gif" title="ΕΙΣΕΡΧΟΜΕΝΗ-ΑΝΑΠΑΝΤΗΤΗ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='02')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/Callout_na.gif" title="ΕΞΕΡΧΟΜΕΝΗ-ΑΝΑΠΑΝΤΗΤΗ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='02')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/Callout_na.gif" title="ΕΞΕΡΧΟΜΕΝΗ-ΑΝΑΠΑΝΤΗΤΗ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='10')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/internal_ok.gif" title="ΕΣΩΤΕΡΙΚΗ-ΑΠΑΝΤΗΘΗΚΕ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='10')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/internal_ok.gif" title="ΕΣΩΤΕΡΙΚΗ-ΑΠΑΝΤΗΘΗΚΕ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='11')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/Callin_ok.gif" title="ΕΙΣΕΡΧΟΜΕΝΗ-ΑΠΑΝΤΗΘΗΚΕ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='11')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/Callin_ok.gif" title="ΕΙΣΕΡΧΟΜΕΝΗ-ΑΠΑΝΤΗΘΗΚΕ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='12')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/Callout_ok.gif" title="ΕΞΕΡΧΟΜΕΝΗ-ΑΠΑΝΤΗΘΗΚΕ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='12')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/Callout_ok.gif" title="ΕΞΕΡΧΟΜΕΝΗ-ΑΠΑΝΤΗΘΗΚΕ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='20')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΙΣΕΡΧΟΜΕΝΗ-ΑΠΑΣΧΟΛΗΜΕΝΟ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='20')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/Callout_ok.gif" title="ΕΞΕΡΧΟΜΕΝΗ-ΑΠΑΝΤΗΘΗΚΕ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='21')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΙΣΕΡΧΟΜΕΝΗ-ΑΠΑΣΧΟΛΗΜΕΝΟ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='21')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΙΣΕΡΧΟΜΕΝΗ-ΑΠΑΣΧΟΛΗΜΕΝΟ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='22')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΞΕΡΧΟΜΕΝΗ-ΑΠΑΣΧΟΛΗΜΕΝΟ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='22')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΞΕΡΧΟΜΕΝΗ-ΑΠΑΣΧΟΛΗΜΕΝΟ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='30')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΣΩΤΕΡΙΚΗ-ΛΑΘΟΣ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='30')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΣΩΤΕΡΙΚΗ-ΛΑΘΟΣ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='31')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΙΣΕΡΧΟΜΕΝΗ-ΛΑΘΟΣ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='31')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΙΣΕΡΧΟΜΕΝΗ-ΛΑΘΟΣ"></td>
<?php }?>
	    <?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='32')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']!='')){?><td><a href="/rec/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec'];?>
.wav"><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΞΕΡΧΟΜΕΝΗ-ΛΑΘΟΣ"></a></td> <?php }?>
<?php if (($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['disposition']=='32')&&($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['rec']=='')){?>
<td><img  border="0" src="./images/callstates/CallFailed.gif" title="ΕΞΕΡΧΟΜΕΝΗ-ΛΑΘΟΣ"></td>
<?php }?>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['calldate'];?>
</td>
            <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['src']==''){?><td align=center>Ανώνυμο</td><?php }else{ ?><td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['src'];?>
</td><?php }?>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dst'];?>
</td>

            <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['billsec']!='0'){?><td align=center><b><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['billsec'];?>
</b></td><?php }else{ ?><td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['billsec'];?>
</td><?php }?>
	    <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['userfield'];?>
</td>
        </tr>
	</div>
<?php endfor; endif; ?>
   <?php }elseif($_smarty_tpl->tpl_vars['fromStart']->value=='true'){?>
	<div class="info">Παρακαλώ εισάγετε τα κριτήρια αναζήτησής σας.</div>
   <?php }else{ ?>
	<div class="info">Δεν βρέθηκαν εγγραφές με βάση τα κριτήρια αναζήτησής σας.</div>

   <?php }?>
    </table>
	</td</tr></table>
</div>

<?php }?>
  </td>
  </tr>
  </table>
<br/>
</div>


<?php }} ?>