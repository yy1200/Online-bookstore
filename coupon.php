<?php

include("user_connect.php");

$coupon_code = $_POST['coupon_code'];

// 檢查是否收到POST請求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 獲取輸入的優惠券序號
  $coupon_code = $_POST['coupon_code'];
  $sql = "SELECT * FROM coupon WHERE coupon_code = '$coupon_code'";

  // 在這裡進行優惠券驗證的處理
  $result = $conn->query($sql);
  // 可以查詢資料庫，確認優惠券序號是否有效

  if ($result->num_rows > 0) {
    // 優惠券驗證成功的處理
    echo '優惠券已成功使用！';
  } else {
    // 優惠券驗證失敗的處理
    echo '優惠券無效或已被使用！';
  }
}
?>
