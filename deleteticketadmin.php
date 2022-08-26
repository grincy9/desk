<?php
include "db.php";

$id = $_GET['id']; 
$sqlt = "UPDATE ticket SET statuss=0 where id = '$id'";
$db->exec($sqlt);
header("location: admin.php");
exit;
?>