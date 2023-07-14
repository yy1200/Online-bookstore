<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>执行结果</title>
</head>

<body>
    <h1>执行结果</h1>
    <?php
    // 获取表单提交的参数
    $input = $_POST['input'];

    // 调用Python脚本
    $output = shell_exec("python book_rs.py $input");

    // 输出Python脚本的执行结果
    echo "<pre>$output</pre>";
    ?>
</body>

</html>