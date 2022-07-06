<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$semaine=$_REQUEST['semaine'];
$groupe=$_REQUEST['groupe'];
$module=$_REQUEST['module'];
$date=$_REQUEST['date'];
$justification=$_REQUEST['justification'];
$nom=$_REQUEST['IDE'];
include("connexion.php");
            
            
         $tab = array('INFO3-A', 'INFO3-B','INFO2-A','INFO2-B', 'INFO2-C','INFO2-D','INFO2-E','INFO1-A','INFO1-E','INFO1-B','INFO1-C','INFO1-D');                           
         $sel=$pdo->prepare("select date from absence where date=? limit 1");
         $sel->execute(array($date));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="NOT OK";
         else{
            $req="insert into absence values ('$semaine','$groupe','$module','$date','$justification','$nom')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
        }  
         echo $erreur;
}

?>