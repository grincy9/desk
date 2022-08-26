<?php
include "db.php";

$id = $_GET['id']; 

$sql = "UPDATE userinfo set statuss=2 where id = '$id'";
$db->exec($sql);

$sqlt = "UPDATE ticket set statuss=0 where t_id = '$id'";
$db->exec($sqlt);


header("Location: users.php");
exit;

?>