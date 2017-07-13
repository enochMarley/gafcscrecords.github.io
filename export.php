<?php  
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href = 'index.php'</script>";
	}

	include "includes/server_scripts/dbConfig.php";
	if ($_SERVER["REQUEST_METHOD"] ==  "POST") {
		$data = "";

		$getQuery = "SELECT * FROM items;";
		$getResult = mysqli_query($database,$getQuery);
		if (mysqli_num_rows($getResult) > 0) {
			$data .= "
				<table class='table' border='1'>
					<tr>
						<th>No.</th>
				        <th>Monitor BN</th>
				        <th>Monitor SN</th>
				        <th>System BN</th>
				        <th>System SN</th>
				        <th>UPS BN</th>
				        <th>UPS SN</th>
				        <th>Date Added</th>
				        <th>Location</th>
				        <th>Status</th>
					</tr>
			";
			$countNum = 1;
			while ($row = mysqli_fetch_assoc($getResult)) {

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

				$data .= "
					<tr>
						<td>$countNum</td>
						<td>$monitorBN</td>
						<td>$monitorSN</td>
						<td>$systemBN</td>
						<td>$systemSN</td>
						<td>$UPSBN</td>
						<td>$UPSSN</td>
						<td>$dateAdded</td>
						<td>$location</td>
						<td>$report</td>
					</tr>
				";
				$countNum ++;
			}

			$data .= "</table>";
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=GAFCSC_IT_RECORDS.xls");
			echo $data;
			
		}else{
			echo "<script>window.location.href = 'main.php'</script>";
		}
	}
?>