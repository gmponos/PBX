<?php
 session_start();
 require_once("inc/libs/Smarty.class.php");
 include "inc/connect.php";
 include "inc/pages.php";
 $pages = selected_page($_SERVER['SCRIPT_NAME']);

 //retrieve post params
 $username = $_POST['username'];
 $password = $_POST['password'];

 if (!isset($username) || !isset($password)) {
	 if (isset($_SESSION['username'])){
  		$smarty = new Smarty;
   		$smarty->assign("section", "netfusion i-PBX");
   		$smarty->display("header.tpl");
   		$smarty->display("content.tpl");
   		$smarty->display("footer.tpl");
	}else{
        	$smarty = new Smarty;
        	$smarty->assign("title", "netfusion IP-PBX");
        	$smarty->display("login.tpl");
	}
 }

 elseif (empty($username) || empty($password)) {

        $smarty = new Smarty;
	$smarty->assign("pages", $pages);
        $smarty->assign("title", "netfusion i-PBX");
        $smarty->assign("message", "Παρακαλώ εισάγετε τα δεδομένα");
        $smarty->display("login.tpl");

 }
 else {
        //user validation via sql
        $sql = @postg_query("SELECT username,password from administrators where username='$username' and password='$password'", $db);
        $num_rows = pg_numrows($sql);
	$row = pg_fetch_assoc($sql);
           if($num_rows == 0){
                $smarty = new Smarty;
                $smarty->assign("title", "netfusion i-PBX.");
                $smarty->assign("message", "Σφάλμα αυθεντικοποίησης");
                $smarty->display("login.tpl");
           } else {
		//εδώ αν έχει τηλεφωνο να δείξω άλλα
                $_SESSION['username'] = $row['username'];
                $smarty = new Smarty;
		$smarty->assign("pages", $pages);
   		$smarty->assign("section", "Διαχείρηση IP-PBX");
                $smarty->display("header.tpl");
                $smarty->display("content.tpl");
                $smarty->display("footer.tpl");
           }
 }

?>
