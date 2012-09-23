<?php
include 'includes/connect.php';
error_reporting (E_ALL ^ E_NOTICE);

$time = time();
mysql_query("INSERT INTO threads VALUES(NULL,'$_POST[title]','$_POST[message]','$_POST[author]','0','$time')");

echo "Thread Posted.<br><a href='frame.php'>Return</a>";
?>