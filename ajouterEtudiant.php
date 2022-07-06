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
              <h1 class="display-4">Ajouter un étudiant</h1>
              <p>Remplir le formulaire ci-dessous afin d'ajouter un étudiant!</p>
            </div>
          </div>
          <div ><h6 id="demo"></h6></div>
<div class="container">
    <form id="myForm" method="POST">
    <!--Nom-->
    <div class="form-group">
     <label for="nom">Nom:</label><br>
    <input type="text" id="nom" name="nom"  class="form-control" placeholder="Saisir le nom" required />
    </div>
    <!--Prénom-->
    <div class="form-group">
     <label for="prenom">Prénom:</label><br>
    <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Saisir le prenom" required/>
    </div>
    <!--CIN-->
    <div class="form-group">
    <label for="cin">CIN:</label>
    <input type="number" id="cin" name="cin" class="form-control" placeholder="Saisir CIN" required pattern="[0-9]{8}" title="8 chiffres"/>
    </div>
     <!--Password-->
     <div class="form-group">
     <label for="pwd">Mot de passe:</label>
    <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Saisir la mot de passe"  required pattern="[a-zA-Z0-9]{8,}" title="Au moins 8 lettres et nombres"/>
     </div>
     <!--ConfirmPassword-->
     <div class="form-group">
    <label for="cpwd">Confirmer Mot de passe:</label>
    <input type="password" id="cpwd" name="cpwd" class="form-control" placeholder="Resaisir la mot de passe"  required/>
  </div>
     <!--Email-->
     <div class="form-group">
     <label for="email">Email:</label>
     <input type="email" id="email" name="email" class="form-control" placeholder="Saisir l'Email" required/>
     </div>
    <!--Classe-->
    <div class="form-group">
     <label for="classe">Classe:</label>
   <input type="text" id="classe" name="classe" placeholder="Saisir la classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C"/>
  </div>
    <!--Adresse-->
    <div class="form-group">
     <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse" rows="10" cols="30"  placeholder="Saisir l'adresse" class="form-control" required/>
  <br></br>
  <div class=" d-flex align-items-center justify-content-center">
  <button type="submit" class="btn btn-danger " onclick="ajouter()">Ajouter Maintenant</button> 
  </div>
</form>
  </div>
<script>
    function ajouter()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/sco/auth-php-mysql/ajouter.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm");
        formdata=new FormData(form);

        xmlhttp.send(formdata);

        //Traiter Res

        xmlhttp.onreadystatechange=function()
            {   
                if(this.readyState==4 && this.status==200){
                // alert(this.responseText);
                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="L'ajout de l'étudiant a été bien effectué";
                        document.getElementById("demo").style.backgroundColor="green";
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML="L'étudiant est déjà inscrit, merci de vérifier le CIN";
                        document.getElementById("demo").style.backgroundColor="#fba";
                    }
                }
            } 
    }
    </script>
 <?php include('includes/footer.php');?>
</div>
</body>
</html>