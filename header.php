<header>

<!-- navigation bar -->

<nav>

    <ul>
        <li>
            <a href="index.php"><img src="./Pictures/logo jdm shop.png" style="width: 50px;" alt="logo page principal"></a>
        </li>

        <li>

                                                             <?php 
                                                             if(empty($_SESSION['prenom']))  // check if she have a name in the session
                                                             {
                                                                 ?>
                                                                 <a class="login_nav" href="login.php">connectez-vous</a> <!-- if she doesn't have a name they give him a link to log or register -->
                                                                 <?php
                                                             } else { ?>
                                                                <div class="user_nav"> <!-- if they found a name, he show him her name and a button to disconect him -->
                                                                 
                                                                    <h3 class="user_show">bonjour,<?= $_SESSION['prenom']; ?></h3> 
                                                                    <a class="logout_button" href="logout.php"><button>LOGOUT</button></a>

                                                                    <?php 
                                                             }
                                                                if(empty($_SESSION['role'])) // check if the user have a role admin
                                                                {
                                                                        //if the user don't have a admin role only the name and the logout button has been show

                                                                } elseif($_SESSION['role'] === 'admin')// if the user have a admin role they give him a button to have acces to the admin page 
                                                                { ?>
                                                                    <a class="admin_button" href="./admin.php">admin</a>
                                                        <?php } ?>
                                                                
                                                                </div>
                                                                 
        </li>

        

        <li>
            <?php if(!empty($_SESSION['id_user'])) { ?>
                <a class="panier_nav" href="./panier.php?id_relation_panier=<?= $_SESSION['id_user']; ?>" class="text_nav">
                <img src="./Pictures/cart" style="width:40%;"  alt="">
                <h3>Panier</h3></a>
           <?php } else { ?>
            <a class="panier_nav" href="./panier.php" class="text_nav"><img src="./Pictures/cart" style="width:40%;"  alt="">
                <h3>Panier</h3></a>
         <?php } ?>
            
            
        </li>

    </ul>

</nav>

<div class="theme">
    <ul class="theme_list">

        <li><a href="./boost.php">Améliorations</a></li>
        <li><a href="./ecu.php">électroniques</a></li>
        <li><a href="./fluide">Fluides</a></li>
        <li><a href="./merch.php">Merch</a></li>
        <li><a href="./wheel.php">Roue</a></li>

    </ul>
</div>

<!-- end navigation bar -->

</header>