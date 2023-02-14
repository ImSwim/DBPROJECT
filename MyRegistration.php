<HTML>
	<meta charset="utf-8">
<HEAD><TITLE> 삭제 확인 : 경희대학교 학부 수강신청 시스템</TITLE></HEAD>
<BODY>
<BR><CENTER><IMG SRC=Image/favicon.png style=width:100px></CENTER><BR>
<?php
$StudentID = $_GET["StudentID"]; $Deletion = $_GET["Deletion"]; $Datetime = date('Y-m-d H:i:s', time());
$mysqli = mysqli_connect("localhost", "sim", "2021104012", "sim");

if (mysqli_connect_errno()) {
	printf("시스템 연결 오류로 수강신청에 실패하였습니다. : %s\n" , mysqli_connect_error());
	exit();
} else {$sql = "DELETE FROM P_REGISTRATION WHERE CourseID='$Deletion' AND StudentID='$StudentID' ";
	$sql2="SELECT Remaining FROM P_COURSE WHERE CourseID = '$Deletion'";
	$res = mysqli_query($mysqli, $sql); 
	$res2 = mysqli_query($mysqli, $sql2) ; 
	$newRemaining = 0;
	while ($newArray = mysqli_fetch_array($res2, MYSQLI_NUM)) {$newRemaining = $newArray['0']+1;}
	$sql3 = "UPDATE P_COURSE SET Remaining =$newRemaining WHERE CourseID ='$Deletion' ";
	$res3 = mysqli_query($mysqli, $sql3) ;
	if ($res) {
		echo "<br><br><CENTER>현재 시각 [  $Datetime  ]으로 <br>";
		echo "<p> $Deletion 수강신청내역 삭제에 성공하셨습니다.<BR>\n";
		echo "<FORM action= ShowMyRegistration.php method=get>";
		echo "<button type= submit name=StudentID value=$StudentID>확인</button></CENTER>></form>";
		mysqli_close($mysqli); 
	} else {
 		printf("<br><br><CENTER>시스템 오류로 $Deletion 수강신청내역 삭제에 실패했습니다. 확인을 눌러 재시도해주세요. <br> %S\n", mysqli_error($mysqli));
 		echo "<FORM action= ShowMyRegistration.php method=get>";
 		echo "<br><button type= submit name=StudentID value=$StudentID>확인</button></CENTER>";
 		mysqli_close($mysqli); 
 
 	} 
 }  
?>
</BODY>
</HTML>