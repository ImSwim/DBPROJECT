<?php
$Name = $_GET["Name"]; $Who = $_GET["Who"]; $Department = $_GET["Department"]; $ID = $_GET["ID"]; $Password = $_GET["Password"];
$mysqli = mysqli_connect("localhost", "sim", "2021104012", "sim");
if($Name== null or $Password == null or $Department== null or $ID== null){
	printf("<br><br><br> 회원가입에 실패했습니다. 아래 사항에 유의하여 다시 시도해주세요.<br> %s\n", mysqli_error($mysqli));
			echo "<br> <br>해당 경우에 오류가 발생합니다. <OL> 
					<LI> 아이디가 10자 이상인 경우 </center>
					<LI> 비밀번호를 입력하지 않거나  15자 이상인 경우 </center>
					<LI> 이미 존재하는 아이디, 비밀번호인 경우 </OL>";
}else{
if (mysqli_connect_errno()) {
	printf("시스템 오류로 회원가입이 불가능합니다.<br>: %s\n" , mysqli_connect_error());
	exit();
} else {
	if ( $Who == "Professor") {
		$sql = "INSERT INTO P_PROFESSOR VALUES ('$ID', '$Password', '$Name', '$Department')";
		$res = mysqli_query($mysqli, $sql);
		if ($res) {
			echo "<br><br><br><center>$Name 님, 교수 권한으로 회원가입에 성공했습니다. 로그인 화면으로 이동하시려면 아래 버튼을 클릭해주세요.</center>";
			mysqli_close($mysqli); 
			echo  "<br><br><center><A HREF="."LogIn.html"."> 로그인 화면으로 이동하기</button></center>";
		} else {
			printf("<br><br><br><center>$Name 님, 회원가입에 실패했습니다. 처음 화면으로 돌아가 다시 시도해주세요: %s\n </center>", mysqli_error($mysqli));
			mysqli_close($mysqli);}
 	} else {
 		$sql = "INSERT INTO P_STUDENT VALUES ('$ID', '$Password', '$Name', '$Department')";
		$res = mysqli_query($mysqli, $sql);
		if ($res) {
			echo "<br><br><br><center>$Name 님, 학생 권한으로 회원가입에 성공했습니다. 로그인 화면으로 이동하시려면 아래 버튼을 클릭해주세요.</center><br>";
			mysqli_close($mysqli); 
			echo  "<br><br><center><A HREF="."LogIn.html"."> 로그인 화면으로 이동하기</button></center>";	
		} else {
			printf("<br><br><br>$Name 님, 회원가입에 실패했습니다. 아래 사항에 유의하여 다시 시도해주세요.<br> %s\n", mysqli_error($mysqli));
			echo "<br> <br>해당 경우에 오류가 발생합니다. <OL> 
					<LI> 아이디가 10자 이상인 경우 </center>
					<LI> 비밀번호를 입력하지 않거나  15자 이상인 경우 </center>
					<LI> 이미 존재하는 아이디, 비밀번호인 경우 </OL>";
			mysqli_close($mysqli);}
	}
}
}
?>
