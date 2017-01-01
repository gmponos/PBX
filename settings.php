<?
 include "inc/auth.php";
 include "inc/connect.php";
 include "inc/config.php";
 include "inc/functions.php";
 include "inc/pages.php";

 $pages = selected_page($_SERVER['SCRIPT_NAME']);
 switch ($_GET['action']) {
 case 'moh':

		$mohpath =opendir("./moh");
		while ($file = readdir($mohpath)) 
		{
            $data[] = $file;
		}
		closedir($mohpath);
}
 		$smarty = new Smarty;
		$smarty->assign("pages", $pages);
		$smarty->assign("selected", 'moh');
 		$smarty->assign("section", "Ρυθμίσεις - Μουσική Αναμονής");
		$smarty->assign("data", $data);
	 	$smarty->assign("section_image", "settings48.png");
 		$smarty->display("header.tpl");
 		$smarty->display("settings/index.tpl");
 break;

 case 'various':
 		$smarty = new Smarty;
		$smarty->assign("pages", $pages);
		$smarty->assign("selected", 'various');
 		$smarty->assign("section", "Ρυθμίσεις - Διάφορες");
	 	$smarty->assign("section_image", "settings48.png");
 		$smarty->display("header.tpl");
 		$smarty->display("settings/index.tpl");

 break;
 default:
 		$smarty = new Smarty;
		$smarty->assign("pages", $pages);
 		$smarty->assign("section", "Ρυθμίσεις");
	 	$smarty->assign("section_image", "settings48.png");
 		$smarty->display("header.tpl");
 		$smarty->display("settings/index.tpl");
 break;
}
?>
