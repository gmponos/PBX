<?php /* Smarty version Smarty-3.1.7, created on 2014-02-05 16:29:17
         compiled from "./templates/extensions/did_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158349754952f24abd7d8340-02533703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b30f69726e9bc92ac9fb1a15f50a0f959294ab6' => 
    array (
      0 => './templates/extensions/did_list.tpl',
      1 => 1329595434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158349754952f24abd7d8340-02533703',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected' => 0,
    'info' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f24abda9596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f24abda9596')) {function content_52f24abda9596($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/inc/libs/plugins/function.cycle.php';
?><?php if ($_smarty_tpl->tpl_vars['selected']->value=='did_list'){?>
<div id="mainContent">

<?php if ($_smarty_tpl->tpl_vars['info']->value!=''){?>
<div id="info" class="info">
<?php echo $_smarty_tpl->tpl_vars['info']->value;?>

</div>
<?php }?>
      <table class="kold" style="width: 600px;">
       <tr>
        <td class="hed">Κεφαλικός αριθμός</td>
        <td class="hed">Διεπιλογικό Νούμερο</td>
        <td class="hed">Δρομολόγηση</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
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
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['trunk'];?>
</td>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['did_number'];?>
</td>
	    <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type']=='extension'){?>
            <td align=center>Εσωτερικό: <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type_data'];?>
</td>
	    <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type']=='group'){?>		
            <td align=center>Ομάδα κλήσεων: <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type_data'];?>
</td>
		<?php }?>
	    <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type']=='fax'){?>		
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type_data'];?>
</td>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type']==''){?>		
            <td align=center>&nbsp</td>
		<?php }?>
	    <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type']!='context'){?>
            <td align=center>
            <form id="within_table" name=edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['trunk'];?>
_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['did_number'];?>
 method="POST" action="did_edit.php">
            <input type="Hidden" name="trunk" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['trunk'];?>
">
            <input type="Hidden" name="did_number" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['did_number'];?>
">
            <input type="Hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type'];?>
">
            <input type="Hidden" name="type_data" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type_data'];?>
">
            <input type="Hidden" name="operation" value="edit">
            <input type="image" src='images/edit-16.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
 	    <td align=center>
            <form id="within_table" name=del_e_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['trunk'];?>
_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['did_number'];?>
 method="POST" action="did.php?action=delete" onclick="if (confirm('Θέλετε να διαγράψετε τη δρομολόγηση του διεπιλογικού;')) return true; else return false;">
            <input type="Hidden" name="trunk" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['trunk'];?>
">
            <input type="Hidden" name="did" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['did_number'];?>
">
            <input type="image" src='images/del-16.png' title="Πατήστε για διαγραφή" /></form></td>
            </form>
            </td>
	    <?php }else{ ?>
	    <td>&nbsp;</td>
            <td>&nbsp;</td>
	    <?php }?>
        </tr>
<?php endfor; endif; ?>
    </table>
</div>

<?php }?>
  </td>
  </tr>
  </table>
<br/>
</div>
<?php }} ?>