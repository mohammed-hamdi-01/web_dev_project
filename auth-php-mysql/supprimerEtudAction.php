<?php
require('connexion.php');
if(isset($_GET['cin']) AND !empty($_GET['cin'])){
    $CINN = $_GET['cin'];
    $Etudiant = $pdo->prepare('SELECT nom FROM etudiant WHERE cin = ?');
    $Etudiant->execute(array($CINN));

    if($Etudiant->rowCount() > 0){
            $EtudiantInfos =  $Etudiant->fetch();
            $SupprimerEtudiant = $pdo->prepare('DELETE FROM etudiant WHERE cin = ?');
            $SupprimerEtudiant->execute(array($CINN));
            header('Location: ../chercherEtudiant.php');

    }else{
        echo "Aucun etudiant trouvé avec ce  cin";
    }


}else{
    echo "Aucun etudiant n'a été trouvé";
}
?>