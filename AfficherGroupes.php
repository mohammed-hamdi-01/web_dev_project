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
              <h1 class="display-4">Voici une liste détaillée des groupes </h1>
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
    
    include("./auth-php-mysql/connexion.php");
 
    $sel=$pdo->prepare("select * from groupe");
    
    $sel->execute(array());

    $tab=$sel->fetchAll();
    
 
     if(count($tab)>0){
      
  foreach ($tab as $ele) { 
       echo'<tr><td>'.$ele['nom_groupe'].'</td>';
       echo'<td>'.$ele['nombre_etudiant'].'</td>';
       echo'<td>'.$ele['email'].'</td></tr>';

      
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
             Groupe
         </th>
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
   
    include("./auth-php-mysql/connexion.php");
 
$sel_e=$pdo->prepare("select * from etudiant");
    
 $sel_e->execute(array());
    
 $tab_e=$sel_e->fetchAll();


if(count($tab_e)>0){
      
    foreach ($tab_e as $el) {
         echo'<tr><td>'.$el['classe'].'</td>'; 
         echo'<td>'.$el['cin'].'</td>';
         echo'<td>'.$el['nom'].'</td>';
         echo'<td>'.$el['prenom'].'</td>';
         echo'<td>'.$el['adresse'].'</td>';
         echo'<td>'.$el['email'].'</td></tr>';
  
        
      }
  }



  
   ?>

 </table>
 <br>
 </div>
</div>
</div>

</main>



<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>