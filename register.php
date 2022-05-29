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
    

    <?= require'./header.php'; ?>

<form action="register_traitement.php" method="POST">
    
    <main>
        <!-- register page -->

        <div class="register_page">

            <h1 class="title_register">REGISTER</h2>
            <?php 
            // if the register traitement send a error this gona show to the user what thype of error has been return 
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
                <input size="25" type="text" name="nom" placeholder="Entrer votre nom" id="input_register" value="<?php if(isset($nom)) { echo $nom; } ?>">
            </div>

            <div class="prenom">
                <h3>Prenom</h3>
                <input size="25" type="text" name="prenom" placeholder="Entrer votre prenom" id="input_register">
            </div>

            <div class="mail">
                <h3>Adresse Email</h3>
                <input size="25" type="text" name="email" placeholder="Entrer votre adresse Email" id="input_register" value="<?php if(isset($email)) { echo $email; } ?>">
            </div>

            <div class="motDePasse">
                <h3>Mot de passe</h3>
                <input size="25" type="password" name="password" placeholder="Entrer votre mot de passe" id="input_register">
            </div>

            <div class="conf_motDePasse">
                <h3>Confirmer votre mot de passe</h3>
                <input size="25" type="password" name="password_check" placeholder="Confirmer votre mot de passe" id="input_register">
            </div>

            <input class="button_register" type="submit">

            <div class="login_link">
                <h3>Déjà inscrit ? <a href="login.php">LOGIN</a></h3>
            </div>
        
        </div>
    </main>
    </form>
    <!-- end register page -->
</body>
</html>