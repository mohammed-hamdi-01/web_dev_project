<?php
include("connexion.php");    
$classe=$_GET["classe"];
echo $classe;
$req="delete from etudiant where classe like '$classe'";
$requ="delete from groupe where nom_groupe like '$classe'";
$reponse = $pdo->exec($req) or die("error");
$reponseu = $pdo->exec($requ) or die("error");
header("location:../afficherEtudiantsParClasse.php");
?>
