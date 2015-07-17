<!DOCTYPE html>
<html lang="th">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<title>หน้ารับ-ส่งข้อความ</title>
	<link rel="shortcut  icon" href="NRMS.png">

	<script>
		 
		$(document).ready(function(){
			function getNewMsgFromDb(){
				$.ajax({
					url: "getNewMsg.php",
					type: "POST",
					data: ''
				})
				.success(function(result){
					var obj = jQuery.parseJSON(result);

					if(obj!=''){
						$("#newMsgBody").empty();
						$.each(obj, function(key, val) {
							var tr = "<tr>";
							tr = tr + "<td>" + val["send_time"] + "</td>";
							tr = tr + "<td>" + val["title"] + "</td>";
							tr = tr + "<td>" + val["from"] + "</td>";
							tr = tr + "<td>" + val["read_status"] +
							"&nbsp<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#newMsgModal'><span class='glyphicon glyphicon-search' aria-hidden='true'></span></button>" + "</td>";
							tr = tr + "</tr>";

							var newtr=$(tr);
							$('#newMsgTable > tbody:last').append(newtr);
							newtr.find(".btn").click(function(){
								 $("#mymodal_body").text(val["detail"]);
								 $("#mymodal_title").text(val["title"]);
							});
 						});
					}
				});
			}

			function getAllMsgFromDb(){
				$.ajax({
					url: "getAllMsg.php",
					type: "POST",
					data: ''
				})
				.success(function(result){
					var obj = jQuery.parseJSON(result);

					if(obj!=''){
						$("#newMsgBody").empty();
						$.each(obj, function(key, val) {
							var tr = "<tr>";
							tr = tr + "<td>" + val["send_time"] + "</td>";
							tr = tr + "<td>" + val["title"] + "</td>";
							tr = tr + "<td>" + val["from"] + "</td>";
							tr = tr + "<td>" + val["read_status"] +
							"&nbsp<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-search' aria-hidden='true'></span></button>" + "</td>";
							tr = tr + "</tr>";

							var newtr=$(tr);
							$('#newMsgTable > tbody:last').append(newtr);
							newtr.find(".btn").click(function(){
								 $("#mymodal_body").text(val["detail"]);
								 $("#mymodal_title").text(val["title"]);
							});
 						});
					}
				});
			}

			function getSentMsgFromDb(){
				$.ajax({
					url: "getSentMsg.php",
					type: "POST",
					data: ''
				})
				.success(function(result){
					var obj = jQuery.parseJSON(result); 

					if(obj!=''){
						$("#newMsgBody").empty();
						$.each(obj, function(key, val) {
							var tr = "<tr>";
							tr = tr + "<td>" + val["send_time"] + "</td>";
							tr = tr + "<td>" + val["title"] + "</td>";
							tr = tr + "<td>" + val["from"] + "</td>";
							tr = tr + "<td>" + val["read_status"] +
							"&nbsp<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-search' aria-hidden='true'></span></button>" + "</td>";
							tr = tr + "</tr>";

							var newtr=$(tr);
							$('#newMsgTable > tbody:last').append(newtr);
							newtr.find(".btn").click(function(){
								 $("#mymodal_body").text(val["detail"]);
								 $("#mymodal_title").text(val["title"]);
							});
 						});
					}
				});
			}
			setInterval(getNewMsgFromDb,3000);
			setInterval(getAllMsgFromDb,3000);
			setInterval(getSentMsgFromDb,3000);

			


			function badgeMsgCount(){ //Message badge counter function.
				var x = document.getElementById("newMsgBody").rows.length; //New messages badge counter.
				document.getElementById("badge_newmsg").innerHTML =x;

				var y = document.getElementById("allMsgBody").rows.length; //All messages badge counter.
				document.getElementById("badge_allmsg").innerHTML =y;

				var z = document.getElementById("sentMsgBody").rows.length; //Sent messages badge counter.
				document.getElementById("badge_sentmsg").innerHTML =z;
			}
			setInterval(badgeMsgCount,1000);
		})
	</script>
	
</head>

<body style="background-color:azure">

	<?php //Sign In Checking
    error_reporting(0);
	session_start();

	if($_SESSION["ID"] == "")
	{
		echo "  <br><div align='center'>Please Sign In First !!!</div>";?><br><br>
			<div align="center">
				<input type="button" class="btn btn-success" name="go_sign_in" id="go_sign_in" value="Go to sign in page" onclick="window.location='login.html' " />
			</div>
		<?php exit();
	}
	session_write_close();
	?> <!--Sign In Checking-->

	<!--Navbar-->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="index.php">
					<img src="NRMS.png" alt="nrmslogo" width="20px" height="20px">
				</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Send message<span class="glyphicon glyphicon-send"></span>
						</a>

						<ul class="dropdown-menu">
							<li><a href="#">Individual<span class="glyphicon glyphicon-user pull-right" aria-hidden="true"></span></a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Group<span class="glyphicon glyphicon-globe pull-right" aria-hidden="true"></span></a></li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right pull-center">
					<div>
						<p class="navbar-text">Signed in as : <?php echo $_SESSION["name"]; ?></p>
						<button type="button" class="btn btn-danger btn-xs navbar-btn" onclick="window.location='logout.php'">Sign out</button>
					</div>
            	</ul>
			</div><!--end nav collapse-->
		</div><!--end container-fluid-->
	</nav>

	<!--Tab Message-->
	<div class="container-fluid" style="margin-top:80px;">
		<div class="row">
			<div class="col-sm-2"></div>

			<div class="col-sm-8">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#new_msg" aria-controls="new_message">New messages <span id="badge_newmsg" class="badge"></span></a></li>
					<li><a data-toggle="tab" href="#all_msg">All messages <span id="badge_allmsg" class="badge"></span></a></li>
					<li><a data-toggle="tab" href="#sent_msg">Sent messages <span id="badge_sentmsg" class="badge"></span></a></li>
				</ul>

				<div class="tab-content">
					<div id="new_msg" class="tab-pane fade in active">
						<table class="table table-hover table-striped" id="newMsgTable">
							<thead>
								<tr>
									<th>Time</th>
									<th>Title</th>
									<th>From</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="newMsgBody"></tbody>
						</table>
					</div>

					<div id="all_msg" class="tab-pane fade" >
						<table class="table table-hover table-striped" id="allMsgTable">
							<thead>
								<tr>
									<th>Time</th>
									<th>Title</th>
									<th>From</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="allMsgBody"></tbody>
						</table>
					</div>

					<div id="sent_msg" class="tab-pane fade">
						<table class="table table-hover table-striped" id="sentMsgTable">
							<thead>
								<tr>
									<th>Send time</th>
									<th>Title</th>
									<th>To</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="sentMsgBody"></tbody>
						</table>
					</div>
				</div><!--end of tab content-->
			</div>
		</div>
	</div>

	<!--New Message Modal -->
	<div class="modal fade" id="newMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
	        	<div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="mymodal_title"></h4>
	            </div>

	        	<div id="mymodal_body" class="modal-body"></div>

	      		<div id="mymodal_footer" class="modal-footer">
	        		<button type="button" class="btn btn-primary">Accept</button>
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	    </div>
	</div>

	<!--All Message Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
	        	<div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="mymodal_title"></h4>
	            </div>

	        	<div id="mymodal_body" class="modal-body"></div>

	      		<div id="mymodal_footer" class="modal-footer">
	        		<button type="button" class="btn btn-primary">Accept</button>
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	    </div>
	</div>

	<!--Sent Message Modal -->
	<div class="modal fade" id="sentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
	        	<div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="mymodal_title"></h4>
	            </div>

	        	<div id="mymodal_body" class="modal-body"></div>

	      		<div id="mymodal_footer" class="modal-footer">
	        		<button type="button" class="btn btn-primary">Accept</button>
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	    </div>
	</div>
</body>
</html>