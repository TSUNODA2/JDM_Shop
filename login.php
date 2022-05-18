<?php 
require_once'./models/config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body class="body_login"> 
  
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
    
    <main class="main_login">
  
    <form method="POST" action="log.php">

            <ul class="login_page">

                <?php 

                
            if(isset($_GET['login_err']))
            {
                $err = htmlspecialchars($_GET['login_err']);

                switch($err)
                {
                    case 'end':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> entrer tout les champsddddd demander !
                        </div>
                        <?php
                        break;

                    case 'empty':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> entrer tout les champs demander !
                        </div>
                        <?php
                        break;

                    case 'password':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> mot de passe incorrect !
                        </div>
                        <?php
                        break;

                    case 'email':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> email incorrect !
                        </div>
                        <?php
                        break;

                    case 'already':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> ce compte n'existe pas !
                        </div>
                        <?php
                        break;
                        
                }
            }
            ?>

                <li class="title_login"><h1>LOGIN</h1></li>

                <?php 
                    if(isset($_GET['log_err']))
                    {
                        $err_log = htmlspecialchars($_GET['log_err']);

                        switch($err_log)
                        {
                            case 'password_bad' :
                                ?>
                                <div class="error_log">
                                    <strong>Erreur : </strong>mot de passe incorrect !
                                </div>
                                <?php
                                break;
                            
                            case 'mail_bad' :
                                ?>
                                <div class="error_log">
                                    <strong>Erreur : </strong>Votre email est incorect !
                                </div>
                                <?php
                                break;

                            case 'empty_log' :
                                ?>
                                <div class="error_log">
                                    <strong>Erreur : </strong>Entrer tout les champs demander !
                                </div>
                                <?php
                                break;
                                
                        }
                    }
                ?>

                <li class="mail">

                    <h3>Adresse email</h3>
                    <input size="35" type="email" name="email" placeholder="Entrer votre adresse Email" value="<?php if(isset($email)) { echo $email; } ?>">

                </li>

                <li class="motDePasse">

                    <h3>Mot de passe</h3>
                    <input size="35" type="password" name="password" placeholder="Entrer votre mot de passe">

                </li>

                <li><input class="btnSendLog" type="submit"></li>

                <li class="login_link"><h3>Créer un compte ? <a href="register.php">REGISTER</a></h3></li>
            
            

        </ul>

         
      
    </form>

    </main>
 
</body>