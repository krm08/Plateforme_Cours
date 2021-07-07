<?php 
session_start();
include_once('header.php'); 
include_once('bdd.php');

$extensions = array('.pdf','.docx','.pptx');
?>

<div id = "infos">
<?php
if(isset($_POST['submit'])){
	
	$fichier = $_FILES['file']['name'];
	$tailleMaximale = 2097152;
	$taille = filesize($_FILES['file']['tmp_name']);
	$extension = strrchr($fichier,'.');
	$nomEnseignant = $_SESSION['nom_enseignant'];
	
			if(!in_array($extension, $extensions)){
				echo "Erreur : Le format du fichier n'est pas supporté.";
			}
			elseif($taille > $tailleMaximale){
				echo "Erreur : Le fichier est trop volumineux.";
			}
			elseif(move_uploaded_file($_FILES['file']['tmp_name'],'cours/'.$fichier)){
			$req = $cnx->query("INSERT INTO fichiers (nom, nom_enseignant) VALUES ('cours/{$fichier}','{$nomEnseignant}')");
				echo 'Le fichier '.$fichier. ' a été enregistré avec succès.';
			}
		}  ?>
</div>
<?php
if (isset($_SESSION['session_active'])) {
	?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center mt-3">Espace enseignant <i class="fas fa-chalkboard-teacher"></i></h2>
			</div>
		</div>
		<div class="row d-flex align-items-center">
			<div class="col-md-9 col-sm-12">
				<h4 class="my-4">
					Bienvenue <?php if (isset($_SESSION['nom_enseignant'])) {
						echo $_SESSION['nom_enseignant'];
					} else {
						echo ' Professeur';
					} ?>
				</h4>
			</div>
			<h6>Formats de fichiers supportés : <?php foreach($extensions as $ext){ echo ' '.$ext.' ';} ?></h6>
			<div class="col-md-3 col sm-12 d-flex justify-content-end">
				<a href="logout.php" class="btn btn-danger">Déconnexion</a>
			</div>
		</div>
		<form method="post" enctype="multipart/form-data">
    <input type="file" name="file"><br><br>
	<h6 id = "info"> </h6>
    <input class="btn btn-primary my-3" type="submit" value="Upload" name="submit">
</form>
	</div>

	<?php

} else {
	echo "<div class='container'>
				<div class='alert alert-danger' role='alert'>
	  				Vous devez d'abord vous connecter !
			</div></div>";
	
}

 ?>

<?php include_once('footer.php'); ?>

<script> 
	infosElt = document.getElementById("infos");
	document.getElementById("info").appendChild(infosElt);
</script>