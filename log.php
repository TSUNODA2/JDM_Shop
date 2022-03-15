<?php
session_start();
require_once './models/config.php';

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(!empty($email) && !empty($password))
    {
        $select = $bdd->prepare("SELECT email, password, role FROM register WHERE email = ?");
        $select->execute([$email]);

        $data = $select->fetch();

        if($data != false)
        {
            if(password_verify($password, $data['password']) === true)
            {
                $_SESSION["role"] = $data["role"];

                if($data["role"] === "admin")
                {
                    header("location: admin.php");
                }else if($data["role"] === "user")
                {
                    header("location: user.php");
                }
            }else header('location: login.php?log_err=password_bad');
            
        }else header('location: login.php?log_err=mail_bad');

    }else header('location: login.php?log_err=empty_log');
}

?>