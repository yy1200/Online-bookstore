<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("user_connect.php");

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
      <tr>
        <td>username</td>
        <td>password</td>
        <td>name</td>
        <td>email</td>
        <td>phone_num</td>
        <td>address</td>
        <td>sex</td>
        <td>birth</td>
      </tr>";

while ($row = mysqli_fetch_row($result)) {
    $username = $row[2];
    $password = $row[3];
    $name = $row[4];
    $email = $row[5];
    $phone_num = $row[6];
    $address = $row[8];
    $sex = $row[9];
    $birth = $row[10];

    echo "
        <tr>
          <td>$username</td>
          <td>$password</td>
          <td>$name</td>
          <td>$email</td>
          <td>$phone_num</td>
          <td>$address</td>
          <td>$sex</td>
          <td>$birth</td>
          <td><a href='manager_place_update_copy.php?table=" . urlencode('password') . "&location_ID=$password ' >修改</a></td>
          <td><a href='manager_place_delete_copy.php?table=" . urlencode('password') . "&location_ID=$password' onclick=\"return confirm('確定要刪除這筆資料嗎？')\">刪除</a></td>
        </tr>";
}

echo "</table>";
?>