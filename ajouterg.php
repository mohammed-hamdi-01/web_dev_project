<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$nom_groupe=$_REQUEST['nomgroupe'];
$nombr_etu=$_REQUEST['nombret'];
$email_groupe=$_REQUEST['emailg'];
$Description=$_REQUEST['Description'];
include("./auth-php-mysql/connexion.php");
         $sel=$pdo->prepare("select * from groupe where nom_groupe=? limit 1");
         $sel->execute(array($nom_groupe));
         $tab=$sel->fetchAll();
         if(count($tab)>0){
            header("location:AjouterGroupe.php");
            // groupeEtudiant existe déja
         }else{
            echo($Description);
            $req="insert into groupe (nom_groupe,nombre_etudiant,email,Description) values ('$nom_groupe','$nombr_etu','$email_groupe','$Description')";
            $reponse = $pdo->exec($req) or die("error");
            header("location:AjouterEtudiant.php");
      }}
?>