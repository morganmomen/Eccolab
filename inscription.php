<?php
// session_start();

include "config/commandes.php";

// if(isset($_SESSION['userxXJppk45hPGu']))
// {
//     if(!empty($_SESSION['userxXJppk45hPGu']))
//     {
//         header("Location: client/");
//     }
// }



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ecollab - Inscription</title>
    <link rel="stylesheet" href="style/signup.css">
</head>
<body>
<br>
<br>
<br>
<br>

<div class="login-box">
    <h2>Inscription</h2>
    <form method="post">
        <div class="user-box">
            <input type="nom" name="nom" required="">
            <label for="nom">Nom</label>
        </div>
        <div class="user-box">
            <input type="adresse" name="adresse" required="">
            <label for="adresse">Adresse</label>
        </div>
        <div class="user-box">
            <input type="email" name="email" required="">
            <label for="email">Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="motdepasse" required="">
            <label for="password">Password</label>
        </div>
        <div id="buttons">
            <a href="#">
                <input class="buttons" type="submit" name="envoyer" value="Envoyer">
            </a>
        </div>
    </form>

</div>
    
</body>
</html>

<?php

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']) AND !empty($_POST['nom']) AND !empty($_POST['adresse']))
    {
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $adresse = htmlspecialchars(strip_tags($_POST['adresse']));

        $user = ajouterUser($nom, $adresse, $email,hash('sha256',$motdepasse));

        if($user){
            $_SESSION['userxXJppk45hPGu'] = $user;
            header('Location: login.php');
        }else{
            echo "Compte non créer !";
        }
    }

}

?>