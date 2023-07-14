<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");

$coupon_name = $_POST['coupon_name'];
$coupon_code = $_POST['coupon_code'];
$vip_user=$_POST['vip_user'];
$discount = $_POST['discount'];
$valid_from = $_POST['valid_from'];
$valid_to = $_POST['valid_to'];



//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

 //新增資料進資料庫語法
	if($coupon_name==null || ($coupon_code==null & $vip_user==null) || $discount==null || $valid_from==null || $valid_to==null)
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_coupon.php>';
	}
	else
	{
	$sql = "INSERT INTO coupon (coupon_name,coupon_code,vip_user,discount,valid_from,valid_to) VALUES ('$coupon_name','$coupon_code','$vip_user','$discount','$valid_from','$valid_to')";
	if(mysqli_query($conn,$sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_coupon.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_coupon.php>';
	}
	}

?>