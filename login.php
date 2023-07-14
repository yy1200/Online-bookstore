<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    include 'user_connect.php';

    // 檢查帳號是否存在
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // 帳號不存在，顯示註冊提示
        echo "您尚未註冊，請先註冊";
        // 跳轉至註冊頁面
        header("Location: register.html");
        exit();
    } else {
        // 帳號存在，檢查密碼是否正確
        $row = $result->fetch_assoc();
        if ($password == $row["password"]) {
            $user_ID = $row["user_ID"];
            session_start();
            $_SESSION["user_ID"] = $user_ID;

            // 密碼正確，獲取角色值
            $role = $row["role"];
            // 根據角色值導向不同頁面
            if ($role == "user") {
                header("Location: BookStore_Login.php");
                exit();
            } elseif ($role == "admin") {
                header("Location: manager.php");
                exit();
            }
        } else {
            header("Location: login.html?error=1");
            exit();
        }
    }

    $conn->close();
}
?>