<!--This is the index page which is the login page for the admin-->
<?php error_reporting(0); ?>
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
				background-color: #1e2127;
			}
		</style>
	</head>
	<body>
		<br><br><br><br><br><br><br><br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form action="" method="post" class="admin-login-form">
						<h2 class="text-center intro-text">GAFCSC IT RECORDS</h2>
						<h4 class="text-center intro-text">ADMIN LOGIN</h4><br>
						<div class="row input-row-div">
							<div class="col-md-1">
								<i class="fa fa-user"></i>
							</div>
							<div class="col-md-11">
								<input type="text" name="adminUsername" placeholder="Admin Username" required/>
							</div>
						</div><br>
						<div class="row input-row-div">
							<div class="col-md-1">
								<i class="fa fa-lock"></i>
							</div>
							<div class="col-md-11">
								<input type="password" name="adminPassword" placeholder="Admin Password" required/>
							</div>
						</div><br>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-lg btn-custom"><i class="fa fa-key"></i> Login</button>
							</div>
						</div><br>
						<p class="text-center res-text"><strong></strong></p>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<div class="container-fluid navbar navbar-fixed-bottom">
			<p class="text-center admin-page-footer">Ghana Armed Forces Command And Staff College (GAFCSC) | All Rights Reserved | &copy; <?php echo date('Y'); ?></p>
		</div>
		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php 

	include "includes/server_scripts/dbConfig.php";

	$username = trim($_POST['adminUsername']);
	$password = trim($_POST['adminPassword']);



	if (isset($username) && isset($password)) {
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$query = "SELECT * FROM admin WHERE adminUsername = '$username' AND adminPassword = '$password'";
			$result = $database->query($query);
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				if ($row['adminUsername'] == "$username" && $row['adminPassword'] == "$password") { 
					session_start();
					$_SESSION['username'] = $row['adminUsername'];
					?>
					<script>
						$(".res-text").html("Login Successful").css("color","#fff");
						setInterval(function(){
							window.location.href = "main.php";
						},1000);
					</script>
<?php	
				}
			}else{ ?>
			<script>
				$(".res-text").html("Wrong Admin Username Or Password.Try Again").css("color","blue");
			</script>


<?php
			}
		}
	}
?>