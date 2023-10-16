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
	$sql = "DELETE FROM todo  where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "message added.";
?>

