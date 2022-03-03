<?php 
  session_start();

  require_once './models/config.php';

  if(!isset($_SESSION['nom'])) {
      header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hello !</title>
</head>
<body>
    <h1>bonjour <?php echo $_SESSION['nom']; ?></h1>
    <a href="deconnexion.php">deconnexion</a>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est commodi eveniet, dolorum, qui nihil, consequuntur neque reiciendis voluptates nam tempore ipsa iste magnam enim? Rem saepe est earum voluptates eligendi.</p>
</body>
</html>