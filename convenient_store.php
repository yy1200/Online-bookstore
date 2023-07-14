<?php
include("user_connect.php");
// 连接到数据库

// 执行查询
$query = "SELECT store_name FROM convenient_store";
$result = mysqli_query($connection, $query);

// 生成下拉列表的选项
$options = '';
while ($row = mysqli_fetch_assoc($result)) {
    $store_name = $row['store_name'];
    $options .= '<option value="' . $store_name . '">' . $store_name . '</option>';
}

// 关闭数据库连接

// 返回下拉列表的选项
echo $options;
?>
