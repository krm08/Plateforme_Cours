<?php 

include_once('functions.php');   
include_once('header.php'); 
$enseignants = retourner_enseignants();
if (isset($_GET['nom_enseignant'])) {
  $nom_enseignant = $_GET['nom_enseignant'];
  $cours = retourner_cours($nom_enseignant);
  

}


?>     

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="card secondary-color">
        <ul class="list-group mb-5">
          <li class="active list-group-item">Module - Enseignant</li>
          <?php 
            foreach ($enseignants as $enseignant) {
              ?>
                <li class="list-group-item list-group-item-dark"><a href="index.php?nom_enseignant=<?= $enseignant['nom']; ?>&module=<?= $enseignant['module']; ?>&email=<?= $enseignant['email']; ?>"><?php echo $enseignant['module']." - ".$enseignant['nom']; ?></a></li>
              <?php
            }
           ?>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card border-secondary mb-3">
          <div class="card-header">Cours <?php if (isset($_GET['module'])) {
            echo ' '.$_GET['module']. '<div id="b" style = "float:right"> ';
            echo ' Contact : '.$_GET['email'];
          }
           ?></div></div>
          <div class="card-body">
            <ul class="list-group mb-5">
              <?php 
                if (isset($cours)) {
                  foreach ($cours as $cour) {
                    ?>

                    <li class="list-group-item"><a href="<?php echo $cour['nom']; ?>">
                      <?php echo $cour['nom'] = explode('/', $cour['nom'])[1]; ?>
                    </a></li>

                  <?php }
                }

               ?>

            </ul>
          </div>
      </div>
    </div>
  </div>
</div>


<?php include_once('footer.php'); ?>