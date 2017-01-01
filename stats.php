<?
 include "inc/authBC.php";
 include "inc/connect.php";
 include "inc/config.php";
 include "inc/functions.php";
 include "inc/pages.php";

$pages = selected_page($_SERVER['SCRIPT_NAME']);

if (!$_POST){	
			 $cdr_start_date =  date("d-m-Y",strtotime('now'));
			 $cdr_end_date =  date("d-m-Y",strtotime('now'));
	 		 $smarty = new SmartyBC();
			 $smarty->debugging = false;
			 $smarty->assign("section", "Στατιστικά Κλήσεων");
			 $smarty->assign("pages", $pages);
			 $smarty->assign("section_image", "cdr48.png");
			 $smarty->assign("selected", "stats");
			 $smarty->assign("sdate", $cdr_start_date);
			 $smarty->assign("edate", $cdr_end_date);
			 $smarty->assign("display", 0);
             $smarty->display("header.tpl");
 	         $smarty->display("cdr/stats.tpl");
	} else {
			 if (!isset($_POST['sdate'])){
				$cdr_start_date =  date("d-m-Y",strtotime('now'));
				$cdr_end_date =  date("d-m-Y",strtotime('now'));
				$_SESSION["sdate"] = $_POST['sdate'];
				$_SESSION["edate"] = $_POST['edate'];
			 } else {
				$cdr_start_date = $_POST['sdate'];
				$cdr_end_date = $_POST['edate'];
				$_SESSION["sdate"] = $_POST['sdate'];
				$_SESSION["edate"] = $_POST['edate'];
			 }
		
		     	$smarty = new SmartyBC();
                        $smarty->debugging = false;
                        $smarty->assign("section", "Στατιστικά Κλήσεων");
                        $smarty->assign("pages", $pages);
                        $smarty->assign("section_image", "cdr48.png");
                        $smarty->assign("selected", "stats");
                        $smarty->assign("sdate", $cdr_start_date);
                        $smarty->assign("edate", $cdr_end_date);
						$smarty->assign("display", 1);
                        $smarty->display("header.tpl");
                        $smarty->display("cdr/stats.tpl");

	}
?>
