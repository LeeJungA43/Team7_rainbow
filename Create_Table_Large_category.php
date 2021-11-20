<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$mysqli = mysqli_connect("localhost","team07","team07","team07");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "create table Large_category (large_category VARCHAR(20) NOT NULL PRIMARY KEY)";
	$res = mysqli_query($mysqli,$sql);
	if ($res === TRUE) {
		echo "Table large category successfully created.";
	} else {
	printf("Could not create table: %s\n", mysqli_error($mysqli));
	}
mysqli_close($mysqli);
}
?>
</body>
</html>