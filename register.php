<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取從表單傳遞過來的字段值
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $birth = $_POST['birth'];

    // 在這裡執行註冊邏輯，例如將用戶名和密碼保存到數據庫中

    // 假設已連接到你的資料庫
    include 'user_connect.php';

    // 在這裡執行插入數據到數據庫的操作
    $sql = "INSERT INTO users (username, password, email, phone_num, address, name, sex, birth)
            VALUES ('$username', '$password', '$email', '$phone', '$address', '$name', '$sex', '$birth')";

    if ($conn->query($sql) === TRUE) {
        // 註冊成功，跳出提示框並跳轉到登錄頁面
        echo "<script>alert('註冊成功！'); window.location.href = 'login.html';</script>";
        exit;
    } else {
        echo "註冊失敗: " . $conn->error;
    }

    // 關閉資料庫連接
    $conn->close();
}
?>