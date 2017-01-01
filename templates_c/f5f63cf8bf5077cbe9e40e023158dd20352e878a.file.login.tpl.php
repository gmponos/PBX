<?php /* Smarty version Smarty-3.1.7, created on 2013-07-29 12:34:16
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165050144851f63718d62fe4-94605404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f63cf8bf5077cbe9e40e023158dd20352e878a' => 
    array (
      0 => './templates/login.tpl',
      1 => 1213348248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165050144851f63718d62fe4-94605404',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_51f63718e14a2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f63718e14a2')) {function content_51f63718e14a2($_smarty_tpl) {?><html>
<head>
	<title>netFusion PBX Admin</title>
    	<link rel="stylesheet" href="css/global.css" type="text/css">
    	<link rel="stylesheet" href="css/login.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<form action="index.php" name="loginForm" method="post">


<input type="hidden" name="login" value="true">

<div align="center">
    <!-- BEGIN login box -->

    <div id="nf-loginBox">

        <div id="nf-loginHeader">Σύστημα διαχείρησης</div>



        <div align="center" id="nf-loginTable">

            <div style="text-align: center; width: 380px;">
            <table cellpadding="0" cellspacing="0" border="0" align="center">

                <tr>
                    <td align="right" class="loginFormTable">

                        <table cellpadding="2" cellspacing="0" border="0">
                        <noscript>
                            <tr>
                                <td colspan="3">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                    <tr valign="top">
                                        <td><img src="images/error-16x16.gif" width="16" height="16" border="0" alt="" vspace="2"></td>
                                        <td><div class="nf-error-text" style="padding-left:5px; color:#cc0000;">Error: You don't have JavaScript enabled. This tool uses JavaScript and much of it will not work correctly without it enabled. Please turn JavaScript back on and reload this page.</div></td>
                                    </tr>
                                    </table>
                                </td>
                            </tr>
                        </noscript>
                        <?php if ($_smarty_tpl->tpl_vars['message']->value){?>
			<tr>
                                <td colspan="3">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                    <tr valign="top">

                                        <td><img src="images/error-16x16.gif" width="16" height="16" border="0" alt="" vspace="2"></td>
                                        <td><div class="jive-error-text" style="padding-left:5px; color:#cc0000;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div></td>
                                    </tr>
                                    </table>
                                </td>
                         </tr>
			<?php }?>
                        <tr>
                            <td><input type="text" name="username" size="15" maxlength="50" id="username" value=""></td>
                            <td><input type="password" name="password" size="15" maxlength="50" id="password"></td>
                            <td align="center"><input type="submit" value="&nbsp; Είσοδος &nbsp;"></td>

                        </tr>
                        <tr valign="top">
                            <td class="nf-login-label"><label for="username">Όνομα Χρήστη</label></td>
                            <td class="nf-login-label"><label for="ppassword">Κωδικός Πρόσβασης</label></td>
                            <td>&nbsp;</td>
                        </tr>
                        </table>
                            <script language="JavaScript" type="text/javascript">
                                <!--
                                document.loginForm.username.focus();
                                //-->
                            </script>

                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <div align="right" id="nf-loginVersion">
                        nf-netpbx, Έκδοση: 1.0.2
                        </div>
                    </td>
                </tr>

            </table>
            </div>
        </div>

    </div>
    <!-- END login box -->
</div>

</form>
</body>
</html>

<?php }} ?>