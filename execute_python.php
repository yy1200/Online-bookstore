<?php
$command = escapeshellcmd('python book_rs.py');
$output = shell_exec($command);
echo $output;
?>