<?php
require('dbconfig.php');
// $jobID=$_POST['jobID'];
// $jobName=$_POST['name']; //$_GET, $_REQUEST
// $jobUrgent=$_POST['urgent'];
// $jobContent=$_POST['content'];
$id=(int)$_GET['id'];
if ($id <=0) {
	echo "error!! empty ID";
	exit(0);
}
$sql = "select * from todo where id= $id;";
$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
mysqli_stmt_execute($stmt); //執行SQL
$result = mysqli_stmt_get_result($stmt); //取得查詢結果
while (	$rs = mysqli_fetch_assoc($result)) { //用迴圈逐筆取出
	$done = 1;
	if ($rs['finsh']) {
	  $done = 0;
	}
	$sql = "UPDATE todo set finsh=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ii", $done,$id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL 
}
?>

