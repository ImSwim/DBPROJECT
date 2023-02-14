<HTML>
	<meta charset="utf-8">
<HEAD>
	<TITLE> 강의 수정 : 경희대학교 학부 수강신청 시스템</TITLE>       
	<link rel="icon" href="Image/favicon.png" type="image/x-icon" >
</HEAD>
<BODY>
<TABLE width=20% border=3 bordercolor=white><TH><A HREF='SignUp.html'>회원가입하러가기</A></TH>
<TH><A HREF='LogIn.html'>로그인하러가기</A></TH></TABLE><P>
	<CENTER><IMG SRC="Image/favicon.png" style="width: 110px;" /><BR>
	<B><FONT size=6>교수자용 강의 정보 수정 시스템</FONT><P>
	<?php
if (isset($_GET['ProfessorID'])){
	$ProfessorID = $_GET['ProfessorID'];
	$mysqli = mysqli_connect("localhost", "sim", "2021104012", "sim");
	if (mysqli_connect_errno()) {
		printf("수강신청 시스템 접근에 실패했습니다.: %s\n" , mysqli_connect_error());
		exit();
	} else {
		$sql = "SELECT * FROM P_COURSE as C JOIN P_PROFESSOR as P ON P.ProfessorID = C.ProfessorID WHERE P.ProfessorID = '$ProfessorID' ORDER BY C.Class, C.grade, C.CourseDate";
		$res = mysqli_query($mysqli, $sql);
		if ($res) {
			# 수강신청 테이블
			echo "<CENTER><TABLE width=90% bgcolor= white border=5 bordercolor= #9A0E17>";
			echo "<TH COLSPAN = 100%><FONT size= 5 color=#9A0E17 > 2022-1학기 진행 예정 강의 목록 </FONT></TH><TR>";
			echo "<TH>학수번호및분반</TH> <TH>강의명</TH> <TH>이수구분</TH> <TH>담당교수</TH> <TH>정원</TH> <TH>잔여인원</TH> <TH>강의시간</TH><TH>강의실</TH><TH>대상학년</TH><TH>학점</TH><TR>\n";
			$list_0 = array(); $ProfessorName = ' '; 
			while ($newArray = mysqli_fetch_array($res, MYSQLI_NUM)) {
				$ProfessorName = $newArray['13'];
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
				echo "<TR>\n";
				array_push($list_0, $newArray['0']);
				}
			echo "</TABLE></CENTER><BR>\n";
			echo "<FONT size=4>위 정보는<FONT size=5> $ProfessorName  </FONT>님의 2022년 1학기 진행 예정 강의 목록입니다.";
			echo "<P>아래 수정 테이블을 통해 강의실, 강의 시간, 정원 수정이 가능합니다. </FONT>";
			echo "<P><FONT size=3>수정 버튼 클릭시 아래에 있는<FONT size=5> 모든 내용이 재입력 </FONT> 되므로 변경되지 않는 정보도 알맞게 입력해주세요.";
			# 강의 수정 테이블
			echo "<FORM action= ModifyCourse.php , method= get>";
			echo "<INPUT type=hidden name=ProfessorID value=$ProfessorID>";
			echo "<TABLE width=70% bgcolor= white border=5 bordercolor= #9A0E17>";
			echo "<TH COLSPAN = 100%><FONT size= 5 color=#9A0E17 > 강의 정보 수정 테이블 </FONT></TH><TR>";
			echo "<TH COLSPAN=20%>학수번호및분반</TH><TH COLSPAN=20%>정원</TH><TH COLSPAN=20%>강의날짜</TH><TH COLSPAN=20%>강의시간</TH><TH COLSPAN=20%>강의실</TH><TR>";
			echo "<TD COLSPAN=20%><CENTER><select name=CourseID >";
			foreach ($list_0 as $CourseID) {
				echo "<option value=$CourseID>$CourseID";}
			echo "</select></CENTER></TD>";
			echo "<TD COLSPAN=20%><CENTER><input type=text name=Capacity size = 15 maxlength=3 >명</text></CENTER></TD>";
			echo "<TD COLSPAN=20%><CENTER>";
			echo "<select name=CourseDate>";
			echo "<option value='월,수'>월,수";
			echo "<option value='화,목'>화,목";
			echo "<option value='금'>금";
			echo "<option value='토'>토";
			echo "</select> 요일 </CENTER></TD>";
			echo "<TD  COLSPAN=20%><CENTER> 수업 시간 <select name=CoursePeriod>";
			echo "<option value='1'>1(9:00-10:15)";
			echo "<option value='2'>2(10:30-11:45)";
			echo "<option value='3'>3(12:00-13:15)";
			echo "<option value='4'>4(13:30-14:55)";
			echo "<option value='5'>5(15:00-16:15)";
			echo "<option value='6'>6(16:30-17:45)";
			echo "<option value='7'>7(18:00-19:15)";
			echo "<option value='1,2'>1,2(주 1회 강의만 해당)";
			echo "<option value='2,3'>2,3(주 1회 강의만 해당)";
			echo "<option value='3,4'>3,4(주 1회 강의만 해당)";
			echo "<option value='4,5'>4,5(주 1회 강의만 해당))";
			echo "<option value='5,6'>5,6(주 1회 강의만 해당)";
			echo "<option value='6,7'>6,7(주 1회 강의만 해당)";
			echo "<option value='7,8'>7,8(주 1회 강의만 해당)";
			echo "<option value='0'>주 1회 2차시 없음(1~0학점 해당)";
			echo "</select> 교시<BR>";
			echo "</CENTER></TD>";
			echo "<TD COLSPAN=20%><CENTER>";
			echo "<select name=CourseRoom>";
			echo "<option value='공176'>공학관 176호";
			echo "<option value='공367'>공학관 367호";
			echo "<option value='공367'>공학관 227호";
			echo "<option value='공148'>공학관 148호";
			echo "<option value='공469'>공학관 469호";
			echo "<option value='공358'>공학관 358호";
			echo "<option value='공244'>공학관 244호";
			echo "<option value='멀408'>멀티미디어관 408호";
			echo "<option value='멀207'>멀티미디어관 207호";
			echo "</select></CENTER></TD><TR>";
			echo "<TD COLSPAN=100%><CENTER><input type=submit value='수정 내용 제출'><CENTER></TD>";
			echo "</TABLE><BR>\n";
			
		} else {
 		printf("강의 데이터를 불러오는 과정에서 오류가 발생했습니다.: %s\n", mysqli_error($mysqli)); 
 		} 
 	mysqli_free_result($res); 
 	mysqli_close($mysqli); 
 	} 
} else { 
 	 echo "<CENTER><P><FONT size = 5> 경희대학교 강의 수정 시스템</FONT>은<P>";
 	 echo "교수자 권한으로 로그인 후 접근 가능합니다. 아래 링크로 이동해 로그인을 먼저 진행해주세요<P>";
 	 echo "<CENTER><TABLE width=30% border=5 bordercolor=white><TH><A HREF="."SignUp.html".">회원가입하러가기</TH>";
 	 echo "<TH><A HREF="."LogIn.html".">로그인하러가기</TH></TABLE></CENTER>";
 } 
?>
</BODY>
</HTML>