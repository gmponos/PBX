<?php /* Smarty version Smarty-3.1.7, created on 2013-11-19 12:01:07
         compiled from "./templates/extensions/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1551298967528b36e32cf113-46737506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f48481e65245bf6e74c67b4094bf1d45e27a113' => 
    array (
      0 => './templates/extensions/list.tpl',
      1 => 1328290939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1551298967528b36e32cf113-46737506',
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
  'unifunc' => 'content_528b36e353f2c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528b36e353f2c')) {function content_528b36e353f2c($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/inc/libs/plugins/function.cycle.php';
?><?php if ($_smarty_tpl->tpl_vars['selected']->value=='extensions_list'){?>
<div id="mainContent">

<h2  class='title'><a href="extensions_edit.php" >Προσθήκη νέου εσωτερικού </a></h2>

<?php if ($_smarty_tpl->tpl_vars['info']->value!=''){?>
<div id="info" class="info">
<?php echo $_smarty_tpl->tpl_vars['info']->value;?>

</div>
<?php }?>

      <table class="kold">
       <tr>
        <td class="hed">Εσωτερικό</td>
        <td class="hed">Χρήστης</td>
        <td class="hed">Email</td>
        <td class="hed">Πρόσβαση</td>
        <td class="hed">Τμήμα</td>
        <td class="hed">Τύπος συσκευής</td>
        <td class="hed">Mac Address</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
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
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['extension'];?>
</td>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</td>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['email'];?>
</td>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['context'];?>
</td>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group'];?>
</td>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['device'];?>
</td>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['mac'];?>
</td>
	    <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fwd_target']==''){?>
            <td align=center>
	    <form id="within_table" name=fwd_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['extension'];?>
 method="POST" action="forwardings.php">
            <input type="Hidden" name="extension" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['extension'];?>
">
            <input type="Hidden" name="target" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fwd_target'];?>
">
            <input type="Hidden" name="condition" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fwd_condition'];?>
">
            <input type="Hidden" name="timeout" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fwd_timeout'];?>
">
            <input type="Hidden" name="operation" value="edit">
            <input type="image" src='images/redirect_off.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
	    <?php }else{ ?>
            <td align=center>
            <form id="within_table" name=fwd_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['extension'];?>
 method="POST" action="forwardings.php">
            <input type="Hidden" name="extension" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['extension'];?>
">
            <input type="Hidden" name="target" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fwd_target'];?>
">
            <input type="Hidden" name="condition" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fwd_condition'];?>
">
            <input type="Hidden" name="timeout" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fwd_timeout'];?>
">
            <input type="Hidden" name="operation" value="edit">
            <input type="image" src='images/redirect_on.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
	    <?php }?>
            <td align=center>
            <form id="within_table" name=edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['user_id'];?>
 method="POST" action="extensions_edit.php">
            <input type="Hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['user_id'];?>
">
            <input type="image" src='images/edit-16.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
            <td align=center>
	    <form id="within_table" name=del_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['user_id'];?>
 method="POST" action="extensions.php?action=delete" onclick="if (confirm('Θέλετε να διαγράψετε το εσωτερικό;')) return true; else return false;">
            <input type="Hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['user_id'];?>
">
            <input type="image" src='images/del-16.png' title="Πατήστε για διαγραφή" /></form></td>
	    </form>
            </td>
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