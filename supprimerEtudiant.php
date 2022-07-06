
<?php 
include('auth-php-mysql/supprimerEtudAction.php');?>
<?php
require('auth-php-mysql/connexion.php');
$getAlletudiants = $pdo->query('SELECT * FROM etudiant ORDER BY cin DESC');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
    <title>Supprimer etudiant</title>
    </script>
    <style>
        .jumbotron {
  position: relative;
  overflow: hidden;
  background-color:black;
  background-image:url('Violet et Vert Typographie Citation Couverture Facebook (2).png');
  background-size:cover;
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
                 <strong>
              <h1 class="display-4">Supprimer étudiant(s) de votre choix</h1></strong>
              <strong><p>Pour supprimer les informations d'un etudiant vous pouvez cliquer sur supprimer ...  !</p></strong>
              </div>
            </div>
<div class="container">
<div class="row">
<div class="table-responsive"> 
 <table class="table table-striped table-hover">
     <!--Ligne Entete-->
     <tr>
         <th>
             CIN
         </th>
         <th>
             Nom
         </th>
         <th>
             Prénom
         </th>
         <th>
             Email
         </th>
         <th>
             Classe
         </th>
         <th>
             Suppression
         </th>
     </tr>
     <?php 
            while($etudiant = $getAlletudiants->fetch()){
                ?>
     <tr>
         <td>
         <?=$etudiant['cin']?>
         </td>
         <td>
         <?=$etudiant['nom']?>
         </td>
         <td>
         <?=$etudiant['prenom']?>
         </td>
         <td>
         <?=$etudiant['email']?>
         </td>
         <td>
         <?=$etudiant['classe']?>
         </td>
         <td>
             <button type="button" class="btn btn-success"><a style="Color:white;"href="auth-php-mysql/supprimerEtudAction.php?cin=<?=$etudiant['cin']?>">Supprimer</a></button>
         </td>
     </tr>
     <?php
            }
        ?>
 </table>
 <br>
 </div>
</div>
</div>
</main>
</body>
<br></br>
<?php include('includes/footer.php');?>
</div>
</html>
