<?php
	session_start();

    $msg_id = $_GET["msgid"];
	$u = $_SESSION['name'];

	$objConnect = mysql_connect("localhost","root","") or die(mysql_error());

	mysql_query("SET NAMES UTF8");

	$objDB = mysql_select_db("nrms");
	$strSQL = "UPDATE message SET read_status = 'read',acceptor = '$u' WHERE ID = '$msg_id'";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
?>