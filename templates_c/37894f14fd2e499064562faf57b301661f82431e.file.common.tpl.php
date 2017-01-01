<?php /* Smarty version Smarty-3.1.7, created on 2013-11-19 12:01:06
         compiled from "./templates/extensions/common.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1656674863528b36e2a75616-31682037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37894f14fd2e499064562faf57b301661f82431e' => 
    array (
      0 => './templates/extensions/common.tpl',
      1 => 1329307697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1656674863528b36e2a75616-31682037',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pages' => 0,
    'selected' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_528b36e3103e0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528b36e3103e0')) {function content_528b36e3103e0($_smarty_tpl) {?><ul id="maintab">
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
<?php if ($_smarty_tpl->tpl_vars['selected']->value=='extensions_list'){?>
<li class="selected"><a href="extensions.php">Εσωτερικά</a></li>
<?php }else{ ?>
<li><a href="extensions.php">Εσωτερικά</a></li>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['selected']->value=='group_list'){?>
<li class="selected"><a href="groups.php">Ομάδες κλήσεων</a></li>
<?php }else{ ?>
<li><a href="groups.php">Ομάδες κλήσεων</a></li>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['selected']->value=='did_list'){?>
<li class="selected"><a href="did.php">Διεπιλογικοί Αριθμοί</a></li>
<?php }else{ ?>
<li><a href="did.php">Διεπιλογικοί Αριθμοί</a></li>
<?php }?>
</ul>
</div>
</div>
<?php }} ?>