<?php /* Smarty version Smarty-3.1.7, created on 2014-02-05 16:29:27
         compiled from "./templates/extensions/forwardings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140126109352f24ac7608d99-67782298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ecf7624e0f209aade47cfaf2bf987eb6b890b49' => 
    array (
      0 => './templates/extensions/forwardings.tpl',
      1 => 1329348205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140126109352f24ac7608d99-67782298',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'info' => 0,
    'extension' => 0,
    'target' => 0,
    'condition' => 0,
    'timeout' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f24ac7748a2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f24ac7748a2')) {function content_52f24ac7748a2($_smarty_tpl) {?><div>
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

<form id="adduser" style="margin: 10px;" method = "POST" action="forwardings.php">
<table cellspacing="1" class="form"> 
<tr><td class="left">Εσωτερικό</td>
<td class="right"><?php echo $_smarty_tpl->tpl_vars['extension']->value;?>
</td></tr>
<tr><td class="left">Αριθμός εκτροπής</td>
<td class="right"><input type="text" name="target" value="<?php echo $_smarty_tpl->tpl_vars['target']->value;?>
" />
<tr><td class="left">Τύπος εκτροπής</td>
<td class="right"><SELECT id="condition" name="condition">
<?php if ($_smarty_tpl->tpl_vars['condition']->value=='CFA'){?>
<option value="CFA" selected="selected">Άμεση</option>
<option value="CFU">Μη διαθέσιμο</option>
<option value="CFB">Κατειλημμένο</option>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['condition']->value=='CFU'){?>
<option value="CFA">Άμεση</option>
<option value="CFU" selected="selected">Μη διαθέσιμο</option>
<option value="CFB">Κατειλημμένο</option>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['condition']->value=='CFB'){?>
<option value="CFA">Άμεση</option>
<option value="CFU">Μη διαθέσιμο</option>
<option value="CFB" selected="selected">Κατειλημμένο</option>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['condition']->value==''){?>
<option value="CFA">Άμεση</option>
<option value="CFU">Μη διαθέσιμο</option>
<option value="CFB">Κατειλημμένο</option>
<?php }?>
</td></tr>
<tr id="fwd_timeout" name="fwd_timeout"><td class="left">Μετά από (sec)</td>
<td class="right"><input type="text" name="timeout" value="<?php echo $_smarty_tpl->tpl_vars['timeout']->value;?>
" />
<input type="Hidden" name="operation" value="update">
<input type="Hidden" name="extension" value="<?php echo $_smarty_tpl->tpl_vars['extension']->value;?>
">
<tr><td colspan=2 align="center"><input type="submit" class="go" value="Αποθήκευση"/><input type="submit" name="delete" value="Διαγραφή" class="go_red" onclick="if (confirm('Θέλετε να διαγράψετε την εκτροπή;')) return true; else return false;"/></td></tr>
</table>
</form>
</table>
</form>
</div>
<?php }} ?>