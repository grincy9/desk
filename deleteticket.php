<?php
include "db.php";
$id = $_GET['id'];

$sqlt = "UPDATE ticket SET statuss=0 where id = '$id' and lockk=0";
$db->exec($sqlt);

header('Location: ticket.php')

?>