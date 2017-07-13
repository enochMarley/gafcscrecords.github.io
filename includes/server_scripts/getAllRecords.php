<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		echo "<script>window.location.href = '../../index.php'</script>";
	}

	include "dbConfig.php";

	$getQuery = "SELECT * FROM items ORDER BY location;";

	$getResult = mysqli_query($database,$getQuery);

	if (mysqli_num_rows($getResult) > 0) {
		$countNum = 1;
		 echo "<table class='table table-bordered table-hover'>
		    <thead>
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
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>";
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

			echo "<tr>
			<td>$countNum</td>
			<td>".substr($monitorBN,0,15)."</td>
			<td>".substr($monitorSN,0,15)."</td>
			<td>".substr($systemBN,0,15)."</td>
			<td>".substr($systemSN,0,15)."</td>
			<td>".substr($UPSBN,0,15)."</td>
			<td>".substr($UPSSN,0,15)."</td>
			<td>".substr($dateAdded,0,15)."</td>
			<td>".substr($location,0,15)."</td>
			<td>".substr($report,0,15)."</td>
			<td>
				<a href='viewItem.php?itemId=$itemId'><button class='btn btn-custom-2'><i class='fa fa-eye'></i> View</button></a><span>&nbsp;&nbsp;&nbsp;</span>
				<a href='editItem.php?itemId=$itemId'><button class='btn btn-custom-2'><i class='fa fa-pencil'></i> Edit</button></a><span>&nbsp;&nbsp;&nbsp;</span>
				<a href='deleteItem.php?itemId=$itemId'><button class='btn btn-custom-2'><i class='fa fa-trash-o'></i> Delete</button></a>
			</td>
			</tr>";
			
			$countNum ++;
		}

		echo "</<tbody>
			</table>";
		
	}else{ ?>
		<br><br><br>
		<div class="row">
			<h1 class="text-center">There Are No Items In Records Database.</h1>
			<div class="col-md-5"></div>
			<div class="col-md-2">
				<button class="btn btn-custom-2" data-target="#myModal" data-toggle="modal"><i class="fa fa-plus"></i> Add Item</a>
			</div>
			<div class="col-md-5"></div>
		</div>
<?php
	}
?>