<?php
	session_start();

	$n = $_SESSION['name'];
	$objConnect = mysql_connect("localhost","root","") or die(mysql_error());

	mysql_query("SET NAMES UTF8");

	$objDB = mysql_select_db("nrms");
	$strSQL = "SELECT * FROM message WHERE (send_to ='$n' AND read_status ='unread') ORDER BY send_time DESC";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$intNumField = mysql_num_fields($objQuery);
	$resultArray = array();
	
	while($obResult = mysql_fetch_array($objQuery))
	{
		$arrCol = array();
		for($i=0;$i<$intNumField;$i++)
		{
			$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
		}
		array_push($resultArray,$arrCol);
	}
	
	
	echo json_encode($resultArray);
?>