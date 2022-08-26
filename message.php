<?php
include "db.php";
$stmtt = $db->query("select * from chat") ;
$id = $_GET['id'];



extract($_POST);

if ( !empty($_POST)) {
  try {

   $mid = $_GET['id'];

   $stmt = $db->prepare("INSERT INTO chat (mid, userid, message, name) VALUES (?,?,?,?)");
   $stmt->execute([$mid, $_SESSION['user']['id'], $message, $_SESSION['user']['name']]);
   header("Location: message.php?id=$id");

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
        #listtickets { border: 1px solid #666; background: #aaf; margin-top: 50px;}
        #listtickets table { width: 100%; border-collapse: collapse; }
        td, th { border:1px solid #99f; padding: 10px; text-align: center;}
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

<div id="listtickets">
    <table>
    <?php
        
    foreach($stmtt as $chat) {
        if($id == $chat['mid']){
            echo '<tr>';
            echo '<td>' . $chat['name'] . '</td>';
            echo '<td>' . $chat['message'] . '</td>';
            echo '<tr>';
        }
    }

    ?>
    </table>
</div>


<form id="send" action="" method="post">
    <div class="row">

        <fieldset>
            <input name="message" type="text" class="form-control" id="message" placeholder="message" required="">
        </fieldset>
    
        <fieldset>
                <button type="submit" id="form-submit" class="filled-button">Send</button>
        </fieldset>

    </div>
</form>
        
</body>
</html>