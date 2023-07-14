<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");


$storeName = $_POST['store_name'];
$storeAddress = $_POST['store_address'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

 //新增資料進資料庫語法
	$sql = "INSERT INTO convenient_store ( store_name,store_address) VALUES ( '$storeName', '$storeAddress')";
	if(mysqli_query($conn,$sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_place.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_place.php>';
	}

?>