<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>優惠券</title>
</head>

<body>
  <form id="couponForm" action="coupon.php" method="post">
    <input type="text" name="coupon_code" placeholder="請輸入優惠券序號">
    <button type="submit">使用優惠券</button>
  </form>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
  session_start();
  include("user_connect.php");
  $user_id = $_SESSION['user_ID'];


  //將資料庫裡的所有會員資料顯示在畫面上  
  $sql = "SELECT coupon.coupon_ID,coupon_name,discount,valid_from,valid_to FROM user_coupon,coupon WHERE coupon.coupon_ID=user_coupon.coupon_ID AND user_ID=$user_id";
  $result = mysqli_query($conn, $sql);

  echo "<table border='1'>
      <tr>
  
        <td>優惠券名稱</td>
        <td>折扣</td>
        <td>啟用日期</td>
        <td>到期日期</td>
        <td><td>
      </tr>";

  while ($row = mysqli_fetch_row($result)) {
    $_SESSION['coupon_ID'] = $row[0];
    $coupon_name = $row[1];
    $discount = $row[2];
    $valid_from = $row[3];
    $valid_to = $row[4];

    echo "
        <tr>
          <td>$coupon_name</td>
          <td>$discount</td>
          <td>$valid_from</td>
          <td>$valid_to</td>
          <td><a href='shopping.php?discount=$discount'>使用</a></td>
        </tr>";
  }

  echo "</table>";
  ?>
</body>

</html>