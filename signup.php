<?php
require "db.php";
require_once './vendor/autoload.php' ;
require_once './Mail.php' ;

extract($_POST);

if ( !empty($_POST)) {
  try {
   function setGlobalVariable() {
    $GLOBALS['SixDigitRandomNumber'] = mt_rand(100000,999999);
   }

   setGlobalVariable();
    $_SESSION['RandomNumber']=$SixDigitRandomNumber;

   $hashpass = hash('sha256', $SixDigitRandomNumber);

    Mail::send($email, "VerificationCode", "http://localhost/staj/verify.php?code=$hashpass" ) ; 

    

    
    
   $stmt = $db->prepare("INSERT INTO userinfo (name,email,password, admin, statuss,verification, hashh) VALUES (?,?,?,?,?,?,?)" ) ;
   $hashPass = password_hash($password, PASSWORD_BCRYPT) ;
   $stmt->execute([$name, $email,$password, 0, 0, $SixDigitRandomNumber, $hashpass]) ;
   


  } catch(PDOException $ex) {
    //gotoErrorPage();
    echo $ex->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
body {
    margin: 50px auto;
    text-align: center;
    width: 800px;
}
label {
    width: 150px;
    display: inline-block;
    text-align: left;
    font-size: 1.5rem;
    font-family: 'Lato';
}
input {
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
}
form {
    margin: 25px auto;
    padding: 20px;
    border: 5px solid #ccc;
    width: 500px;
    background: #eee;
}
div.form-element {
    margin: 20px 0;
}
button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: yellowgreen;
    color: white;
    border: none;
}

    </style>
</head>
<body>
    
<form id="contact" action="?" method="post">
  <div class="row">
                  
    <fieldset>
      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
    </fieldset>
    <fieldset>
      <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
    </fieldset>            
    <fieldset>
      <input name="password" type="password" class="form-control" id="password" placeholder="Password" required="">
    </fieldset>             
    <fieldset>
      <button type="submit" id="form-submit" class="filled-button">Kayıt Ol</button>
    </fieldset>
                
  </div>
</form>

</body>
</html>