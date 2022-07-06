<?php
require('auth-php-mysql/connexion.php');
$getAlletudiants = $pdo->query('SELECT * FROM etudiant ORDER BY cin DESC');
if(isset($_GET['search']) AND !empty($_GET['search'])){
    $usersSearch = $_GET['search'];
    $getAlletudiants = $pdo->query('SELECT * FROM  etudiant  WHERE (nom  LIKE "%'.$usersSearch.'%")  ORDER BY cin DESC ' );
    $getAlletudiant = $pdo->query('SELECT * FROM  etudiant  WHERE (nom  LIKE "%'.$usersSearch.'%")  ORDER BY cin DESC ' );
    $etudiants = $getAlletudiant->fetch();
    if(empty($etudiants))
    {
        $error_msg="Pas d'etudiant(s) avec ce nom , Verifier le nom d'etudiant  SVP! ... ";
    }
}?>
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
    <title>Document</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Chercher étudiants par leurs nom</h1>
              <form  method="GET">

              <div class="form-group">
                  
            <input class="form-control " name="search" type="text" placeholder="                                                                                                      Saisir un nom d'etudiant" aria-label="Chercher un groupe">
            <br>
            <button class="btn btn-success btn-block my-2 my-sm-0" type="submit" >Chercher Etudiant</button>      
                  </div>
                  
          </form>
          
            </div>
          </div>
          

<div class="container">
<?php if(isset($error_msg)) {?>
                            <div class="alert alert-danger" role="alert">
                    <div id="erreur">
                    <div class="erreur"><?php echo $error_msg ?></div>
                                </div>
                   </div>
                   <?php } ?>
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