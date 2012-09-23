<html><head><title>Change Record form</title>

</head>
<body>
<?php
error_reporting (E_ALL ^ E_NOTICE);
 include 'includes/connect.php';
 

$query=" SELECT * FROM threads WHERE id='$_GET[id]'";
$query1=" SELECT * FROM replies WHERE thread='$_GET[id]'";
$result=mysql_query($query);
$result1=mysql_query($query1);
 while($info = mysql_fetch_array( $result )) {
mysql_query(" UPDATE threads SET state='1' WHERE id='$_GET[id]'");
 while($info1 = mysql_fetch_array( $result1)) {
mysql_query(" UPDATE replies SET state='1' WHERE thread='$_GET[id]'");
 }
 header('Location: adminthreads.php');
 }

?>

</body>
</html>