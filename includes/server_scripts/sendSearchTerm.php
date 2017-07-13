<?php  
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href = '../../index.php'</script>";
	}

	include "dbConfig.php";
	$searchTerm = $_POST["searchTerm"];

	$updateQuery = "UPDATE search SET searchTerm = '$searchTerm' WHERE searchId = 1";
	$updateResult = mysqli_query($database, $updateQuery);
	
?>