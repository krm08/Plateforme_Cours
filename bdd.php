<?php 

/* Connexion à la base de donnée */
try {
	$cnx = new PDO("mysql:host=localhost;dbname=projet_redac;charset=utf8","root","");
	$cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Erreur : ".$e->getMessage();
}

 ?>