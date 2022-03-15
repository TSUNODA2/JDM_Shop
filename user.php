<?php 
session_start();

if(!isset($_SESSION["role"]))
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
    <title>page utilisateur</title>
</head>
<body>
    <h1>bienvenue bg</h1>
</body>
</html>