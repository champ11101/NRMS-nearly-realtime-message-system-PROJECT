<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut  icon" href="NRMS2.png">
</head>
<body style="background-color:azure">

<?php
	session_start();

	if($_POST['username'] =="" || $_POST['password'] ==""){
		echo "<br><div align='center'>Please enter username and password !!</div>";
?>
	<br><br>

	<div align="center">
		<input type="button" class="btn btn-success" name="go_sign_in" id="go_sign_in" value="Back" onclick="window.location='login.html' " />
	</div>
<?php
	}
	else{
			mysql_connect("localhost","root","");
			mysql_select_db("nrms");
			$strSQL = "SELECT * FROM user_account WHERE username = '".mysql_real_escape_string($_POST['username'])."' and password = '".mysql_real_escape_string($_POST['password'])."'";
			$objQuery = mysql_query($strSQL);
			$objResult = mysql_fetch_array($objQuery);

			if(!$objResult){
				echo "<br><div align='center'>Username or password incorrect !!!</div>";
?>			<br><br>
			<div align="center">
				<input type="button" class="btn btn-success" name="go_sign_in" id="go_sign_in" value="Back" onclick="window.location='login.html' " />
			</div>
<?php
			}
			else{
				$_SESSION["ID"] = $objResult["ID"];
				$_SESSION["name"] = $objResult["name"];
		
				session_write_close();
				mysql_close();
				header("location:index2.php");
			}
	}
?>
</body>
</html>