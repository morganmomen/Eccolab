<?php
session_start();

include "config/commandes.php";

if(isset($_SESSION['xRttpHo0greL39']))
{
    if(!empty($_SESSION['xRttpHo0greL39']))
    {
        header("Location: admin/afficher.php");
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login - Ecollab'</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
<br>
<br>
<br>
<br>

            <div class="login-box">
                <h2>Connexion</h2>
                <form method="post">
                    <div class="user-box">
                        <input type="email" name="email" required="">
                        <label for="email">Username</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="motdepasse" required="">
                        <label for="password">Password</label>
                    </div>
                    <div id="buttons">
                    <a href="#">
                        <input class="buttons" type="submit" name="envoyer" value="Envoyer">
                    </a>
                        <a class="buttons" href="inscription.php"> Inscription
                        </a>
                    </div>
                </form>

            </div>
    
</body>
</html>

<?php

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']))
    {
        $login = htmlspecialchars(strip_tags($_POST['email'])) ;
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));

        $admin = getAdmin($login, hash('sha256',$motdepasse));

        if($admin){
            $_SESSION['xRttpHo0greL39'] = $admin;
            header('Location: admin/afficher.php');
        }
        else{
            header('Location: reussi.php');
            $user = getUser($login, hash('sha256',$motdepasse));

            if($user){
                $_SESSION['xRttpHo0greL39'] = $user;
               // header('Location: reussi.php');
               header('Location: client/afficher.php');
            }
            else{
            header('Location: erreur.php');
            }
        }
    }

}

?>