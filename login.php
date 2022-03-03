<?php 
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=jdm_shop;charset=utf8', 'root', '');

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(!empty($email) AND !empty($password))
    {
        $req = $bdd->prepare("SELECT email, password FROM register WHERE email = ? AND password = ?");
        $req->execute(array($email, $password));
        $userexist = $req->rowCount();
        if($userexist == 1)
        {
            // $userInfo = $req->fetch();
            // $_SESSION['id'] = $userInfo['id'];
            // $_SESSION['email'] = $userInfo['email'];
            // header('location : landing.php?id=' .$_SESSION['id']);

        }else {
            echo "mauvais mdps ou email";
        }
    }else
     {
         echo "ca ne marche pas";
     }
}

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
  
    <form method="POST" action="">

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

                <li class="mail">

                    <h3>Adresse email</h3>
                    <input size="35" type="email" name="email" placeholder="Entrer votre adresse Email" id="" value="<?php if(isset($email)) { echo $email; } ?>">

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