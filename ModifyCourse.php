<HTML>
	<meta charset="utf-8">
<HEAD>
	<TITLE> 수정 결과 : 경희대학교 학부 수강신청 시스템</TITLE>       
	<link rel="icon" href="Image/favicon.png" type="image/x-icon" >
</HEAD>
<BODY>
<BR><CENTER><IMG SRC=Image/favicon.png style=width:100px></CENTER><BR>
<?php

if (isset($_GET['ProfessorID'])){
$ID = $_GET['ProfessorID']; $CourseID=$_GET['CourseID']; $Capacity=$_GET['Capacity']; $CourseDate=$_GET['CourseDate']; 
$CoursePeriod=$_GET['CoursePeriod']; $CourseRoom=$_GET['CourseRoom']; 
$mysqli = mysqli_connect("localhost", "sim", "2021104012", "sim");
if (mysqli_connect_errno()) {
	printf("수강신청 시스템 접근에 실패했습니다.: %s\n" , mysqli_connect_error());
	exit();
} else {
	$sql = "UPDATE P_COURSE ";
	$sql .= " SET Capacity='".$Capacity."', CourseDate='".$CourseDate."', CoursePeriod='".$CoursePeriod."', CourseRoom='".$CourseRoom."'";
	$sql .= " WHERE CourseID='".$CourseID."'";
	$res = mysqli_query($mysqli, $sql) ;
	if ($res) {
		echo "<CENTER><P><B><FONT size=6>수정이 완료되었습니다.</FONT><BR></B></CENTER>";
		echo "<CENTER><form action="."ShowModify.php"." method=GET>";
		echo "<button type=submit name=ProfessorID value=$ID>수정 화면으로 돌아가기</button></form></CENTER>"; 
	} else {
 		printf("데이터베이스에 입력되지 못했습니다. 강의시간, 강의실을 조정하여 다시 수정을 시도해주세요.<P> %s\n", mysqli_error($mysqli)); 
 		echo "<CENTER><P><form action="."ShowModify.php"." method=GET>";
 		echo "<button type=submit name=ProfessorID value=$ID>수정 화면으로 돌아가기</button></form></CENTER>"; 
 	} 
 	mysqli_close($mysqli); 
 } } else { 
 	 echo "<CENTER><P><FONT size = 5> 경희대학교 수강신청 시스템</FONT>은<P>";
 	 echo "로그인 후에 접근이 가능합니다. 아래 링크로 이동해 로그인을 먼저 진행해주세요<P>";
 	 echo "<CENTER><TABLE width=30% border=5 bordercolor=white><TH><A HREF="."SignUp.html".">회원가입하러가기</TH>";
 	 echo "<TH><A HREF="."LogIn.html".">로그인하러가기</TH></TABLE></CENTER>";
 	} 
?>
</BODY>
</HTML>
