<?php
$servername = "localhost";
$user_name = "root";
$pass_word = "j11136901020";
$dbname = "online_book_store";

$conn = new mysqli($servername, $user_name, $pass_word, $dbname);
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}
?>