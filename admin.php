<?php 
session_start();
require_once'./models/config.php';

if($_SESSION["role"] === "admin")
{
    
} else if($_SESSION["role"] === "user")
{
    header("location: index.php?error=vous devez avoir un role admin pour acceder a cette page");
}



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
                    <a href="#"><img src="./Pictures/account" width="45%" alt=""></a>
                    <a href="register.php" class="text_nav"><h3> bonjour, <?= $_SESSION['email']; ?> </h3></a>
                </li>

                <li>
                    <a href="#"><img src="./Pictures/cart" width="50%" alt=""></a>
                    <a href="#" class="text_nav"><h3>Panier</h3></a>
                </li>

            </ul>

        </nav>
    </header>
    <main class="main_admin_page">

        <h1 class="admin_title">UTILISATEUR</h1>
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
            $recup_user = $bdd->query('SELECT * FROM user');
            while($user_admin = $recup_user->fetch())
            {
                ?>

                    <tr class="table_mid_users">

                        <th><?= $user_admin['nom']?></th>
                        <th><?= $user_admin['prenom']?></th>           
                        <th><?= $user_admin['email']?></th>


                            <th> <?= $user_admin['role']?></th>
                            <th><?= $user_admin['url_pictures']?></th>
                            <th><a class="btn_del_user" href="./delete.php?id_register_delete=<?= $user_admin['id_user'] ?>">Delete</a></th>
                            <th><a class="btn_set_admin" href="./role.php?id_register_admin=<?= $user_admin['id_user'] ?>">admin</a></th>
                            <th><a class="btn_set_user" href="./role.php?id_register_user=<?= $user_admin['id_user'] ?>">user</a></th>


                    </tr>   
            <?php      
            }
            ?>
            </table>
        </div>

        <h1 class="admin_title">EDIT PRODUITS</h1>

        <div class="produits_modif">

            <table class="table_produits_modif">

            <tr class="table_top_articles">

                <th>Nom produit</th>
                <th>Prix produit</th>
                <th>Images articles</th>
                <th>Thème</th>
                <th>Déscription</th>
                <th>Delete</th>
                <th>Submit</th>

            </tr>
            <?php 
            $recup_articles = $bdd->query('SELECT * FROM articles');
            while($article_admin = $recup_articles->fetch())
            { 
                ?>
                
                <tr class="table_mid_articles">

                    <form action="./articles_admin.php?id=<?=$article_admin['id_articles']?>" method="post">

                    <th><input type="text" name="nom_articles_admin" id="input_articles_admin" value="<?= $article_admin['nom_articles'] ?>"></th>
                    <th><input type="text" value="<?= $article_admin['prix_articles'] ?>  $" name="prix_articles_admin" id="prix_articles_admin" size="10"></th>
                    <th><input type="text" name="articles_pictures_admin" id="image_article_admin" value="<?= $article_admin['articles_pictures'] ?>"></th>

                    <th><input type="text" name="theme_article" id="theme_admin" value="<?= $article_admin['id_theme_articles'] ?>"></th>
                    <th><textarea name="dsc_article" id="dsc_articles" cols="30" rows="5"><?= $article_admin['dsc_articles'] ?></textarea></th>
                    
                    <th><a class="btn_del_articles" href="./delete.php?id_article_delete=<?= $article_admin['id_articles'] ?>">delete</a></th>
                    <th><input class="btn_edit_article" type="submit" name="modifier" value="modifier"></th> 
                    
                    </form>

                </tr>
            <?php 
            }
            ?>

            </table>
        </div>

        <div class="div_add_article">

            <form action="./add_article_admin.php" method="post">
                
                <table class="table_add_article">

                    <tr>

                    <td><h3>ADD ARTICLES</h3></td>

                    </tr>

                    <tr>
                        <td><h5>Nom produit :</h5></td>

                        <td>
                            <input type="text" name="nom_articles" id="nom_produit_add" placeholder="entrez le nom du produit">
                        </td>

                    </tr>
                    
                    <br>

                    <tr>
                        <td><h5>Prix produit :</h5></td>
                        <td><input type="text" name="prix_articles" id="prix_produit_add" placeholder="entrez le prix du produit"></td>
                    </tr>
                    
                    <br>

                    <tr>
                        <td><h5>ajout image produit :</h5></td>
                        <td><input type="text" name="articles_pictures" id="picture_produit_add" placeholder="entrez le lien de l'image"></td>
                    </tr>

                    <br>

                    <tr>
                        <td><h5>theme produit  :</h5></td>
                        <td><input type="text" name="id_theme_articles" id="theme_admin_add" placeholder="entrez le theme de l'article"></td>
                    </tr>

                    <br>

                    <tr>
                        <td><h5>Déscription :</h5></td>
                        <td><textarea name="dsc_articles" id="dsc_admin_add" cols="30" rows="5" placeholder="ajouter une déscription"></textarea></td>
                    </tr>
                    
                    <tr>

                    <td><input type="submit" class="btn_send_article" value="ajouter"></td>
                    
                    </tr>
                </table>

            </form>

        </div>


    </main>
</body>
</html>