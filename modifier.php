<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
  if(isset($_REQUEST['classe']) && isset($_REQUEST['emailn']) && isset($_REQUEST['nbr'])&& isset($_REQUEST['classen'])){
    $classe_modif=$_REQUEST['classe'];
    $email=$_REQUEST['emailn'];
    $nombret=$_REQUEST['nbr'];
    $classe=$_REQUEST['classen'];
  
    include("./auth-php-mysql/connexion.php");
 
    $sel=$pdo->prepare("update groupe SET email='$email',nombre_etudiant='$nombret',nom_groupe='$classe' WHERE nom_groupe like '$classe_modif'");
    $sel_e=$pdo->prepare("update etudiant SET classe='$classe' WHERE classe like '$classe_modif'");
    $sel->execute();
    $sel_e->execute();
    $erreur="groupe a été modifié";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etudiants Par CLasse</title>
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
<?php include('./includes/navbar.php'); ?>
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
              <h1 class="display-4">Modifier un groupe</h1>
              <p>Remplir le formulaire ci-dessous afin de modifier un groupe!</p>
            </div>
          </div>
<div class="container">
<form method="GET" action="">
<div class="form-group">
<div class="form-group">
     <label for="classe">groupe a modifier:</label><br>
     <input type="text" id="classe" name="classe" class="form-control">
</div> 
<div class="form-group">
     <label for="classe">Nouveau nom:</label><br>
     <input type="text" id="classen" name="classen" class="form-control">
</div> 
<div class="form-group">
     <label for="classe">Nouveau nombre d'etudiants:</label><br>
     <input type="text" id="nbr" name="nbr" class="form-control">
</div> 
<div class="form-group">
     <label for="classe">Nouveau Email:</label><br>
     <input type="text" id="emailn" name="emailn" class="form-control">
</div> 
<button type="submit" class="btn btn-primary btn-block">modifier</button>
</form>
</div>  
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>


