<?php /* Smarty version Smarty-3.1.7, created on 2014-02-05 16:32:38
         compiled from "./templates/configs/fop_buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118671353052f24b865f9cb4-96211493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48882745ca0834f53af8be8aa0ee81274d43efc7' => 
    array (
      0 => './templates/configs/fop_buttons.tpl',
      1 => 1329444367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118671353052f24b865f9cb4-96211493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'q_data' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f24b867644d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f24b867644d')) {function content_52f24b867644d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('./buttons.cfg.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['y'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['y']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['name'] = 'y';
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['q_data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?>
[QUEUE/<?php echo $_smarty_tpl->tpl_vars['q_data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['group_number'];?>
]
type=queue
label=<?php echo $_smarty_tpl->tpl_vars['q_data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['group_name'];?>


<?php endfor; endif; ?>

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
[SIP/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['extension'];?>
]
type=extension
extension=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['extension'];?>

<?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['callerid']!=''){?>
label=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['callerid'];?>

<?php }else{ ?>
callerid=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['extension'];?>

<?php }?>
context=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['context'];?>


<?php endfor; endif; ?>
<?php }} ?>