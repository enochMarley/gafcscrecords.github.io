<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href = 'index.php'</script>";
	}
	include "includes/server_scripts/dbConfig.php";
	$extract = false;
	$getQuery = "SELECT * FROM items;";
	$getResult = mysqli_query($database,$getQuery);

	if (mysqli_num_rows($getResult) > 0) {
		$extract = true;
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>GAFCSC IT Records</title>
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/font-awesome.min.css">
	    <link rel="stylesheet" href="css/styles.css">
		<style>
			body{
				background-color: #f7f7f7;
			}
		</style>
	</head>
	<body>
	<nav class="navbar navbar-default navbar-fixed-top nav-custom">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">GAFCSC IT</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav">
			        <li>
			        	<a href="options.php"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?></a>
			        </li>
			        <li>
			        	<input type="text" class="search-input" placeholder="Search Records">
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#myModal" data-toggle="modal"><i class="fa fa-plus"></i> Add Item</a></li>
			        <?php if ($extract) { ?>
			        	<li>
			        		<form action="export.php" method="post">
			        			<button type="submit" class="btn btn-custom-2 extract-btn"><i class="fa fa-file-excel-o"></i> Export To Excel</button>
			        		</form>
			        	</li>
			        <?php } ?>
			        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
			      </ul>
			    </div>
			  </div>
	</nav><br><br><br><br>
	<div class="container-fluid items-div"></div>
		<div id="myModal" class="modal fade" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button class="close" data-dismiss="modal">&times;</button>
		                <h4 class="modal-title">Fill The Form To Add Item</h4>
		            </div>
		            <div class="modal-body"> 
		                <form method="post" action="includes/server_scripts/addItem.php" enctype="multipart/form-data" class="item-form">
		                <div class="row">
		                	<div class="col-md-6">
		                		<label>Monitor Body Number:</label><br>
		                		<input type="text" name="monitorBN" required/><br><br>
		                	</div>
		                	<div class="col-md-6">
		                		<label>Monitor Serial Number:</label><br>
		                		<input type="text" name="monitorSN" required/><br><br><br>
		                	</div>
		                </div>

		                <div class="row">
		                	<div class="col-md-6">
		                		<label>System Unit Body Number:</label><br>
		                		<input type="text" name="systemBN" required/><br><br>
		                	</div>
		                	<div class="col-md-6">
		                		<label>System Unit Serial Number:</label><br>
		                		<input type="text" name="systemSN" required/><br><br><br>
		                	</div>
		                </div>

		                <div class="row">
		                	<div class="col-md-6">
		                		<label>UPS Body Number:</label><br>
		                		<input type="text" name="UPSBN" required/><br><br>
		                	</div>
		                	<div class="col-md-6">
		                		<label>UPS Serial Number:</label><br>
		                		<input type="text" name="UPSSN" required/><br><br><br>
		                	</div>
		                </div>
		                <div class="row">
		                	<div class="col-md-6">
		                		<label>Location</label><br>
		                		<input type="text" name="location" required/><br><br>
		                	</div>
		                	<div class="col-md-6">
		                		<label>Any Report:</label><br>
		                		<input type="text" name="report" value="All Components Ok" required/><br><br><br>
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		            	<button type="submit" class="btn btn-custom-2" id="add"><i class="fa fa-check"></i> Add</button>
		            	<button type="reset" class="btn btn-custom-2"><i class="fa fa-refresh"></i> Clear</button>
		                <button type="button" data-dismiss="modal" class="btn btn-custom-2"><i class="fa fa-remove"></i> Cancel</button>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/index.js"></script>
	</body>
</html>