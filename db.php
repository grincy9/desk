<?php
session_start();
$db = new PDO("mysql:host=localhost;dbname=staj;charset=utf8mb4", "root", "");

function checkUser($email, $pass)
{
    global $db;
    $stmt = $db->prepare("select * from userinfo where email=?");
    $stmt->execute([$email]);
    if ($stmt->rowCount()) {
        $user = $stmt->fetch();
        $hash_pwd = $user["password"];
        return $hash_pwd == $pass;
    }

    //email does not exist
    return false;
}



function validUser()
{
    return isset($_SESSION['user']);
}


function getUser($email){
    global $db ;

    try{
        $sql = "SELECT * FROM userinfo WHERE email= :email";
        $stmt = $db->prepare($sql) ;
        $stmt->execute(["email" => $email]);   
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }catch(PDOException $ex){
        header("Location: error.php");
        echo "Error.";
        exit;
    }
}





