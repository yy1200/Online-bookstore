<?php
include("user_connect.php");

// 处理表单提交的地址数据
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取用户和地址数据
    $user_ID = $_POST['user_ID'];
    $address = $_POST['address'];

    // 插入地址到数据库
    $sql = "INSERT INTO address (user_ID, address) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_ID, $address);
    $stmt->execute();

    // 返回成功信息
    echo "地址已保存到數據庫！";

    // 关闭数据库连接
    $stmt->close();
    $conn->close();
}
?>
