<html>
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
                        {if $message}
			<tr>
                                <td colspan="3">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                    <tr valign="top">

                                        <td><img src="images/error-16x16.gif" width="16" height="16" border="0" alt="" vspace="2"></td>
                                        <td><div class="jive-error-text" style="padding-left:5px; color:#cc0000;">{$message}</div></td>
                                    </tr>
                                    </table>
                                </td>
                         </tr>
			{/if}
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

