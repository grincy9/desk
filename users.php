<?php
require "db.php";
$stmt = $db->query("select * from userinfo") ;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #listusers { border: 1px solid #666; background: #aaf; margin-top: 50px;}
        #listusers table { width: 100%; border-collapse: collapse; }
        td, th { border:1px solid #99f; padding: 10px; text-align: center;}
    </style>
</head>
<body>

    <div class="links">
        <a class="link" href="adminticket.php"><em>write a ticket<em></a>
        <a class="link" href="admin.php"><em>tickets<em></a>

    </div>

    <div id="listusers">
        <table>
        <?php
        
        foreach($stmt as $user) {
            if($user['admin'] == 0 && $user['statuss'] == 1){
            
                echo '<tr>';
                echo '<td>' . $user['id'] . '</td>';
                echo '<td>' . $user['name'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                ?>
                <td><a href="delete.php?id=<?php echo $user['id']; ?>">Delete</a></td>
                </tr>
                <?php
            }
        }
    ?>
        
    </table>
    </div>
    <a class="link" href="logout.php"><em>exit<em></a>
</body>
</html>