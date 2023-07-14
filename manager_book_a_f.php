<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");


$name = $_POST['name'];
$author = $_POST['author'];
$format = $_POST['format'];
$book_depository_stars = $_POST['book_depository_stars'];
$price = $_POST['price'];
$currency = $_POST['currency'];
$old_price = $_POST['old_price'];
$isbn = $_POST['isbn'];
$category = $_POST['category'];
$inventory = $_POST['inventory'];
$year = $_POST['year'];


//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

 //新增資料進資料庫語法
	$sql = "INSERT INTO book (`name`,author,`format`,book_depository_stars,price,currency,old_price,isbn,category,inventory,`year`) VALUES ('$name','$author','$format','$book_depository_stars','$price','$currency','$old_price','$isbn','$category','$inventory','$year')";
	if(mysqli_query($conn,$sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_book.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=manager_book.php>';
	}

?>