<?php  
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href = '../../index.php'</script>";
	}

	include "dbConfig.php";

	$itemId = intval($_POST["itemId"]);
	$deleteQuery = "DELETE FROM items WHERE itemId = $itemId";
	$deleteResult = mysqli_query($database,$deleteQuery);
	if ($deleteResult) {
		echo "<script>alert('Item Deleted Successfully');window.location.href = '../../main.php'</script>";
	}else{
		echo "<script>alert('Unable To Delete Item');window.location.href = '../../main.php'</script>";
	}
?>