<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>
<body class="body_register">
    <form action="register_traitement.php" method="POST">
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
    <main>
        <div class="register_page">

            <h1 class="title_register">REGISTER</h2>
            <?php 
            if(isset($_GET['reg_err']))
            {
                $err = htmlspecialchars($_GET['reg_err']);

                switch($err)
                {
                    case 'not' :
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> une erreur c'est produite !
                        </div>
                        <?php
                        break;

                    case 'empty' :
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> entrer tout les champs demander !
                        </div>
                        <?php
                        break;
                        
                    case 'succes':
                        ?>
                        <div class="error">
                            <strong>succès</strong> votre compte a était crée !
                        </div>
                        <?php
                        break;
                        
                    case 'password':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> Les mots de passe ne correspondent pas !
                        </div>
                        <?php
                        break;
                    
                    case 'email':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> l'Email n'est pas valide !
                        </div>
                        <?php
                        break;
                        
                    case 'email':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> l'Email n'est pas valide !
                        </div>
                        <?php
                        break;
                    
                    case 'email_length':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> l'Email est trop long !
                        </div>
                        <?php
                        break;
                    
                    case 'prenom_length':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> le prenom est trop long !
                        </div>
                        <?php
                        break;
                    
                    case 'nom_length':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> le nom est trop long !
                        </div>
                        <?php
                        break;

                    case 'already':
                        ?>
                        <div class="error">
                            <strong>Erreur</strong> votre compte existe deja !
                        </div>
                        <?php
                        break;
                }
            }
            ?>

            <div class="nom">
                <h3>Nom</h3>
                <input type="text" name="nom" placeholder="Entrer votre nom" id="" value="<?php if(isset($nom)) { echo $nom;
                 } ?>">
            </div>

            <div class="prenom">
                <h3>Prenom</h3>
                <input size="25" type="text" name="prenom" placeholder="Entrer votre prenom" id="">
            </div>

            <div class="mail">
                <h3>Adresse Email</h3>
                <input size="25" type="text" name="email" placeholder="Entrer votre adresse Email" id="" value="<?php if(isset($email)) { echo $email; } ?>">
            </div>

            <div class="motDePasse">
                <h3>Mot de passe</h3>
                <input size="25" type="password" name="password" placeholder="Entrer votre mot de passe" id="">
            </div>

            <div class="conf_motDePasse">
                <h3>Confirmer votre mot de passe</h3>
                <input size="25" type="password" name="password_check" placeholder="Confirmer votre mot de passe" id="">
            </div>

            <input type="submit">

            <div class="login_link">
                <h3>Déjà inscrit ? <a href="login.php">LOGIN</a></h3>
            </div>
        
        </div>
    </main>
    </form>
</body>
</html>