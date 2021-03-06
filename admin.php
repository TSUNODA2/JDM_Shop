<?php 
session_start();
require_once'./models/config.php';

// verify if the user have the requested role for enter to this page, if the user dosn't have the role, the user has been return to the main page.

if($_SESSION["role"] === "admin")
{
    
} else if($_SESSION["role"] === "user")
{
    header("location: index.php");
} else if($_SESSION["role"] == '' ) {
    header("location: index.php");
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
    
<?php require'./header.php'; ?>

    <main class="main_admin_page">

        <!-- user list -->

        <h1 class="admin_title">UTILISATEUR</h1>
        <div class="user_modif">
            
        <table class="table_users">
        
                <tr class="table_top_users"> <!-- header of the user table -->

                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>role</th>
                    <th>delete</th>
                    <th>set admin</th>
                    <th>set user</th>
                    
                </tr>
        
            <?php 
            // select all the stuff of the user and put a while to show all the users of the bdd
            $recup_user = $bdd->query('SELECT * FROM user');
            while($user_admin = $recup_user->fetch())
            {
                ?>

                    <tr class="table_mid_users">

                        <th><?= $user_admin['nom']?></th> <!-- show the user nickname -->
                        <th><?= $user_admin['prenom']?></th> <!-- show the user name -->     
                        <th><?= $user_admin['email']?></th> <!-- show the user email -->


                            <th> <?= $user_admin['role']?></th> <!-- show role of the user -->
                            <th><a class="btn_del_user" href="./delete.php?id_register_delete=<?= $user_admin['id_user'] ?>">Delete</a></th> <!-- btn for delete the user -->
                            <th><a class="btn_set_admin" href="./role.php?id_register_admin=<?= $user_admin['id_user'] ?>">admin</a></th> <!-- for set admin role to the user -->
                            <th><a class="btn_set_user" href="./role.php?id_register_user=<?= $user_admin['id_user'] ?>">user</a></th> <!-- for set user role to the user -->


                    </tr>   
            <?php      
            }
            ?>
            </table>
        </div>

        <!-- end user list -->

        <!-- edit product -->

        <h1 class="admin_title">EDIT PRODUITS</h1>

        <div class="produits_modif">

            <table class="table_produits_modif">

            <tr class="table_top_articles"> <!-- header table edit  -->

                <th>Nom produit</th>
                <th>Prix produit</th>
                <th>Images articles</th>
                <th>Th??me</th>
                <th>D??scription</th>
                <th>Delete</th>
                <th>Submit</th>

            </tr>

            <?php 
            // select all the article and create a while for all the article 
            $recup_articles = $bdd->query('SELECT * FROM articles');
            while($article_admin = $recup_articles->fetch())
            { 
                ?>
                
                <tr class="table_mid_articles">

                    <form action="./articles_admin.php?id=<?=$article_admin['id_articles']?>" method="post"> <!-- create a form for edit the article in function of the article -->

                    <!-- the input show and we can modify all we want for the article -->

                    <th><input type="text" name="nom_articles_admin" id="input_articles_admin" value="<?= $article_admin['nom_articles'] ?>"></th>
                    <th><input type="text" value="<?= $article_admin['prix_articles'] ?>  ???" name="prix_articles_admin" id="prix_articles_admin" size="10"></th>
                    <th><input type="text" name="articles_pictures_admin" id="image_article_admin" value="<?= $article_admin['articles_pictures'] ?>"></th>

                    <th><input type="text" name="theme_article" id="theme_admin" value="<?= $article_admin['id_theme_articles'] ?>"></th>
                    <th><textarea name="dsc_article" id="dsc_articles" cols="30" rows="5"><?= $article_admin['dsc_articles'] ?></textarea></th>
                    
                    <th><a class="btn_del_articles" href="./delete.php?id_article_delete=<?= $article_admin['id_articles'] ?>">delete</a></th> <!-- button to delete the article -->
                    <th><input class="btn_edit_article" type="submit" name="modifier" value="modifier"></th> <!-- button modif to confirm the modification enter -->
                    
                    </form>

                </tr>
            <?php 
            }
            ?>

            </table>
        </div>

        <!-- end edit article -->

        <!-- add article -->

        <div class="div_add_article">

            <form action="./add_article_admin.php" method="post"> <!-- this form work with the page article for post the article to the bdd -->

                <!-- table with all case to create a product -->
                
                <table class="table_add_article">

                    <tr>

                    <td><h3>ADD ARTICLES</h3></td>

                    </tr>

                    <!-- table for create the article this table are relate with the add article pages with the input name  -->

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
                        <td><h5>D??scription :</h5></td>
                        <td><textarea name="dsc_articles" id="dsc_admin_add" cols="30" rows="5" placeholder="ajouter une d??scription"></textarea></td>
                    </tr>
                    
                    <tr>

                    <td><input type="submit" class="btn_send_article" value="ajouter"></td> <!-- this button submit all the content to the add page for add him at the bdd -->
                    
                    </tr>
                </table>

            </form>

        </div>
        <!-- end create article -->

    </main>
</body>
</html>