<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");
$user_ID = $_SESSION['user_ID'];

if (!isset($user_ID)) {
    header('location:BookStore_Login.php');
}

$order_date = date('Y-m-d');
$delivery_date = date('Y-m-d', strtotime($order_date . ' +3 days'));
$total_amount = $_POST['total_amount'];
$payment_method = $_POST['payment_method'];
$invoice_method = $_POST['invoice_method'];
$location_ID = $_POST['shipping_ID'];
$place_ID = $_POST['location_ID'];

echo $order_date;
echo $delivery_date;
echo $total_amount;
echo $payment_method;
echo $invoice_method;
echo $location_ID;
echo $place_ID;

if ($user_ID != null && $order_date != null && $total_amount != null && $payment_method != null && $invoice_method != null && ($location_ID != null || $place_ID != null) && $delivery_date != null) {
    $sql = "INSERT INTO orders (`user_ID`, `order_date`, `total_amount`, `payment_method`, `invoice_method`, `delivery_date`,`location_ID`, `place_ID`) VALUES ($user_ID, '$order_date', $total_amount, '$payment_method', '$invoice_method', '$delivery_date', '$location_ID', '$place_ID')";
    if (mysqli_query($conn, $sql)) {
        $order_ID = mysqli_insert_id($conn); // 获取最后插入行的 order_ID

        // 获取购物车中特定用户的数据
        $shoppingCartSql = "SELECT isbn, quantity FROM shoppingcart WHERE user_ID = $user_ID";
        $shoppingCartResult = mysqli_query($conn, $shoppingCartSql);

        // 更新 book 表中的 inventory 值
        while ($row = mysqli_fetch_assoc($shoppingCartResult)) {
            $isbn = $row['isbn'];
            $quantity = $row['quantity'];

            // 更新 book 表中相应的 inventory 值
            $updateBookSql = "UPDATE book SET inventory = inventory - $quantity WHERE isbn = '$isbn'";
            mysqli_query($conn, $updateBookSql);
        }

        // 将 shoppingcart 数据插入 order_list 表中
        $orderListSql = "INSERT INTO order_list (order_ID, user_ID, isbn, quantity, total_price)
                     SELECT $order_ID, user_ID, isbn, quantity, total_price
                     FROM shoppingcart
                     WHERE user_ID = $user_ID";
        mysqli_query($conn, $orderListSql);


        // 订单创建成功后执行删除操作
        $deleteSql = "DELETE FROM shoppingcart WHERE user_ID = $user_ID";
        mysqli_query($conn, $deleteSql);
        unset($_SESSION['payment_method']);
        unset($_SESSION['invoice_method']);

        if ($_SESSION['coupon_ID']) {
            $couponID = $_SESSION['coupon_ID'];
            $deleteCouponSql = "DELETE FROM user_coupon WHERE coupon_ID = $couponID AND user_ID=$user_ID";
            mysqli_query($conn, $deleteCouponSql);
            unset($_SESSION['coupon_ID']);
        }


        echo "<script>alert('訂單成立!'); window.location='BookStore_Login.php';</script>";
        exit(); // 终止脚本执行
    } else {
        echo "<script>alert('訂單未完成,請重新送單!'); window.location='BookStore_Login.php';</script>";
        exit(); // 终止脚本执行
    }
}

?>