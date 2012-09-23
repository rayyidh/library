  <html><head><title>Change Record form</title>
</head>
<body>
<?php
error_reporting (E_ALL ^ E_NOTICE);
 include 'includes/connect.php';
 

$query=" SELECT * FROM projects WHERE ID='$_GET[id]'";
$result=mysql_query($query);
 while($info = mysql_fetch_array( $result )) {
mysql_query(" UPDATE projects SET state='1' WHERE ID='$_GET[id]'");
header('Location: project.php');
 }
?>

</body>
</html>