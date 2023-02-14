<?php
$Who = $_GET["Who"]; $ID = $_GET["ID"]; $Password = $_GET["Password"];
$mysqli = mysqli_connect("localhost", "sim", "2021104012", "sim");

if (mysqli_connect_errno()) {
	printf("시스템 오류로 로그인이 불가능합니다.<br>: %s\n" , mysqli_connect_error());
	exit();
} else {
	if ( $Who == "Professor") {
		$sql = "SELECT COUNT(*) as isunique FROM P_PROFESSOR WHERE ProfessorID = '$ID' AND Password = '$Password'";
		$res = mysqli_query($mysqli, $sql);
		if ($res) {
			while( $count = mysqli_fetch_array( $res ) ) {
				$isunique = $count[ 'isunique' ] ;}
			if ($isunique == 1) {
				mysqli_close($mysqli); 
				echo "<B><br><br><center>교수 권한으로 로그인에 성공했습니다. <br> 아래 버튼을 클릭해 작업화면으로 이동하세요.</center><br><br><B>";
				echo "<form action="."ShowModify.php"." method=GET>";
				echo "<input type=hidden name=ProfessorID value=$ID>";  
				echo "<center><input type=submit value='강의 수정 및 삭제하기' ></form></center>"; 
			} else { 
				printf("<br><br><br><center> 해당 아이디, 패스워드가 존재하지 않습니다. 처음 화면으로 돌아가 회원가입을 시도해주세요. <br> %s\n </center>", mysqli_error($mysqli));
				mysqli_close($mysqli);}
		} else {
			printf("<br><br><br><center> 해당 아이디 패스워드 정보 접근에 실패했습니다. 처음 화면으로 돌아가 다시 시도해주세요. <br> %s\n </center>", mysqli_error($mysqli));
			mysqli_close($mysqli);}
 	} else {
 		$sql = "SELECT COUNT(*) as isunique FROM P_STUDENT WHERE StudentID = '$ID' AND Password = '$Password'";
		$res = mysqli_query($mysqli, $sql);
		if ($res) {
			while( $count = mysqli_fetch_array( $res ) ) {
				$isunique = $count[ 'isunique' ] ;}
			if ($isunique == 1) {
				mysqli_close($mysqli); 
				echo "<form action="."ShowRegistration.php"." method=GET>";
				echo "<input type=hidden name=StudentID value=$ID>";  
				echo "<B><br><br><center>학생 권한으로 로그인에 성공했습니다. <br> 아래 버튼을 클릭해 수강신청 화면으로 이동하세요.</center><br><br><B>";
				echo "<center><input type=submit value='수강신청 화면 이동' ></form></center>"; 
			} else { 
				printf("<br><br><br><center> 해당 아이디, 패스워드가 존재하지 않습니다. 처음 화면으로 돌아가 회원가입을 시도해주세요. <br> %s\n </center>", mysqli_error($mysqli));
				mysqli_close($mysqli);}
		} else {
			printf("<br><br><br><center> 해당 아이디 패스워드 정보 접근에 실패했습니다. 처음 화면으로 돌아가 다시 시도해주세요. <br> %s\n </center>", mysqli_error($mysqli));
			mysqli_close($mysqli);}
	}
}
?>