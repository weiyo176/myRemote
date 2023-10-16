<p>Todo list</p>
<!-- <a href="0.輸入表單.html">新增待辦事項</a> -->
<hr />
<table  border="1">
  <tr>
    <td>id</td>
    <td>Job</td>
    <td>Urgent</td>
    <td>Job Content</td>
    <td>狀態</td>
    <td>修改狀態</td>
    <td>編輯</td>
    <td>刪除</td>
  </tr>
<?php
require("dbconfig.php");
$sql = "select * from todo;";
$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
mysqli_stmt_execute($stmt); //執行SQL
$result = mysqli_stmt_get_result($stmt); //取得查詢結果

while (	$rs = mysqli_fetch_assoc($result)) { //用迴圈逐筆取出
  $done = "未完成";
  if ($rs['finsh']) {
    $done = "完成";
  }
	echo "<tr><td>" , $rs['id'] ,
	"</td><td>" , $rs['jobName'],
	"</td><td>" , $rs['jobUrgent'], 
	"</td><td>", $rs['jobContent'],
  "</td><td>", $done,
  "</td><td> <input type='button' onClick=\"loadURLandBack('5.editFinsh.php?id=",$rs['id'],"')\" value=\"click\">",
	"</td><td> <input type='button' onClick=\"loadURL('3.editUI.php?id=",$rs['id'],"')\" value=\"edit\">",
  "</td><td> <input type='button' onClick=\"loadURLandBack('4.delete.php?id=",$rs['id'],"')\" value=\"delete\">",
	"</td></tr>";
}
// <input type='button' onClick="postForm()" value="save">
?>
</table>
