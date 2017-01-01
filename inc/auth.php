<?
 session_start();
 require_once("libs/Smarty.class.php");
        if (!isset($_SESSION['username'])){
                $smarty = new Smarty;
                $smarty->assign("title", "netfusion IP-PBX");
                $smarty->display("login.tpl");
		exit();
        }
?>
