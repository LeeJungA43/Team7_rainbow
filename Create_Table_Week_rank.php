<?php
	$mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	} else {
		$sql = "create table Week_rank (large_category VARCHAR(20), small_category VARCHAR(20) NOT NULL PRIMARY KEY)";
		$res = mysqli_query($mysqli, $sql);
	}
	mysqli_close($mysqli);
?>