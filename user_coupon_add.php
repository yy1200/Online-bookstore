<?php
include("user_connect.php");
session_start();
$user_id=$_SESSION['user_ID'];
if (isset($_GET['coupon_ID']) ) {

    $coupon_ID = $_GET['coupon_ID'];

// 檢查使用者是否已領取該優惠券
    $checkSql = "SELECT * FROM user_coupon WHERE user_ID = '$user_id' AND coupon_ID = '$coupon_ID'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // 使用者已領取過該優惠券，顯示訊息並跳轉到「已領取過此優惠券」頁面
        echo '您已領取過此優惠券。';
        echo '<meta http-equiv="refresh" content="2;url=user_coupon.php">';
    } else {
        // 新增資料進使用者優惠券表
        $insertSql = "INSERT INTO user_coupon (user_ID, coupon_ID) VALUES ('$user_id', '$coupon_ID')";
        if (mysqli_query($conn, $insertSql)) {
            echo '優惠券領取成功!';
            echo '<meta http-equiv="refresh" content="2;url=user_coupon.php">';
        } else {
            echo '優惠券領取失敗!';
            echo '<meta http-equiv="refresh" content="2;url=user_coupon.php">';
        }
    }
}
?>

