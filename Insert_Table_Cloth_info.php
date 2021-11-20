<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?php
$mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "LOAD DATA INFILE 'cloth_data_UTF.csv' INTO TABLE `Cloth_info` FIELDS TERMINATED BY ','(`large_category`,`small_category`, `name`, `price`, `purchase_num`, `site`, `image`, `link`)";
	$res = mysqli_query($mysqli,$sql);
	if ($res === TRUE) {
		echo "Cloth information successfully imported.";
	} else {
	printf("Could not import data: %s\n", mysqli_error($mysqli));
	}
mysqli_close($mysqli);
}
?>
</body>
</html>