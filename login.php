<?php
require "db.php";

if (!empty($_POST)) {
  extract($_POST); 

  if (checkUser($email, $password)) {
    getUser($email);
    $_SESSION["user"] = getUser($email);
  } else {
      echo "Wrong email and/or password";
  }
}

if(validUser()){

    if($_SESSION['user']['statuss'] == 1){
        if($_SESSION['user']['admin'] == 1){
            header("Location: users.php");
        }else{
            header("Location: index.php");
        }
    }else{
        echo "you are not member";
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
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    margin: 50px auto;
    text-align: center;
    width: 800px;
}
h1 {
    font-family: 'Passion One';
    font-size: 2rem;
    text-transform: uppercase;
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
p.success,
p.error {
    color: white;
    font-family: lato;
    background: yellowgreen;
    display: inline-block;
    padding: 2px 10px;
}
p.error {
    background: orangered;
}
.button{
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

<div>
    <form id="contact" action="?" method="post">
    <div class="row">
        <fieldset>
            <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
        </fieldset>
        <fieldset>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password" required="">
        </fieldset>
        <fieldset>
            <button type="submit" id="form-submit" class="filled-button">Giriş</button>
        </fieldset>
    </div>
    </form>
    <a class="button" href="signup.php"><em>Signup<em></a>

</div>


</body>
</html>