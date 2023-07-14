<?php
// 假設你已經連接到資料庫，並且有一個包含使用者資料的資料表

// 獲取從前端提交的表單資料
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_num = $_POST['phone_num'];
$address = $_POST['address'];
$sex = $_POST['sex'];
$birth = $_POST['birth'];

include("user_connect.php");

// 更新資料庫中的使用者資料
$query = "UPDATE users SET
            password = '$password',
            name = '$name',
            email = '$email',
            phone_num = '$phone_num',
            address = '$address',
            sex = '$sex',
            birth = '$birth'
          WHERE username = '$username'";

if (!mysqli_query($connection, $query)) {
    echo "更新使用者資料失敗：" . mysqli_error($connection);
} else {
    echo "使用者資料已成功更新！";
}

// 關閉連線
mysqli_close($connection);
?>