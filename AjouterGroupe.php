<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SCO-ENICAR Ajouter Etudiant</title>
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
              <h1 class="display-4">Ajouter un groupe</h1>
              <p>remplir le formulaire ci-dessous afin d'ajouter un groupe!</p>
            </div>
          </div>


            <div class="container">
                <form id="myform" method="GET" action="ajouterg.php">

                
                    <!--annee-->
                    <div class="form-group">
                        <label for="nomgroupe">Nom du Groupe:</label><br>
                        <input type="text" id="nomgroupe" name="nomgroupe" class="form-control" required autofocus>
                    </div>
                    <!--filiere-->
                    <div class="form-group">
                        <label for="nombret">Nombre des Etudiants:</label><br>
                        <input type="text" id="nombret" name="nombret" class="form-control" required>
                    </div>
                    <!--Groupe-->
                    <div class="form-group">
                        <label for="emailg">Email du Groupe:</label><br>
                        <input type="text" id="emailg" name="emailg" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Description">Description du Groupe:</label><br>
                        <input type="text" id="Description" name="Description" class="form-control" required>
                    </div>
                   
                    
                    <!--Bouton Ajouter-->
                    <button type="submit" class="btn btn-primary btn-block">Ajouter</button>


                </form>
            </div>
        </main>

        <?php include('includes/footer.php');?>

        <script src="./assets/dist/js/inscrire.js"></script>
    </body>

</html>

