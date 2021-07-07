<?php 
include_once 'bdd.php';
include_once 'functions.php';

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $module = $_POST['module'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    if(!isset($nom) || empty($nom)){
        $erreurs[]="Veuillez renseigner votre nom";
    }

    if(!isset($module) || empty($module)){
        $erreurs[]="Veuillez renseigner votre module";
    }

    if(!isset($password) || empty($password)){
        $erreurs[]="Veuillez renseigner votre mot de passe";
    }

    if(!isset($rpassword) || empty($rpassword)){
        $erreurs[]="Veuillez répéter votre mot de passe";
    }

    if(!isset($email) || empty($email)){
        $erreurs[]="Veuillez renseigner votre email";
    }
    if ($password != $rpassword) {
        $erreurs[]="Vos 2 mots de passe ne sont pas égaux";
    }

    if (empty($erreurs)) {
        inscrire_enseignant($nom,$module,$email,$password);
        $success = "Bravo ! Vous vous êtes inscrits";
    }

}
?>
<?php include_once('header.php'); ?>
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
              <h4>Inscription</h4>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label for="nom">Nom de l'enseignant</label>
                  <input type="text" class="form-control" name="nom">
                </div>
                <div class="form-group">
                  <label for="module">Module enseigné</label>
                  <input type="text" class="form-control" name="module">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                  <label for="password">Répétez le mot de passe</label>
                  <input type="password" class="form-control" name="rpassword">
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="S'inscrire">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include_once('footer.php'); ?>