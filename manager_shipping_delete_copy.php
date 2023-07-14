<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");

$shipping_ID = $_GET['shipping_ID'];

 //新增資料進資料庫語法
	$sql = "DELETE FROM Shipping WHERE shipping_ID=$shipping_ID";
	
    if(mysqli_query($conn,$sql))
	{
		echo '刪除成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_shipping.php>';
	}
	else
	{
		echo '刪除失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_shipping.php>';
	}
?>

