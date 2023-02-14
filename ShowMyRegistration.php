<HTML>
	<meta charset="utf-8">
<HEAD>
<TITLE>  신청내역 확인 : 경희대학교 학부 수강신청 시스템</TITLE>       
	<link rel="icon" href="Image/favicon.png" type="image/x-icon" >
</HEAD>
<BODY>
<TABLE width=20% border=3 bordercolor=white><TH><A HREF='SignUp.html'>회원가입하러가기</A></TH>
<TH><A HREF='LogIn.html'>로그인하러가기</A></TH></TABLE><P>
<BR><CENTER><IMG SRC=Image/favicon.png style=width:130px></CENTER><BR>
<?php
if (isset($_GET['StudentID'])){
$ID = $_GET['StudentID'];
# 수강신청하러가기
		echo "<P><P><P><CENTER><FORM action=ShowRegistration.php , method= get>";
		echo "<input type=hidden name=StudentID value=$ID>";  
		echo "<button type=submit><font size=5>수강신청 하러가기</font></button></FORM></CENTER>";  
$mysqli = mysqli_connect("localhost", "sim", "2021104012", "sim");

if (mysqli_connect_errno()) {
	printf("수강신청 시스템 접근에 실패했습니다.: %s\n" , mysqli_connect_error());
	exit();
} else {
	$sql = "SELECT * FROM P_COURSE as C
	LEFT JOIN P_REGISTRATION as R ON R.CourseID = C.CourseID
	LEFT JOIN P_PROFESSOR as P ON C.ProfessorID = P.ProfessorID
	WHERE R.StudentID = '$ID'
	ORDER BY C.Class, C.grade, P.ProfessorName, C.CourseDate";
	$res = mysqli_query($mysqli, $sql);
	if ($res) {
		echo "</FORM>";  
		# 수강신청 테이블
		echo "<B><CENTER><FONT size=6>$ID 님의 수강신청 내역입니다.</FONT><P><FONT size=4> 한 번에 하나의 강의만 삭제할 수 있으며, 삭제 버튼을 누르면 별도의 안내 없이 곧바로 삭제됩니다.  </FONT>";
		echo "<FORM action=MyRegistration.php , method= get>\n";
		echo "<input type=hidden name=StudentID value=$ID>";  
		echo "<CENTER><TABLE width=90% bgcolor= white border=5 bordercolor= #9A0E17>";
		echo "<TH COLSPAN = 100%><FONT size= 5 color=#9A0E17 > 강의 신청 화면 </FONT></TH><TR>";
		echo "<TH>학수번호및분반</TH> <TH>강의명</TH> <TH>이수구분</TH> <TH>담당교수</TH> <TH>정원</TH> <TH>잔여인원</TH> <TH>강의시간</TH><TH>강의실</TH><TH>대상학년</TH><TH>학점</TH><TH>삭제버튼</TH><TR>\n";
		while ($newArray = mysqli_fetch_array($res, MYSQLI_NUM)) {
				echo "<TD><CENTER>".$newArray['0']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['1']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['2']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['15']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['3']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['4']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['7']."교시</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['8']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['9']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['10']."</CENTER></TD>\n";
				echo "<TD COLSPAN = 10%><CENTER><button type= submit name= Deletion value=".$newArray['0'].">삭제</CENTER></TD>\n";
				echo "<TR>\n";}
		echo "</TABLE></CENTER><BR>\n";
		
	} else {
 		printf("강의 데이터를 불러오는 과정에서 오류가 발생했습니다.: %s\n", mysqli_error($mysqli)); 
 	} 
 	mysqli_free_result($res); 
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
</BODY>
</HTML>
