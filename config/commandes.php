<?php

function ajouterUser($nom, $adresse, $email, $motdepasse)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO user (nom, adresse , email, motdepasse) VALUES (?, ?, ?, ?)");

    $req->execute(array($nom, $adresse, $email, $motdepasse));

    return true;

    $req->closeCursor();
  }
}


function modifier($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE produits_depot SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
}

function afficherUnProduit($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits_depot WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}

  function ajouter($image, $nom, $prix, $desc)
  {
    if(require("connexion.php"))
    {
      $req = $access->prepare("INSERT INTO produits_depot (image, nom, prix, description,id_user,economie_elect,economie_co2,economie_h2o,type_produit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $req->execute(array($image, $nom, $prix, $desc, 77, 0, 0, 0, "Test"));

      $req->closeCursor();
    }
  }

function afficher()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits_depot ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}

function supprimer($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("DELETE FROM produits_depot WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
}

function getAdmin($email, $password){
  
  if(require("connexion.php")){

    $req = $access->prepare("SELECT * FROM admin WHERE id=77");

    $req->execute();

    if($req->rowCount() == 1){

      $data = $req->fetchAll(PDO::FETCH_OBJ);

      foreach($data as $i){
        $mail = $i->email;
        $mdp = $i->motdepasse;
      }

      if($mail == $email AND $mdp == $password)
      {
        return $data;
      }
      else{
          return false;
      }

    }

  }

}
function getUser($email, $password){

  if(require("connexion.php")){

    $req = $access->prepare("SELECT email,motdepasse FROM user ");

    $req->execute();


    if($req->rowCount() == 1){
      
      $data = $req->fetchAll(PDO::FETCH_OBJ);

      foreach($data as $i){
        $mail = $i->email;
        $mdp = $i->motdepasse;
      }

      if($mail == $email AND $mdp == $password)
      {
        return $data;
      }
      else{
          return false;
      }

    }

  }

}

?>