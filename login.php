<meta charset="utf-8" />
<?php	
	session_start(); // cookie 세션 스타트
	$mysqli = mysqli_connect("127.0.0.1","team07","team07","team07");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}elseif($_POST["id"] == "" || $_POST["password"] == ""){
		//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아간다
		echo '<script> alert("아이디나 비밀번호를 입력하세요"); history.back(); </script>';
	}else{
		$sql = "select * from User_info where id='".$_POST["id"]."'";
		$res = mysqli_query($mysqli, $sql);

		$user = $res->fetch_array(MYSQLI_ASSOC);
	}

	if($user['password']==$_POST["password"]){
		$_SESSION['user_id'] = $user["id"];
		$_SESSION['user_pw'] = $user["password"];
		header('Location: ./HOME_user.php');
	}
	else{
		//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아간다
		echo '<script> alert("비밀번호를 잘못 입력하셨습니다."); history.back(); </script>';
}
?>