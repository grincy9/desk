<?php
require "db.php";
$stmt = $db->query("select * from ticket") ;

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
        
        foreach($stmt as $ticket) {
            if($_SESSION['user']['id'] == $ticket['t_id'] && $ticket['statuss'] == 1){
                echo '<tr>';
                echo '<td>' . $ticket['name'] . '</td>';
                echo '<td>' . $ticket['email'] . '</td>';
                echo '<td>' . $ticket['subject'] . '</td>';
                echo '<td>' . $ticket['message'] . '</td>';
                ?>
                <td><a href="deleteticket.php?id=<?php echo $ticket['id']; ?>">Delete</a></td>
                <td><a href="message.php?id=<?php echo $ticket['id']; ?>">Message</a></td>
                </tr>
                <?php
            }
        }

        ?>
    </table>
    </div>

    <a class="link" href="index.php"><em>back<em></a>
</body>
</html>