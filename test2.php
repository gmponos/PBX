<?
require_once("inc/libs/Smarty.class.php");
include "inc/config.php";
include "inc/connect.php";

        $get = "SELECT DISTINCT(extensions.mac_address) FROM extensions WHERE mac_address!=''";
        $result = pg_query($get);
        while($row = pg_fetch_assoc($result)){
	  
          $get_params = sprintf(" SELECT extensions.extension, extensions.line, device_models.template, device_models.phone_tftp_path,device_models.file_prefix, device_models.file_surfix from EXTENSIONS LEFT JOIN device_models ON device_models.dev_model_id=extensions.model_id where mac_address='%s' order by line asc", $row[mac_address]);
          $devices = pg_query($get_params);
             while($row2 = pg_fetch_assoc($devices)){
			$tmp[]=array(line=>$row2[line],extension=>$row2[extension]);
			$device = $row2[template];
			$path = $row2[phone_tftp_path];
			$file_prefix = $row2[file_prefix];
			$file_surfix = $row2[file_surfix];
                        }
	
			switch ($device) {
				case 'linksys':
	 				$mymac = strtolower(preg_replace('/:/','',$row[mac_address]));
					$data = $tmp;
					unset($tmp);
        		                $smarty = new Smarty;
                		        $smarty->assign("data",$data);
                        		$output = $smarty->fetch("configs/linksys_phone.tpl");
					$myfile = $path . $mymac . $file_surfix ;
					$fh = fopen($myfile, 'w') or die("can't open file");
				        fwrite($fh, $output);
 				        fclose($fh);
				break;

				case 'snom':
	 				$mymac = preg_replace('/:/','',$row[mac_address]);
					$data = $tmp;
					unset($tmp);
        		                $smarty = new Smarty;
                		        $smarty->assign("data",$data);
                        		$output = $smarty->fetch("configs/snom_phone.tpl");
					$myfile = $path . $file_prefix . $mymac . $file_surfix;
					$fh = fopen($myfile, 'w') or die("can't open file");
				        fwrite($fh, $output);
 				        fclose($fh);
				break;
			}
	}
?>
