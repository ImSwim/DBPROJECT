<?php 
$mysqli = mysqli_connect("localhost", "sim", "2021104012", "sim");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n" , mysqli_connect_error());
	exit();
} else {
$sql = "SELECT * FROM P_PROFESSOR ORDER BY ProfessorName";
$res = mysqli_query($mysqli, $sql);
if ($res) {
	echo "<CENTER><TABLE border = 1>\n";
	echo "<TH>아이디</TH> <TH>비밀번호</TH> <TH>교수명</TH> <TH>학과</TH><TR>\n";
	while ($newArray = mysqli_fetch_array($res, MYSQLI_NUM)) {
				echo "<TD><CENTER>".$newArray['0']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['1']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['2']."</CENTER></TD>\n";
				echo "<TD><CENTER>".$newArray['3']."</CENTER></TD>\n";
				echo "<TR>\n";}
		echo "</TABLE></CENTER><BR>\n";
	} else {
 		printf("Could not retrieve records: %s\n", mysqli_error($mysqli)); 
 	} 
 	mysqli_free_result($res); 
 		mysqli_close($mysqli); }
?>