<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");

$isbn = $_GET['isbn'];



 //新增資料進資料庫語法
	$sql = "DELETE FROM book WHERE isbn=$isbn ;";
	
    if(mysqli_query($conn,$sql))
	{
		echo '刪除成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_book.php>';
	}
	else
	{
		echo '刪除失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_book.php>';
	}
?>

