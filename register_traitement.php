  <?php 

session_start();

require_once './models/config.php';

// check if the user alredy exist
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_check']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_check = htmlspecialchars($_POST['password_check']);

    $check = $bdd->prepare('SELECT email, password FROM user WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    // verify if all the inout are not empty
if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['password'])) {

    if($row == 0)
    {   
        // verify if the case have less 255 caracters
        if(strlen($nom) <= 255)
        {
            if(strlen($prenom) <= 255)
            {
                if(strlen($email) <= 255)
                {
                    // check if the email are valid
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if($password == $password_check)
                        {
                            // hash the password
                            $password =  password_hash($password, PASSWORD_DEFAULT);

                            $role = "user";

                            // create the user on the bdd ans set him a default role "user"
                            $insert = $bdd->prepare('INSERT INTO user(nom, prenom, email, password, role) VALUES(:nom, :prenom, :email, :password, :role)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email,
                                'password' => $password,
                                'role' => $role,
                            ));
                            header('Location: register.php?reg_err=succes');

                        }else header('Location: register.php?reg_err=password');

                    }else header('Location: register.php?reg_err=email');

                }else header('Location: register.php?reg_err=email_length');

            }else header('Location: register.php?reg_err=prenom_length');

        }else header('Location: register.php?reg_err=nom_length');

    }else header('Location: register.php?reg_err=already');

    }else header('location: register.php?reg_err=empty');
    
}else header('location : register.php?reg_err=not');
?>