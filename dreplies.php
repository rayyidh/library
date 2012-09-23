<html><head><title>Change Record form</title>

</head>
<body>
<?php
error_reporting (E_ALL ^ E_NOTICE);
 include 'includes/connect.php';
 

$query=" SELECT * FROM replies WHERE id='$_GET[id]'";
$result=mysql_query($query);
 while($info = mysql_fetch_array( $result )) {
mysql_query(" UPDATE replies SET state='1' WHERE id='$_GET[id]'");
//mysql_query(" UPDATE threads SET replies='replies-1' WHERE id='$_GET[id]'");
 header('Location: adminreplies.php');
 }

?>

</body>
</html>