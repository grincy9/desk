<?php
require "db.php";
$stmt = $db->query("select * from chat") ;

$id = $_GET['id'];

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
    </style>
</head>
<body>
    <div id="listtickets">
        <table>
        <?php
        
        foreach($stmt as $chat) {
            if($id == $chat['mid']){
                echo '<tr>';
                echo '<td>' . $chat['message'] . '</td>';
                echo '<tr>';
            }
        }

    ?>

    <td><a href="message.php?id=<?php echo $id; ?>">Message</a></td>
    </table>
    </div>
</body>
</html>