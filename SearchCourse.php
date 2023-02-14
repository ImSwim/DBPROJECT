<HEAD>
	<TITLE> 검색결과 : 경희대학교 학부 수강신청 시스템</TITLE>       
	<link rel="icon" href="Image/favicon.png" type="image/x-icon" >
</HEAD>
<BODY>
<BR><CENTER><IMG SRC=Image/favicon.png style=width:100px></CENTER><BR>
<?php
if (isset($_GET['StudentID'])){$ID = $_GET['StudentID']; $CourseID=$_GET['CourseID']; $ProfessorName=$_GET['ProfessorName']; $Class = $_GET['Class']; $Grade = $_GET['Grade'];
echo "<B><CENTER><FONT size=6>경희대학교 학부 수강신청 시스템<BR>검색 결과창</FONT><P><FONT size=4> 별도의 강의시간 중복 제한 혹은 학점제한(18학점)이 설정되어있지 않음에 유의하시길 바랍니다. </FONT></B></CENTER>";
echo "<FORM action=ShowRegistration.php , method= get>\n";
echo "<CENTER><button type=submit name=StudentID value=$ID>처음 화면으로 돌아가기</button></CENTER></FORM><br>";  
$mysqli = mysqli_connect("localhost", "sim", "2021104012", "sim");

if (mysqli_connect_errno()) {
	printf("수강신청 시스템 접근에 실패했습니다.: %s\n" , mysqli_connect_error());
	exit();
} else {
	$sql = "SELECT * FROM P_COURSE as C JOIN P_PROFESSOR as P ON P.ProfessorID = C.ProfessorID WHERE C.CourseID ='$CourseID' or P.ProfessorName ='$ProfessorName' or C.Grade ='$Grade' or C.Class ='$Class'";
	$res = mysqli_query($mysqli, $sql);
	if ($res) {
		# 수강신청 테이블
		echo "<FORM action=Registration.php , method= get>\n";
		echo "<input type=hidden name=StudentID value=$ID>";  
		echo "<CENTER><TABLE width=90% bgcolor= white border=5 bordercolor= #9A0E17>";
		echo "<TH COLSPAN = 100%><FONT size= 5 color=#9A0E17 > 강의 신청 화면 </FONT></TH><TR>";
		echo "<TH>학수번호및분반</TH> <TH>강의명</TH> <TH>이수구분</TH> <TH>담당교수</TH> <TH>정원</TH> <TH>잔여인원</TH> <TH>강의시간</TH><TH>강의실</TH><TH>대상학년</TH><TH>학점</TH><TH>신청버튼</TH><TR>\n";
		while ($newArray = mysqli_fetch_array($res, MYSQLI_NUM)) {
				echo "<TD><CENTER>".$newArray['0']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['1']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['2']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['13']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['4']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['6']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['7']."교시</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['8']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['9']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['10']."</CENTER></TD>\n";
				echo "<TD COLSPAN = 10%><CENTER><button type= submit name= Registration value=".$newArray['0'].">신청</CENTER></TD>\n";
				echo "<TR>\n";}
		echo "</TABLE></CENTER><BR>\n";
	} else {
 		printf("<CENTER>강의 데이터를 불러오는 과정에서 오류가 발생했습니다.: %s\n</CENTER>", mysqli_error($mysqli)); 
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
