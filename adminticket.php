<?php
require "db.php";

extract($_POST);

if ( !empty($_POST)) {
  try {
   $stmt = $db->prepare("INSERT INTO ticket (name,email,subject,message, t_id, lockk, statuss) VALUES (?,?,?,?,?,?,?)" ) ;
   $stmt->execute([$name, $email,$subject, $message, $_SESSION['user']['id'], 0, 1]) ;
   $stmt = $db->prepare($sql) ;
   $res = $stmt->execute([$name, $email, $subject, $message, $_SESSION['user']['id'], 0, 1]) ;
   header("Location: adminticket.php");

    //Mail send point

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
        .header{
            margin: 25px auto;
            padding: 20px;
            border: 5px solid #ccc;
            width: 500px;
            background: #eee;
        }
       
        form {
            margin: 25px auto;
            padding: 20px;
            border: 5px solid #ccc;
            width: 500px;
            background: #eee;
        }

    </style>
</head>
<body>

    <div class="header">
         <h1>Submit a Support Request</h1>
    </div>

    
        <form id="tickett" action="?" method="post">
            <div class="row">

                <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="name" required="">
                </fieldset>
                <fieldset>
                    <input name="email" type="text" class="form-control" id="email" placeholder="e-mail" required="">
                </fieldset>
                <fieldset>
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                </fieldset>
                <fieldset>
                    <input name="message" type="text" class="form-control" id="message" placeholder="message" required="">
                </fieldset>
                <fieldset>
                        <button type="submit" id="form-submit" class="filled-button">Submit Ticket</button>
                </fieldset>

            </div>
        </form>
        
    <br><br>

    <a class="link" href="users.php"><em>back<em></a>
    
</body>
</html>