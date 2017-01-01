<?php /* Smarty version Smarty-3.1.7, created on 2013-08-06 09:20:56
         compiled from "./templates/cdr/stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1348324914520095c88c5d14-68790518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9863cbd24bbac2359e18b550115411535f225d84' => 
    array (
      0 => './templates/cdr/stats.tpl',
      1 => 1329306915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1348324914520095c88c5d14-68790518',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pages' => 0,
    'selected' => 0,
    'sdate' => 0,
    'edate' => 0,
    'display' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_520095c8b0446',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520095c8b0446')) {function content_520095c8b0446($_smarty_tpl) {?><ul id="maintab"><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
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
?><li <?php if ($_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['is_selected']=='1'){?> class="selected"<?php }?>>
<a href="<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['page'];?>
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
<li class="selected"><a href="cdr.php?action=stats">Στατιστικά Χρήσης</a></li>
<?php }else{ ?>
<li><a href="cdr.php?action=stats">Στατιστικά Χρήσης</a></li>
<?php }?>
</ul>
</div>
</div>
<!-- calendar stylesheet -->
  <link rel="stylesheet" type="text/css" media="all" href="inc/libs/jscalendar/calendar-win2k-cold-1.css" title="win2k-cold-1" />
  <script type="text/javascript" src="inc/libs/jscalendar/calendar.js"></script>
  <script type="text/javascript" src="inc/libs/jscalendar/lang/calendar-el.js"></script>
  <script type="text/javascript" src="inc/libs/jscalendar/calendar-setup.js"></script>

<div id="mainContent">
   <table border=0 width=100%<?php ?>><tr><td width=1% valign="top">
      <div class="contentbox">
     <table class="cdrmenu" border=0>
	<tr><td class="hed" colspan=3 align=left>Χρονική Περίοδος</tr></td>
        <form name=search method = "POST" action = "stats.php">
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
	
      <tr><td align=center colspan=3><input class="go" type="submit" value="Εκτέλεση" title="Πατήστε για εκτέλεση" border="0" /> </td> </tr>
        </form>
      </tr>
     </table>
	</div>
   <td width=99%  valign="top">
	 <?php if ($_smarty_tpl->tpl_vars['display']->value>0){?>
	 <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	 $url = "http://" . $_SERVER["SERVER_ADDR"] . "/stats-chart-out.php?do&sdate=" . $_SESSION['sdate']. "&edate=" .$_SESSION['edate'];
	 include_once 'inc/php-ofc-library/open_flash_chart_object.php';
	 open_flash_chart_object( 800, 250, "$url", false );
	 <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	</br>
	 <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	 $url = "http://" . $_SERVER["SERVER_ADDR"] . "/stats-chart-ext-out.php?do&sdate=" . $_SESSION['sdate']. "&edate=" .$_SESSION['edate'];
	 include_once 'inc/php-ofc-library/open_flash_chart_object.php';
	 open_flash_chart_object( 800, 250, "$url", false );
	 <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	</br>
	 <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	 $url = "http://" . $_SERVER["SERVER_ADDR"] . "/stats-chart-ext-in.php?do&sdate=" . $_SESSION['sdate']. "&edate=" .$_SESSION['edate'];
	 include_once 'inc/php-ofc-library/open_flash_chart_object.php';
	 open_flash_chart_object( 800, 250, "$url", false );
	 <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	 <?php }?>
    </table>
	</td</tr></table>
</div>

  </td>
  </tr>
  </table>
<br/>
</div>


<?php }} ?>