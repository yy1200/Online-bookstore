<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");

$sql = "SELECT user_ID, isbn AS isbns, count(isbn) AS quantity FROM shoppingcart GROUP BY user_ID, isbn";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
      <tr>
	    <th class='name'>user</th>
        <th class='name'>name</th>
        <th class='value'>price</th>
        <th class='value'>quantity</th>
        <th class='value'>總計</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
  $user = $row['user_ID'];
  $isbns = $row['isbns'];
  $quantity = $row['quantity'];

  $bookQuery = "SELECT DISTINCT name, price FROM book WHERE isbn IN ($isbns)";
  $bookResult = mysqli_query($conn, $bookQuery);

  while ($bookRow = $bookResult->fetch_assoc()) {
    $name = $bookRow['name'];
    $price = $bookRow['price'];

    echo "
        <tr>
		      <td>$user</td>
          <td>$name</td>
          <td>$price</td>
          <td>$quantity</td>
          <td>$value</td>
        </tr>";
  }
}

echo "</table>";
?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>購物車</title>
</head>

<body>

  <?php echo "</table>" ?>
</body>

</html>