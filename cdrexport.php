<?
 ob_start();
 include "inc/auth.php";
 include "inc/connect.php";
 include "inc/functions.php";

		$cdr_start_date = $_SESSION["sdate"];
		$cdr_end_date = $_SESSION["edate"];
		$sqlsdate = mysqldate($cdr_start_date,start);
		$sqledate = mysqldate($cdr_end_date,end);
 		$disposql='';
                    if ($_SESSION['filter2'] == 'answered'){
                       $disposql= 'and billsec > 0';
                    }
                    if ($_SESSION['filter2'] == 'not_answered'){
                       $disposql= 'and billsec = 0';
                    }

		$sql = "SELECT calldate,src,dst,billsec,disposition,direction FROM cdr WHERE calldate between '$sqlsdate' and '$sqledate'  $disposql ORDER BY calldate DESC";
		if(($result = @postg_query($sql, $db)) == 0)
                        {
                          echo "\n<hr />Database error: <span>".mysql_error()."  </span><br/>\n";
                          echo $sql;
                          die("MySQL Said: " . mysql_error());
                        }
                while( $row = pg_fetch_assoc($result))
                 	{ 
			 $mydispo=numdispo($row[disposition],$row[accountcode]);
			 $formated_bill=sec2hms($row[billsec]);
			 $fdate = date("d/m/Y"."  "."H:i",strtotime($row[calldate]));
			 $myrow[] = $fdate;
			 $myrow[] = $row[src];
			 $myrow[] = $row[dst];
			 $myrow[] = $formated_bill;
			 $myrow[] = $row[direction];
			 $data .= join(',', $myrow)."\n"; 
			 $myrow = '';
		 	}
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=Calls_$cdr_start_date-$cdr_end_date.csv");
	header("Pragma: no-cache");
	header("Expires: 0");
	echo $data;
?>
