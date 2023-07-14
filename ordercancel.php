<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");

$order_ID = $_GET['order_ID'];


//新增資料進資料庫語法
$sql = "DELETE FROM orders WHERE order_ID=$order_ID ;";

if (mysqli_query($conn, $sql)) {
	echo '取消成功!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=shopping.php>';
} else {
	echo '取消失敗!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=shopping.php>';
}
?>