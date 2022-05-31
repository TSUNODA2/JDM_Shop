<header>

<!-- navigation bar -->

<nav>

    <ul>
        <li>
            <a href="index.php"><img src="./Pictures/logo jdm shop.png" style="width: 50px;" alt="logo page principal"></a>
        </li>

        <li>

            <a href="register.php" class="text_nav">
                                                             <?php 
                                                             if(empty($_SESSION['prenom']))
                                                             {
                                                                 ?>
                                                                 <a class="login_nav" href="login.php">connectez-vous</a>
                                                                 <?php
                                                             } else 
                                                             { ?>
                                                                <div class="user_nav">
                                                                 
                                                                    <h3 class="user_show">bonjour,<?= $_SESSION['prenom']; ?></h3> 
                                                                    <a class="logout_button" href="logout.php"><button>LOGOUT</button></a>

                                                                    <?php 
        
                                                                if(empty($_SESSION['role']))
                                                                {

                                                                } elseif($_SESSION['role'] === 'admin')
                                                                { ?>
                                                                    <a class="admin_button" href="./admin.php">admin</a>
                                                        <?php } ?>
                                                                
                                                                </div>
                                                                 <?php
                                                             }
                                                                ?>
            </a>

            


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