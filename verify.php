<?php
  require "db.php" ;
      
    $code = $_GET['code'];
    
    $stmt = $db->query("SELECT * FROM userinfo ORDER BY id DESC LIMIT 1");
    $user = $stmt->fetch();

    $id=$user['id'];

     
    if($code == $user['hashh']){
            
        $sql = "UPDATE userinfo set statuss=1 where id = '$id'";
        $db->exec($sql);

    }
       
  
    header( "refresh:3;url=login.php" );

    exit;
    
  
?>



