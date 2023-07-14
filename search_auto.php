<?php
include 'user_connect.php';

// 获取自动完成的搜索词
$term = $_POST['term'];
$booktype = $_POST['booktype'];

// 查询数据库以获取相关选项
// $query = "SELECT name FROM book WHERE name LIKE '%$term%'";
if ($booktype != 'all') {
    $query = "SELECT name FROM book WHERE category='$booktype' AND name LIKE '%$term%'";
} else {
    $query = "SELECT name FROM book WHERE name LIKE '%$term%'";
}
$result = $conn->query($query);

// 构建自动完成选项的数组
$options = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options[] = $row['name'];
    }
}

// 将自动完成选项以JSON格式返回给客户端
echo json_encode($options);

// 关闭数据库连接
$conn->close();
?>