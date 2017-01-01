<?
 session_start();
 require_once("inc/libs/Smarty.class.php");
 if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
 }
 session_unset();
 session_destroy();
 $smarty = new Smarty;
 $smarty->assign("title", "netfusion IP-PBX. Login Screen");
 $smarty->assign("message", "Επιτυχής Αποσύνδεση");
 $smarty->display("login.tpl");
 exit();
?>
