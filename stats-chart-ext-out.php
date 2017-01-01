<?php
 include "inc/connect.php";
 include "inc/config.php";
 include "inc/functions.php";

include_once( 'inc/php-ofc-library/open-flash-chart.php' );
$bar_1 = new bar_glass( 55, '#D54C78', '#C31812' );
$bar_1->key( 'Σύνολο κλήσεων', 10 );

	$sdate = $_GET['sdate'];
	$edate = $_GET['edate'];

	$sqlsdate = mysqldate($sdate,start);
	$sqledate = mysqldate($edate,end);

	$sql =        "SELECT src, count(*) as callcount from cdr ";
	$sql = $sql . "WHERE  hidden='f' and (calldate between '$sqlsdate' and '$sqledate') and split_part(userfield,'~',1) = 'OUT' and src like '5%'";
	$sql = $sql . "and billsec > 0 group by src order by callcount DESC";

        $result = pg_query($db, $sql);
                while( $row = pg_fetch_assoc($result))
                        {
			 $bar_1->data[] = $row[callcount];
                         $tcalls[] = $row[callcount];
                         $callers[] = $row[src];
                        }

$max = $tcalls[0] +1;

$g = new graph();
$g->title( 'Σύνολο εξερχομένων κλήσεων/εσωτερικό. Από: ' . $sdate . ' έως: ' . $edate  ,'{font-size: 12px; color:#255480;}' );
$g->data_sets[] = $bar_1;

$g->set_x_labels($callers);

$g->x_axis_colour( '#818D9D', '#F0F0F0' );
$g->y_axis_colour( '#818D9D', '#ADB5C7' );

$g->set_y_max($max );

$g->y_label_steps(2);

$g->bg_colour = '#ffffff';

$g->set_inner_background( '#DDEFFA', '#CBD7E6', 90 );


// display the data
echo $g->render();
?>
