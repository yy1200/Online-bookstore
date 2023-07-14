<?php
session_start();
$store_name = $_GET['store_name'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>選擇的門市</title>
</head>
<body>
  
  <?php echo $store_name; ?>
</body>
</html>
