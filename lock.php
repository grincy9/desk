<?php
include "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM ticket WHERE id = '$id'";
$sql_prepare = $db -> prepare($sql);
$result = $db -> query($sql);
$lock = $result -> fetch(PDO::FETCH_ASSOC);


if($lock['lockk']==0){
    $sqlt = "UPDATE ticket set lockk=1 where id = '$id'";
    $db->exec($sqlt);
}else{
    $sqlt = "UPDATE ticket set lockk=0 where id = '$id'";
    $db->exec($sqlt);
}

header('Location: admin.php');
exit;

?>