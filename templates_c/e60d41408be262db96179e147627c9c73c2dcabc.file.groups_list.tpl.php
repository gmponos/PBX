<?php /* Smarty version Smarty-3.1.7, created on 2014-02-05 16:29:16
         compiled from "./templates/extensions/groups_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:861703152f24abc260580-24410077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e60d41408be262db96179e147627c9c73c2dcabc' => 
    array (
      0 => './templates/extensions/groups_list.tpl',
      1 => 1329607859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '861703152f24abc260580-24410077',
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
  'unifunc' => 'content_52f24abc7a92b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f24abc7a92b')) {function content_52f24abc7a92b($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/inc/libs/plugins/function.cycle.php';
?><?php if ($_smarty_tpl->tpl_vars['selected']->value=='groups_list'){?>
<div id="mainContent">

<h2  class='title'><a href="groups_add.php" >Προσθήκη νέας ομάδας </a></h2>

<?php if ($_smarty_tpl->tpl_vars['info']->value!=''){?>
<div id="info" class="info">
<?php echo $_smarty_tpl->tpl_vars['info']->value;?>

</div>
<?php }?>

      <table class="kold">
       <tr>
        <td class="hed">Αριθμός</td>
        <td class="hed">Όνομα</td>
		<td class="hed">Ηχογράφηση</td>
        <td class="hed">Μέλη</td>
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
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_number'];?>
</td>
            <td align=center><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_name'];?>
</td>
            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['call_recording'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=='t'){?>
			<td align=center>ΝΑΙ</td>
            <?php }else{ ?>
			<td align=center>OXI</td>
            <?php }?>
			<td align=center><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['y'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['y']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['name'] = 'y';
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['members']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total']);
?> <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['members'][$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']][$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_number']];?>
<?php endfor; endif; ?></td>
            <td align=center>
            <form id="within_table" name=edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_number'];?>
 method="POST" action="groups_edit.php">
            <input type="Hidden" name="group_number" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_number'];?>
">
            <input type="Hidden" name="group_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_name'];?>
">
            <input type="image" src='images/edit-16.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
            <td align=center>
	    <form id="within_table" name=del_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_number'];?>
 method="POST" action="groups.php?action=delete" onclick="if (confirm('Θέλετε να διαγράψετε την ομάδα;')) return true; else return false;">
            <input type="Hidden" name="group" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_number'];?>
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