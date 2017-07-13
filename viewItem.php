<?php  
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href = '../../index.php'</script>";
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
				<h3 class="text-center"><strong>Details Of Item</strong></h3>
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<table class="table table-hover">
						<thead>
							<tr>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><strong>Monitor Body Number</strong></td>
								<td><?php echo $monitorBN; ?></td>
							</tr>
							<tr>
								<td><strong>Monitor Serial Number</strong></td>
								<td><?php echo $monitorSN; ?></td>
							</tr>
							<tr>
								<td><strong>System Body Number</strong></td>
								<td><?php echo $systemBN; ?></td>
							</tr>
							<tr>
								<td><strong>System Serial Number</strong></td>
								<td><?php echo $systemSN; ?></td>
							</tr>
							<tr>
								<td><strong>UPS Body Number</strong></td>
								<td><?php echo $UPSBN; ?></td>
							</tr>
							<tr>
								<td><strong>UPS Serial Number</strong></td>
								<td><?php echo $UPSSN; ?></td>
							</tr>
							<tr>
								<td><strong>Location</strong></td>
								<td><?php echo $location; ?></td>
							</tr>
							<tr>
								<td><strong>Status</strong></td>
								<td><?php echo $report; ?></td>
							</tr>
							<tr>
								<td><strong>Date Added</strong></td>
								<td><?php echo $dateAdded; ?></td>
							</tr>
						</tbody>
					</table><hr>
					<a href="main.php"><button class="btn btn-custom-2"><i class="fa fa-arrow-left"></i> Go Back</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="editItem.php?itemId=<?php echo $itemId;?>"><button class="btn btn-custom-2"><i class="fa fa-pencil"></i> Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="deleteItem.php?itemId=<?php echo $itemId;?>"><button class="btn btn-custom-2"><i class="fa fa-trash-o"></i> Delete</button></a>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>