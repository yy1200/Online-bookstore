<?php
session_start();

// 清除登入相關資訊
unset($_SESSION['user_ID']);

// 重新導向到登入頁面或其他適當的頁面
header("Location: BookStore.html");
exit();
?>