<?php 
session_start();
require_once'./models/config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page administrateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page_admin_body">
<header>
        <nav>
            
            <ul>
                <li>
                    <a href="index.php" ><img src="./Pictures/logo jdm shop.png" width="7%" alt=""></a>
                </li>

                <li>
                    <a href="#"><img src="./Pictures/phone" width="37%" alt=""></a>
                    <a class="text_nav" href="#"><h3>Contactez-nous</h3></a>
                </li>

                <li>
                    <a href="#"><img src="./Pictures/account" width="45%" alt=""></a>
                    <a href="register.php" class="text_nav"><h3>Mon compte</h3></a>
                </li>

                <li>
                    <a href="#"><img src="./Pictures/cart" width="50%" alt=""></a>
                    <a href="#" class="text_nav"><h3>Panier</h3></a>
                </li>

            </ul>

        </nav>
    </header>
    <main class="main_admin_page">

        <div class="user_modif">
            
        <table class="table_users">
        
                <tr class="table_top_users">

                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>role</th>
                    <th>pictures</th>
                    <th>delete</th>
                    <th>set admin</th>
                    <th>set user</th>
                    
                </tr>
        
        <?php 
            $recup_user = $bdd->query('SELECT * FROM register');
            while($user_admin = $recup_user->fetch())
            {
                ?>

                    <tr class="table_mid_users">

                        <th><?= $user_admin['nom']?></th>
                        <th><?= $user_admin['Prenom']?></th>          
                        <th><?= $user_admin['email']?></th>

                        <form action="./role.php" method="POST">
                            <th> <?= $user_admin['role']?></th>
                            <th><?= $user_admin['urlPicture']?></th>
                            <th><a class="btn_del_user" href="./delete.php?id_register_delete=<?= $user_admin['id_register'] ?>">Delete</a></th>
                            <th><a class="btn_set_admin" href="./role.php?id_register_admin=<?= $user_admin['id_register'] ?>">admin</a></th>
                            <th><a class="btn_set_user" href="./role.php?id_register_user=<?= $user_admin['id_register'] ?>">user</a></th>
                            
                        </form>

                    </tr>

                    

              <?php      
            }
        ?>
            </table>
        </div>

    </main>
</body>
</html>