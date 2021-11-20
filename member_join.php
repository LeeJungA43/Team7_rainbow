<?php
$mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "insert into User_info (id, password) values('".$_POST["id"]."', '".$_POST["password"]."')";
	$res = mysqli_query($mysqli, $sql);
}
?>

<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/home.html">