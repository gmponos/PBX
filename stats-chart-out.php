<?php
 include "inc/connect.php";
 include "inc/config.php";
 include "inc/functions.php";

	$sdate = $_GET['sdate'];
	$edate = $_GET['edate'];

	$sqlsdate = mysqldate($sdate,start);
	$sqledate = mysqldate($edate,end);

	$sql = "SELECT COUNT(*) as total, avg(billsec) as callavg from cdr  WHERE  hidden='f' and (calldate between '$sqlsdate' and '$sqledate')  and split_part(userfield,'~',1) = 'OUT' and billsec > 0";
        $result = pg_query($db, $sql);
        $row = pg_fetch_assoc($result);
        $totalOutbilledCalls = $row[total];
        	if (is_null($row[callavg])){
		$totalOutbilledCalls_avg = 0;}
		else { $totalOutbilledCalls_avg = $row[callavg];}
        $sql = "SELECT COUNT(*) as total, avg(billsec) as callavg from cdr  WHERE  hidden='f' and (calldate between '$sqlsdate' and '$sqledate')  and split_part(userfield,'~',1) = 'OUT' and billsec > 0 and (dst like '21%' or dst like '801%')";
        $result = pg_query($db, $sql);
        $row = pg_fetch_assoc($result);
        $totalOutLocalCalls =$row[total];
		 if (is_null($row[callavg])){
                $totalOutLocalCalls_avg = 0;}
                else { $totalOutLocalCalls_avg = $row[callavg];}
        $sql = "SELECT COUNT(*) as total, avg(billsec) as callavg from cdr  WHERE  hidden='f' and (calldate between '$sqlsdate' and '$sqledate')  and split_part(userfield,'~',1) = 'OUT' and billsec > 0 and (dst like '2%' and dst not like '21%')";
        $result = pg_query($db, $sql);
        $row = pg_fetch_assoc($result);
        $totalOutNationalCalls =$row[total];
		 if (is_null($row[callavg])){
		$totalOutNationalCalls_avg = 0;}
		 else { $totalOutNationalCalls_avg = $row[callavg];}
        $sql = "SELECT COUNT(*) as total, avg(billsec) as callavg from cdr  WHERE  hidden='f' and (calldate between '$sqlsdate' and '$sqledate')  and split_part(userfield,'~',1) = 'OUT' and billsec > 0 and (dst like '69%' or dst like '+3069')";
        $result = pg_query($db, $sql);
        $row = pg_fetch_assoc($result);
        $totalOutMobileCalls =$row[total];
		 if (is_null($row[callavg])){
		$totalOutMobileCalls_avg = 0;}
		else { $totalOutMobileCalls_avg =$row[callavg];}
        $sql = "SELECT COUNT(*) as total, avg(billsec) as callavg from cdr  WHERE  hidden='f' and (calldate between '$sqlsdate' and '$sqledate')  and split_part(userfield,'~',1) = 'OUT' and billsec > 0 and dst like '00%'";
        $result = pg_query($db, $sql);
        $row = pg_fetch_assoc($result);
        $totalOutInternationalCalls =$row[total];
		  if (is_null($row[callavg])){
		 $totalOutInternationalCalls_avg = 0; }
		 else { $totalOutInternationalCalls_avg =$row[callavg];}

$data = array( $totalOutbilledCalls, $totalOutLocalCalls, $totalOutNationalCalls, $totalOutMobileCalls, $totalOutInternationalCalls);
$data_avg = array( $totalOutbilledCalls_avg, $totalOutLocalCalls_avg, $totalOutNationalCalls_avg, $totalOutMobileCalls_avg, $totalOutInternationalCalls_avg);

if ( $max/2 == round($max/2)) {
	$max = $totalOutbilledCalls + 2;
   }else {
	$max = $totalOutbilledCalls + 1;
	} 

$get_max_call = $data_avg;
$last_item = count($get_max_call) - 1;
sort($get_max_call);
$rightmax = $get_max_call[$last_item] +1 ;

// use the chart class to build the chart:
include_once( 'inc/php-ofc-library/open-flash-chart.php' );
$g = new graph();

$g->title( 'Στατιστικά Εξερχομένων από: ' . $sdate . ' έως: ' . $edate  ,'{font-size: 12px; color:#255480;}' );

$g->set_data($data);

$g->bar( 50, '#58c450', 'Αριθμός κλήσεων', 10 );
$g->set_x_labels( array('Σύνολο','Τοπικές','Εθνικές','Κινητά','Διεθνείς') );
$g->set_data($data_avg);
$g->line_dot( 3, 5, '#CC3399', 'Μέσος χρόνος διάρκειας (sec)', 10 );

$g->x_axis_colour( '#818D9D', '#F0F0F0' );
$g->y_axis_colour( '#818D9D', '#ADB5C7' );
$g->y_right_axis_colour( '#818D9D' );


$g->attach_to_y_right_axis(2);
$g->set_y_legend( 'Κλ', 12, '#164166' );
$g->set_y_max( $max );
$g->set_y_right_max($rightmax);

// label every 20 (0,20,40,60)

$g->y_label_steps(2);

$g->bg_colour = '#ffffff';

$g->set_inner_background( '#DDEFFA', '#CBD7E6', 90 );


// display the data
echo $g->render();
?>
