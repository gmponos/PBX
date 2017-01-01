<?php /* Smarty version Smarty-3.1.7, created on 2014-02-05 16:32:38
         compiled from "./templates/configs/queues.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77534218752f24b862dbde9-95774166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f7ded0a30e7d83b95be8be4dbccc21be3b9b37b' => 
    array (
      0 => './templates/configs/queues.tpl',
      1 => 1329443850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77534218752f24b862dbde9-95774166',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'q_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52f24b8639392',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f24b8639392')) {function content_52f24b8639392($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['q_data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
[<?php echo $_smarty_tpl->tpl_vars['q_data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_number'];?>
]
music=default
strategy=ringall
eventwhencalled=yes
timeout=120
retry=1
wrapuptime=0
maxlen = 0
announce-frequency = 0
announce-holdtime = no
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['y'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['y']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['name'] = 'y';
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['q_data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['members']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?>member=>SIP/<?php echo $_smarty_tpl->tpl_vars['q_data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['members'][$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']][$_smarty_tpl->tpl_vars['q_data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['group_number']];?>
,0
<?php endfor; endif; ?>

<?php endfor; endif; ?>
<?php }} ?>