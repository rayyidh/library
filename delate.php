<HTML>
<?php
 include 'includes/connect.php';
  include 'project.php';
error_reporting (E_ALL ^ E_NOTICE);
//header('Location: project.php');
mysql_query("UPDATE projects SET state='1' WHERE ID ='$id'");
echo "Information Deleted";

?>
</HTML>