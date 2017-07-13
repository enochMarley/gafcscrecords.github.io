<?php  
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href = 'index.php'</script>";
	}

	include "includes/server_scripts/dbConfig.php";
	$itemId = intval($_GET["itemId"]);
	$getQuery = "SELECT * FROM items WHERE itemId = $itemId";
	$getResult = mysqli_query($database,$getQuery);
	if (mysqli_num_rows($getResult) > 0) {
		$row = mysqli_fetch_assoc($getResult);
		$itemId = $row["itemId"];
		$monitorBN = $row["monitorBN"];
		$monitorSN = $row["monitorSN"];
		$systemBN = $row["systemBN"];
		$systemSN = $row["systemSN"];
		$UPSBN = $row["UPSBN"];
		$UPSSN = $row["UPSSN"];
		$dateAdded = $row["dateAdded"];
		$location = $row["location"];
		$report = $row["report"];
	}
	else{
		echo "<script>window.location.href = 'main.php'</script>";
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
				        
				      </ul>
				      <ul class="nav navbar-nav navbar-right">
				        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
				      </ul>
				    </div>
				  </div>
		</nav><br><br><br><br>
		<div class="container-fluid">
			<div class="row">
				<h3 class="text-center"><strong>Edit Item</strong></h3>
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form method="post" action="includes/server_scripts/editItem.php" enctype="multipart/form-data" class="item-form">
					 	<input type="hidden" name="itemId" value="<?php echo $itemId; ?>">
		                <div class="row">
		                	<div class="col-md-6">
		                		<label>Monitor Body Number:</label><br>
		                		<input type="text" name="monitorBN" value="<?php echo $monitorBN ?>" required/><br><br>
		                	</div>
		                	<div class="col-md-6">
		                		<label>Monitor Serial Number:</label><br>
		                		<input type="text" name="monitorSN" value="<?php echo $monitorSN ?>" required/><br><br><br>
		                	</div>
		                </div>

		                <div class="row">
		                	<div class="col-md-6">
		                		<label>System Unit Body Number:</label><br>
		                		<input type="text" name="systemBN" value="<?php echo $systemBN ?>" required/><br><br>
		                	</div>
		                	<div class="col-md-6">
		                		<label>System Unit Serial Number:</label><br>
		                		<input type="text" name="systemSN" value="<?php echo $systemSN ?>" required/><br><br><br>
		                	</div>
		                </div>

		                <div class="row">
		                	<div class="col-md-6">
		                		<label>UPS Body Number:</label><br>
		                		<input type="text" name="UPSBN" value="<?php echo $UPSBN ?>" required/><br><br>
		                	</div>
		                	<div class="col-md-6">
		                		<label>UPS Serial Number:</label><br>
		                		<input type="text" name="UPSSN" value="<?php echo $UPSSN ?>" required/><br><br><br>
		                	</div>
		                </div>
		                <div class="row">
		                	<div class="col-md-6">
		                		<label>Location</label><br>
		                		<input type="text" name="location" value="<?php echo $location ?>" required/><br><br>
		                	</div>
		                	<div class="col-md-6">
		                		<label>Any Report:</label><br>
		                		<input type="text" name="report" value="<?php echo $report ?>" required/><br><br><br>
		                	</div>
		                </div>
		            	<button type="submit" class="btn btn-custom-2"><i class="fa fa-recycle"></i> Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
		                <a href="main.php"><button type="button" class="btn btn-custom-2"><i class="fa fa-arrow-left"></i> Go Back</button></a>
		                </form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>