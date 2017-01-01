<?php /* Smarty version Smarty-3.1.7, created on 2014-02-05 16:32:08
         compiled from "./templates/extensions/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213245926252f24b6854ff48-39574508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff3f1fed23e8a3466ea87148057eacd7dbeb7cef' => 
    array (
      0 => './templates/extensions/add.tpl',
      1 => 1294463842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213245926252f24b6854ff48-39574508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'info' => 0,
    'extension' => 0,
    'password' => 0,
    'pin' => 0,
    'name' => 0,
    'surname' => 0,
    'cid' => 0,
    'email' => 0,
    'groups' => 0,
    'contexts' => 0,
    'data' => 0,
    'device_mac' => 0,
    'call_recording' => 0,
    'cw' => 0,
    'gen_config' => 0,
    'selected' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f24b68b95e8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f24b68b95e8')) {function content_52f24b68b95e8($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/inc/libs/plugins/function.html_options.php';
?><div>
<?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
<div id="error" class="error" width=500px>
<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['info']->value!=''){?>
<div id="info" class="info">
<?php echo $_smarty_tpl->tpl_vars['info']->value;?>

</div>
<?php }?>

<form id="adduser" style="margin: 10px;" method = "POST" action="extensions_edit.php">
<table cellspacing="1" class="form"> 
<tr><td class="left">Εσωτερικός Αριθμός</td>
<td class="right"><input type="text" name="extension" value="<?php echo $_smarty_tpl->tpl_vars['extension']->value;?>
" /><br></td></tr>
<tr><td class="left">Κωδικός SIP</td>
<td class="right"><input type="text" name="password" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" disabled="disabled" /><br></td></tr>
<tr><td class="left">Αριθμός PIN</td>
<td class="right"><input type="text" name="pin" value="<?php echo $_smarty_tpl->tpl_vars['pin']->value;?>
" /><br></td></tr>
<tr><td class="left">Όνομα</td>
<td class="right"><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" /><br></td></tr>
<tr><td class="left">Επώνυμο</td>
<td class="right"><input type="text" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
" /><br></td></tr>
<tr><td class="left">Αναγνώριση κλήσης</td>
<td class="right"><input type="text" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" /><br></td></tr>
<tr><td class="left">E-mail</td>
<td class="right"><input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" /><br></td></tr>
<tr><td class="left">Τμήμα</td>
<td class="right"><SELECT name="extension_group"> 
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['groups']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['callgroup'],'output'=>$_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_description'],'selected'=>($_smarty_tpl->tpl_vars['extension_group']->value)),$_smarty_tpl);?>

<?php endfor; endif; ?></td></tr>
<tr><td class="left">Ανάληψη Κλήσεων</td>
<td class="right">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['groups']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['callgroup']!='-1'){?>
	<?php if ($_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['is_pickgroup']=='0'){?>
		<input type="checkbox" name="pickupgroups[]" value="<?php echo $_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['callgroup'];?>
"><?php echo $_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_description'];?>
<br/>
	<?php }else{ ?>
		<input type="checkbox" name="pickupgroups[]" value="<?php echo $_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['callgroup'];?>
" checked="yes"/><?php echo $_smarty_tpl->tpl_vars['groups']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_description'];?>
<br/>
	<?php }?>
<?php }?>
<?php endfor; endif; ?></td></tr>
<tr><td class="left">Πρόσβαση κλήσεων</td>
<td class="right"><SELECT name="extension_context"> 
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['contexts']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['contexts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['context_id'],'output'=>$_smarty_tpl->tpl_vars['contexts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['context_description'],'selected'=>($_smarty_tpl->tpl_vars['extension_context']->value)),$_smarty_tpl);?>

<?php endfor; endif; ?></td></tr>
<tr><td class="left">Τύπος Συσκευής</td>
<td class="right"><SELECT id="device" name="device">
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
<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['model_id'],'output'=>$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['device'],'selected'=>($_smarty_tpl->tpl_vars['device']->value)),$_smarty_tpl);?>

<?php endfor; endif; ?></td></tr>
<tr id="mac-address"><td class="left">Διεύθυνση MAC</td>
<td class="right"><input type="text" name="device_mac" value="<?php echo $_smarty_tpl->tpl_vars['device_mac']->value;?>
" /><br></td></tr>
<tr><td class="left">Ηχογράφηση κλήσεων</td>
<?php if ($_smarty_tpl->tpl_vars['call_recording']->value=='t'){?>
<td class="right"><input type="radio" name="call_recording" value="t" checked="yes"/>Ναί<input type="radio" name="call_recording" value="f"/>Όχι</td></tr>
<?php }else{ ?>
<td class="right"><input type="radio" name="call_recording" value="t"/>Ναί<input type="radio" name="call_recording" value="f" checked="yes"/>Όχι</td></tr>
<?php }?>
<tr><td class="left">Αναμονή κλήσεων</td>
<?php if ($_smarty_tpl->tpl_vars['cw']->value=='t'){?>
<td class="right"><input type="radio" name="cw" value="t" checked="yes"/>Ναί<input type="radio" name="cw" value="f"/>Όχι</td></tr>
<?php }else{ ?>
<td class="right"><input type="radio" name="cw" value="t"/>Ναί<input type="radio" name="cw" value="f" checked="yes"/>Όχι</td></tr>
<?php }?>
<tr><td class="left">Δημιουργία αρχείων provisioning</td>
<?php if ($_smarty_tpl->tpl_vars['gen_config']->value=='t'){?>
<td class="right"><input type="radio" name="gen_config" value="t" checked="yes"/>Ναί<input type="radio" name="gen_config" value="f"/>Όχι</td></tr>
<?php }else{ ?>
<td class="right"><input type="radio" name="gen_config" value="t"/>Ναί<input type="radio" name="gen_config" value="f" checked="yes"/>Όχι</td></tr>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['selected']->value=='edit'){?>
<input type="Hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
">
<tr><td colspan=2 align="center"><input type="submit" class="go" value="Αλλαγή" />
<input type="submit" name="delete" value="Διαγραφή" class="go_red" onclick="if (confirm('Θέλετε να διαγράψετε το εσωτερικό <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['extension'];?>
;')) return true; else return false;"/></td></tr>
<?php }else{ ?>
<tr><td colspan=2 align="center"><input type="submit" class="go" value="Προσθήκη" /></td></tr>
<?php }?>
</table>
</form>
</div>
<?php }} ?>