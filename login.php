
<?php 
session_start();
include_once 'bdd.php';
include_once 'functions.php';

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $password = $_POST['password'];

    if(!isset($nom) || empty($nom)){
        $erreurs[]="Veuillez renseigner votre nom";
    }

    if(!isset($password) || empty($password)){
        $erreurs[]="Veuillez renseigner votre mot de passe";
    }

    if(verifier_combinaison_enseignant_password($nom,$password) == 0){
        $erreurs[]="Nom ou mot de passe incorrect";
    }else{
        $_SESSION['nom_enseignant'] = $nom;
        $_SESSION['session_active'] = true;
        header("Location:espace_enseignant.php?nom_enseignant=$nom");
    }

}


include_once('header.php'); 
?>
    <!-- LOGIN -->
  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-9 mx-auto">
          <?php
            if (isset($erreurs)) {
                foreach ($erreurs as $erreur) {
                    ?>
                    <div class="erreur"><?php echo $erreur; ?></div>
                    <?php
                }
            }
            if (isset($success)) {
                ?>
                    <div class="success"><?php echo $success; ?></div>
                <?php
            }
         ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Authentification</h4>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label for="email">Nom</label>
                  <input type="text" class="form-control" name="nom">
                </div>
                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Se connecter">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include_once('footer.php'); ?>