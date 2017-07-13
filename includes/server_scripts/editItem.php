<?php  
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href = '../../index.php'</script>";
	}

	include "dbConfig.php";

	$itemId = intval($_POST["itemId"]);
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
			$updateQuery = "UPDATE items SET monitorBN = '$monitorBodyNumber', monitorSN = '$monitorSerialNumber', systemBN = '$systemBodyNumber', systemSN = '$systemSerialNumber', UPSBN = '$UPSBodyNumber', UPSSN = '$UPSSerialNumber', location = '$location', report = '$report' WHERE itemId = $itemId;";

			$updateResult = mysqli_query($database,$updateQuery);

			if ($updateResult) {
				echo "<script>alert('Item Updated Successfully');window.location.href = '../../main.php'</script>";
			}else{
				echo "<script>alert('Sorry, Unable To Update Item');window.location.href = '../../main.php'</script>";
			}
		}
	}else{
		echo "<script>window.location.href = '../../main.php'</script>";
	}
?>