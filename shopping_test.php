<?php
session_start();
include("user_connect.php");

$sql = "SELECT user_ID, isbn AS isbns, count(isbn) AS quantity FROM shoppingcart GROUP BY user_ID, isbn";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
  <tr>
    <th class='name'>名稱</th>
    <th class='value' style='text-align: center;'>單價</th>
    <th class='value' style='text-align: center;'>數量</th>
    <th class='value' style='text-align: center;'>總計</th>
  </tr>";

$total_amount = 0;
while ($row = $result->fetch_assoc()) {
    $user = $row['user_ID'];
    $isbns = $row['isbns'];
    $quantity = $row['quantity'];


    $bookQuery = "SELECT DISTINCT name, price FROM book WHERE isbn IN ($isbns)";
    $bookResult = mysqli_query($conn, $bookQuery);

    if (mysqli_num_rows($bookResult) > 0) {
        while ($bookRow = $bookResult->fetch_assoc()) {
            $name = $bookRow['name'];
            $price = $bookRow['price'];

            // Calculate the value based on price and quantity
            $value = $price * $quantity;
            $total_amount = $total_amount + $value;

            echo "<tr>
        <td>{$name}</td>
        <td style='text-align: center;'>{$price}</td>
        <td style='text-align: center;'>{$quantity}</td>
        <td style='text-align: center;'>{$value}</td>
      </tr>";
        }
    }
}
echo "<table border='1'>
  <tr>
    <th class='name'></th>
    <th class='value' style='text-align: center;'></th>
    <th class='value' style='text-align: center;'></th>
    <th class='value' style='text-align: center;'>訂單總金額</th>
  </tr>";
echo "<table border='1'>
  <tr>
    <th class='name'></th>
    <th class='value' style='text-align: center;'></th>
    <th class='value' style='text-align: center;'></th>
    <th class='value' style='text-align: center;'>{$total_amount}</th>
  </tr>";

echo "</table>";
?>