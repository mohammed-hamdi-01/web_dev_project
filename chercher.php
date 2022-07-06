<?php

session_start();
if($_SESSION["autoriser"]!="oui"){
   header("location:login.php");
   exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Afficher Etudiants</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">

</head>
<body>

<?php include('includes/navbar.php'); ?>  
      
      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Chercher les groupes et les etudiants</h1>
              <p>Voici Votre Groupe</p>
            </div>
          </div>

<div class="container">
<div class="row">

    <br><br><br>
<div class="table-responsive"> 
 <table class="table table-striped table-hover">
     <!--Ligne Entete-->
     <tr>
         <th>
             Nom du Groupe
         </th>
         <th>
             Nombre des Etudiants
         </th>
         <th>
             Email
         </th>
         
     </tr>
  <?php 
  if (isset($_REQUEST['recherche']) && isset($_REQUEST['valider'])){
   
    $recherche=$_REQUEST['recherche'];
    include("auth-php-mysql/connexion.php");
 
    $sel=$pdo->prepare("select * from groupe where nom_groupe LIKE '$recherche' ");
    
    $sel->execute(array());

    $tab=$sel->fetchAll();
    
 
     if(count($tab)>0){
      
  foreach ($tab as $ele) { 
       echo'<tr><td>'.$ele['nom_groupe'].'</td>';
       echo'<td>'.$ele['nombre_etudiant'].'</td>';
       echo'<td>'.$ele['email'].'</td></tr>';

      
    }
}
} 

  
   ?>

 </table>
 <br>
 </div>
</div>
</div>

<div class="container">
<div class="row">

    <br><br><br>
<div class="table-responsive"> 
 <table class="table table-striped table-hover">
     <!--Ligne Entete-->
     <tr>
         <th>
             Cin
         </th>
         <th>
             Nom
         </th>
         <th>
             Prenom
         </th>
         <th>
             Adresse
         </th>
         <th>
             Email
         </th>

         
     </tr>
  <?php 
  if (isset($_REQUEST['recherche']) && isset($_REQUEST['valider'])){
   
    $recherche=$_REQUEST['recherche'];
    include("auth-php-mysql/connexion.php");
 
    $sel_e=$pdo->prepare("select * from etudiant where Classe LIKE '$recherche' ");
    
 $sel_e->execute(array());
    
 $tab_e=$sel_e->fetchAll();

if(count($tab_e)>0){
      
    foreach ($tab_e as $el) { 
         echo'<tr><td>'.$el['cin'].'</td>';
         echo'<td>'.$el['nom'].'</td>';
         echo'<td>'.$el['prenom'].'</td>';
         echo'<td>'.$el['adresse'].'</td>';
         echo'<td>'.$el['email'].'</td></tr>';
  
        
      }
  }
} 
   ?>

 </table>
 <br>
 </div>
</div>
</div>

</main>

<?php include('includes/footer.php');?>
</body>
</html>