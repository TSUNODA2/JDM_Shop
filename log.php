<?php
session_start();
require_once './models/config.php';

// // verify if the user information enter exist on the bdd and she if the user have the role user they are send to the main page,
// and in the user have a admin role she are send to the admin page
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(!empty($email) && !empty($password))
    {
        $select = $bdd->prepare("SELECT id_user, prenom, email, password, role FROM user WHERE email = ?");
        $select->execute([$email]);

        $data = $select->fetch();

        if($data != false)
        {
            if(password_verify($password, $data['password']) === true) // check if the password are good 
            {
                // add al this information in the session o the user 
                $_SESSION["role"] = $data["role"];
                $_SESSION['email'] = $data["email"];
                $_SESSION['prenom'] = $data['prenom'];
                $_SESSION['id_user'] = $data['id_user'];

                if($data["role"] === "admin") // check if the user are admin
                {
                    header("location: admin.php"); // if the user are admin she gona be redirected to the admin page
                    
                }else if($data["role"] === "user") // check if the user are user
                {
                    header("location: index.php"); // if the user are user she gona be redirected to the main page
                }
            }else header('location: login.php?log_err=password_bad'); // if the password are bad a error text gona be show on the page 
            
        }else header('location: login.php?log_err=mail_bad');

    }else header('location: login.php?log_err=empty_log');
}

?>