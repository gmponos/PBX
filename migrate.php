<?
 include "inc/connect.php";


		$sql = "select uniqueid from cdr where (calldate between '2010-09-06 00:00:00' and '2010-09-06 23:59:59') and direction ='OUT';";
		if(($result = @postg_query($sql, $db)) == 0)
                        {
                          echo "Database error";
                        }
               while( $row = pg_fetch_assoc($result)) {
		echo $row[uniqueid] . " " . $row[uniqueid] . "\n";
		$sql2 = sprintf("update cdr set accountcode = '%s' where uniqueid='%s'",$row[uniqueid],$row[uniqueid]);
                echo $sql2 . "\n";
                $result2 = @postg_query($sql2, $db);
		}
