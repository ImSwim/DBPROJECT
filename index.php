<HTML>
<meta charset="utf-8">
<HEAD>
<TITLE> 인덱스 : 경희대학교 학부 수강신청 시스템</TITLE>       
	<link rel="icon" href="Image/favicon.png" type="image/x-icon" >
</HEAD>
<BODY>
	<CENTER>
	<IMG SRC="Image/favicon.png" style="width: 140px;" /><BR><BR>
	<B> 산업경영공학과 교수 및 학생의 2022년 1학기 전공 강의로 한정하여 디자인했습니다. <B><BR><BR>
	<TABLE width=700 height=70 bgcolor= white border= 10 bordercolor= white>
		<TH COLSPAN = 100%><BR><FONT SIZE = 6><A HREF="SignUp.html"> 회원가입 하러가기<BR><BR></FONT></TH><TR>
		<TH COLSPAN = 100%><BR>교수 테스트용 아이디/비밀번호 리스트<BR><BR></TH><TR>
		<TH COLSPAN = 100%><?php 
		include 'Professors.php' 
		?> </TH><TR>
		<TH COLSPAN = 100%> <BR><BR><BR><BR>회원가입/로그인 없이 접속 불가능<BR><BR> </TH><TR>
		<TH COLSPAN = 100%><A HREF="LogIn.html"> 로그인 하러가기 </TH><TR>
		<TH COLSPAN = 100%><A HREF="ShowRegistrationScreen.php"> 수강신청 하러가기(학생) </TH><TR>
		<TH COLSPAN = 100%><A HREF="ShowMyRegistration.php"> 나의 수강신청내역 확인 하러가기(학생) </TH><TR>
		<TH COLSPAN = 100%><A HREF="ModifyCourse.html"> 나의 강의 수정, 삭제하러가기(교수)</TH><TR>
	</TABLE></CENTER>
	</FONT>
	</FORM>
</BODY>
</HTML>