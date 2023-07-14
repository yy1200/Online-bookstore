<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");

$shipping_ID = $_POST['shipping_ID'];
$shipping_method = $_POST['shipping_method'];



//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

 //新增資料進資料庫語法
	$sql = "INSERT INTO Shipping (shipping_method) VALUES ('$shipping_method')";
	if(mysqli_query($conn,$sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_shipping.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_shipping.php>';
	}

?>