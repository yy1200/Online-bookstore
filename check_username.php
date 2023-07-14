<?php
include 'user_connect.php';
// 取得 AJAX 傳遞的使用者輸入資料
$usernameInput = $_GET['username'];

// 使用 MySQLi 語法搜尋資料庫
$sql = "SELECT * FROM users WHERE username = '$usernameInput'";
$result = $conn->query($sql);

// 檢查是否有結果
if ($result->num_rows > 0) {
    // 使用者名稱已存在
    echo "exists";
} else {
    // 使用者名稱不存在
    echo "available";
}

// 關閉與資料庫的連線
$conn->close();
?>