<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ./login.html');
    }
?>

<?php
$userid = $_SESSION['user_id'];
$change = $_POST["password"];
$mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	mysqli_autocommit($mysqli, FALSE);
	$sql = "UPDATE User_info SET password='$change' WHERE id = '$userid'";
	$res = mysqli_query($mysqli, $sql);
	mysqli_commit($mysqli);
	mysqli_close($mysqli);
}
?>

<meta charset="utf-8" />
<script type="text/javascript">alert('비밀번호가 변경되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/home.html">