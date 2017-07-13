<?php  
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href = '../../index.php'</script>";
	}

	include "dbConfig.php";

	$monitorBodyNumber = mysqli_real_escape_string($database, trim($_POST["monitorBN"]));
	$monitorSerialNumber = mysqli_real_escape_string($database, trim($_POST["monitorSN"]));
	$systemBodyNumber = mysqli_real_escape_string($database, trim($_POST["systemBN"]));
	$systemSerialNumber = mysqli_real_escape_string($database, trim($_POST["systemSN"]));
	$UPSBodyNumber = mysqli_real_escape_string($database, trim($_POST["UPSBN"]));
	$UPSSerialNumber = mysqli_real_escape_string($database, trim($_POST["UPSSN"]));
	$location = mysqli_real_escape_string($database, trim($_POST["location"]));
	$report = mysqli_real_escape_string($database, trim($_POST["report"]));

	if (isset($monitorBodyNumber) && isset($monitorSerialNumber) && isset($systemBodyNumber) && isset($systemSerialNumber) && isset($UPSBodyNumber) && isset($UPSSerialNumber)) {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$checkQuery = "SELECT * FROM items WHERE monitorBN = '$monitorBodyNumber' AND monitorSN = '$monitorSerialNumber' AND systemBN = '$systemBodyNumber' AND systemSN = '$systemSerialNumber' AND UPSBN = '$UPSBodyNumber' AND UPSSN = '$UPSSerialNumber';";

			$checkResult = mysqli_query($database,$checkQuery);

			if (mysqli_num_rows($checkResult) > 0) {
				echo "<script>alert('Item Already Exists In Database');window.location.href = '../../main.php'</script>";
			}else{
				$insertDate = date('Y-m-d');
				$insertQuery = "INSERT INTO items(monitorBN,monitorSN,systemBN,systemSN,UPSBN,UPSSN,location,report,dateAdded) VALUES('$monitorBodyNumber','$monitorSerialNumber','$systemBodyNumber','$systemSerialNumber','$UPSBodyNumber','$UPSSerialNumber','$location','$report','$insertDate')";

				$insertResult = mysqli_query($database,$insertQuery);
				if ($insertResult) {
					echo "<script>alert('Item Added Successfully');window.location.href = '../../main.php'</script>";
				}
			}
		}
	}else{
		echo "<script>window.location.href = '../../main.php'</script>";
	}
?>