<?php
//fonction qui inscrit l'utilisateur dans la base de donnée
function inscrire_enseignant($nom,$module,$email,$password){
	include 'bdd.php';
	$requete = $cnx->prepare("INSERT INTO enseignants(nom,module,email,password) VALUES(:nom,:module,:email,:password)");
	$requete->execute(array(
		'nom' => $nom,
		'module' => $module,
		'email' => $email,
		'password'=>$password));
	return 1;
}

//fonction qui vérifie la combinaison pseudo/password
function verifier_combinaison_enseignant_password($nom,$password)
{
	include('bdd.php');
	$nom = htmlspecialchars($_POST['nom']);
	$password = htmlspecialchars($_POST['password']);

	$query= $cnx->query("SELECT nom,password FROM enseignants WHERE nom='$nom' AND password='$password'");

	$rows = $query->rowCount();
	return $rows;
}

function retourner_enseignants() {
	include 'bdd.php';
	$requete = $cnx->prepare("SELECT module,nom,email FROM enseignants");
	$requete->execute();

	return $requete->fetchAll();
}

function retourner_cours($nom_enseignant) {
	include 'bdd.php';
	$requete = $cnx->prepare("SELECT id,nom,nom_enseignant FROM fichiers WHERE nom_enseignant='$nom_enseignant'");
	$requete->execute();

	return $requete->fetchAll();
}

?>