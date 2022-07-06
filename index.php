<?php
require('./auth-php-mysql/connexion.php');
$getAllgroups = $pdo->query('SELECT * FROM groupe');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Walid SAAD">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SCO-ENICAR</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    </script>
    <style>
        .jumbotron {
  position: relative;
  overflow: hidden;
  background-image:url('Violet et Vert Typographie Citation Couverture Facebook (2).png');
  background-size:cover;
  font-size: 17px;
    cursor: pointer;
    width:100% 0%;
}
.jumbotron .container {
  z-index: 2;
  position: relative;
}

    </style>
  </head>
  <body>
    
<?php include('includes/navbar.php'); ?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container text-white">
      <br>
      <br><br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
     <strong> <h6 class="display-3"><?php echo $bienvenue?></h6></strong>
      
      <p><a class="btn btn-success btn-lg"  href="AfficherGroupes.php" role="button">Voir mes Groupes &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
    <?php 
            while($groupe = $getAllgroups->fetch()){
                ?>
      <div class="col-md-4">
        <h2> <?=$groupe['nom_groupe']?></h2>
        <h4><small><?=$groupe['nombre_etudiant']?> Etudiants</small></h4>
        <h6><?=$groupe['email']?></h6>
        <p><?=$groupe['Description']?></p>
        <p><a class="btn btn-secondary" href="info1.php" role="button">Voir le Groupe &raquo;</a></p>
      </div>
      <?php } ?>
    </div>
  </div> <!-- /container -->
</main>
<?php include('includes/footer.php');?>
</body>
</html>
