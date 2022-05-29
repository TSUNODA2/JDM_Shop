<?php
session_start();
require_once './models/config.php';

// verify if the user information enter exist on the bdd and she if the user have the role user they are send to the main page and in the user have a admin role she are send to the admin page
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
            if(password_verify($password, $data['password']) === true)
            {
                $_SESSION["role"] = $data["role"];
                $_SESSION['email'] = $data["email"];
                $_SESSION['prenom'] = $data['prenom'];
                $_SESSION['id_user'] = $data['id_user'];

                if($data["role"] === "admin")
                {
                    header("location: admin.php");
                    
                }else if($data["role"] === "user")
                {
                    header("location: index.php");
                }
            }else header('location: login.php?log_err=password_bad');
            
        }else header('location: login.php?log_err=mail_bad');

    }else header('location: login.php?log_err=empty_log');
}

?>