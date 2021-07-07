<?php
phpinfo();
include_once('bdd.php'); 

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$query = $cnx->query("SELECT nom FROM fichiers WHERE id='$id'");
	$result = $query->fetch();
	$rows = $query->rowCount();

	var_dump($result,$rows);

	if ($result) {
		header("Content-Description : File Transfer");
		header("Content-Type : application/octet-stream");
		header("Content-Disposition : attachment; filename = ".$result['nom']);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header("Content-length : ".filesize($result['nom']));
		flush();
		readfile($result['nom']);
		exit;
	}else {
		echo "Ce fichier n'éxiste pas";
	}


}


 ?>