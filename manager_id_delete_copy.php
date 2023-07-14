<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");

$user_ID = $_GET['user_ID'];

 //新增資料進資料庫語法
	$sql = "DELETE FROM users WHERE user_ID=$user_ID";
	
    if(mysqli_query($conn,$sql))
	{
		echo '刪除成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_id.php>';
	}
	else
	{
		echo '刪除失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_id.php>';
	}
?>

