<?php /* Smarty version Smarty-3.1.7, created on 2013-07-29 12:34:21
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13380694551f6371d654278-05979295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1294450505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13380694551f6371d654278-05979295',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'section' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_51f6371d6dcd6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f6371d6dcd6')) {function content_51f6371d6dcd6($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>netfusion PBX</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/nf2.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/inc/libs/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="/inc/libs/nf/main.js"></script>
</head>
<body>
<div id="HeaderTable">
<table width="100%" cellpadding="0" cellspacing="0" id="HeaderTable"><tr>
 <td align="left"><span class="maintitle"><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
</span></td>
 <td  align="right">
   <table class="userTable"><tr>
     <td>Συνδεση ώς: <b><?php echo $_SESSION['username'];?>
 </b>
     <A HREF="logout.php">(Έξοδος)</A></td></tr>
     <tr><td align="right"><img align="Texttop" border="0" src="images/netfusion.png"></tr></td>
   </table>
 </td>
</tr>
</table>
<?php }} ?>