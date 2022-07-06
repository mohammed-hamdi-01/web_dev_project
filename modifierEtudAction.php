<?php
require('auth-php-mysql/connexion.php');
if(isset($_GET['cin']) AND !empty($_GET['cin'])){
    $CINN = $_GET['cin'];
    $checkIfQuestionExists = $pdo->prepare('SELECT * FROM etudiant WHERE cin = ?');
    $checkIfQuestionExists->execute(array($CINN));

    if($checkIfQuestionExists->rowCount() > 0){
        $etudiantInfos = $checkIfQuestionExists->fetch();
               $nom =  $etudiantInfos['nom'];
                $prenom =  $etudiantInfos['prenom'];
                   $adresse =  $etudiantInfos['adresse'];  
                     $email =  $etudiantInfos['email'];
                       $classe =  $etudiantInfos['classe'];    

    } if(($checkIfQuestionExists->rowCount() == 0)){
        $errorMsg = "Aucun etudiant trouvé avec cette cin ... !";
    }

}if((!isset($_GET['cin']) AND !empty($_GET['cin']))){
    $errorMsg = "Aucun etudiant trouvé...";
}
if(isset($_POST['validate'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['classe'])AND !empty($_POST['email'])AND !empty($_POST['adresse'])){
        $Nouveau_nom = htmlspecialchars($_POST['nom']);
        $Nouveau_prenom = htmlspecialchars($_POST['prenom']);
        $Nouveau_classe = htmlspecialchars($_POST['classe']);
        $Nouveau_email = htmlspecialchars($_POST['email']);
        $Nouveau_adresse = htmlspecialchars($_POST['adresse']);      
        $editQuestionOnWebsite = $pdo->prepare('UPDATE etudiant SET nom = ?, prenom = ?, email  = ?,adresse=?,classe=? WHERE cin = ?');
        $editQuestionOnWebsite->execute(array( $Nouveau_nom , $Nouveau_prenom,$Nouveau_email, $Nouveau_adresse,$Nouveau_classe, $CINN));
        header('Location: modifierEtudiant.php');
    }else{
        $errorMsg = "Completez tous les champs svp ..";
    }
}
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
    <title>Document</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Modifier étudiant(s) maintenant </h1>
              
            </div>
          </div>

          <div class="container">
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
        <?php 
            if(isset($nom)){ 
                ?>
                <form method="POST">
                <style>
                            .mb-3 label
                            {
                                color: #B4886B;
                 font-weight: bold;
                 text-align:center;
                     width: 150px;
                     float: center;
                            }
                        </style>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" >Nouveau Nom:</label>
                        <input type="text" class="form-control" name="nom" value="<?= $nom; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nouveau Prénom:</label>
                        <textarea class="form-control" name="prenom"><?= $prenom; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nouveau EMAIL:</label>
                        <textarea type="text" class="form-control" name="email"><?= $email; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nouveau Classe:</label>
                        <textarea type="text" class="form-control" name="classe"><?= $classe; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nouvelle Adresse:</label>
                        <textarea type="text" class="form-control" name="adresse"><?= $adresse; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-block btn-warning text-white" name="validate">Enregistrer les modifications Maintenant ..</button>
                </form>
                <?php
            }
        ?>
    </div>
</main>
</body>
<br></br>
<?php include('includes/footer.php');?>
</div>
</html>