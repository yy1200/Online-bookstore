<?php
session_start();

$isbn = $_GET['isbn'];
include 'user_connect.php';
$user_ID = $_SESSION['user_ID'];
$quantity = 1;

$query = "SELECT price FROM book WHERE isbn = '$isbn'";
$result = mysqli_query($conn, $query);

// 檢查查詢結果
if ($result) {
    // 檢查是否有符合的記錄
    if (mysqli_num_rows($result) > 0) {
        // 讀取第一筆記錄的 price 值
        $row = mysqli_fetch_assoc($result);
        $price = $row['price'];

        // 在這裡可以對 $price 做進一步的處理或輸出到網頁上
        // echo "ISBN: $isbn 的價格是 $price";
    } else {
        // echo "找不到符合的書籍";
    }
} else {
    // echo "查詢失敗：" . mysqli_error($conn);
}

$query = "INSERT INTO shoppingcart (user_ID, isbn, quantity, total_price) VALUES ('$user_ID', '$isbn', '$quantity', '$price')";
$result = mysqli_query($conn, $query);
if ($result) {
    // 新增成功
    echo '<script>alert("商品添加成功"); window.history.back();</script>';
    http_response_code(200);
} else {
    // 新增失敗
    http_response_code(500);
}
?>