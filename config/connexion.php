<?php
try {
		$access= new pdo("mysql:host=localhost; dbname=monoshop;charset=utf8", "root", "");
        if ($access) {
            echo "connexion reussie";
        }
        else {
            echo "connexion echouée";
		}
		$access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e)
{
	$e->getMessage();
    echo $e;
}

?>



