<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("auth-php-mysql/connexion.php");
      $sel=$pdo->prepare("select * from enseignant where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:index.php");
      }
      else
         $erreur="Mauvais E-Mail ou mot de passe!";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Hachem">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Connexion</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .img-holder{
        padding: 3rem;
               }
               @import url('https://fonts.googleapis.com/css?family=Quicksand');
header
{
    background: #f9fbfd;
}
body{
background:#f9fbfd;
font-family: 'Quicksand', sans-serif;

}
#signup{
padding-top: 50px;
}
#signup .card{
background-color:#dfdbe5;
border-radius:8px;
border:0;
box-shadow: 0 17px 50px 0 rgba(0, 0, 0, 0.19), 0 12px 15px 0 rgba(0, 0, 0, 0);
}
#signup .card .card-title{
padding: 2rem 1.2rem 0;
margin-bottom:0;
text-align:center;
}
#signup .card .card-title h2{
position:relative;
font-size:1.2rem;
letter-spacing:.5px;
font-weight:bold;
text-transform:uppercase;
margin-bottom:20px;
}
#signup .card .card-title h2:after{
position:absolute;
content:'';
bottom:-10px;
left:50%;
transform:translateX(-50%);
height:2px;
width:50px;
background:#21253d;
}
.img-holder{
padding: 3rem;
}

img.logo{
display:block;
margin-left:auto;
margin-right:auto;
margin-bottom:20px;
height:80px;

}
.form{
background:#fff;
padding:20px 30px;
}
form label{
font-weight: bold;
}
form .form-control{
border-radius:1px;
border-left:none;
height:50px;
}
form .input-group>.input-group-prepend>.input-group-text {
border-top-right-radius: 0;
border-bottom-right-radius: 0;
border-radius: 1px;
background: #dfdbe5;
/*     border-right: none; */
}
.btn-secondary{
background-color: #eb1313;
}
</style>
</head>
<body>
    <section id="signup" >
        <div class="container "> 
           <div class="row">
             <div class="col-md-10 mx-auto">
               <div class="card">
                 <div class="row mr-0 ml-0 d-flex h-100">
                 <div class="col-md-6 img-holder justify-content-center align-self-center">
                   <img src="ENICAR (3).svg" class="img-fluid"  />
                 </div>
                 <div class="col-md-6 form">
                   <div class="card-title">
                     <img src="Sans titre (15).png" class="img-fluid logo">
                   <h6> <strong> Veuillez vous connecter!</strong></h6>
                 </div>
                 <div class="card-body">
                   <form method="POST"id="myForm" class="form-signin">
                    
                        
                            <div class="alert alert-danger" id="erreur" role="alert">
                            <?php if(isset($erreur)) {?>
                    <?php echo $erreur ?>
                    <?php } ?>       
                   </div>
                   
                   <div class="form-group">
                        <label>E-mail</label>
                        <div class="input-group mb-3">
                         <div class="input-group-prepend">
                           <span class="input-group-text" id="email-addon"><i class="fa fa-envelope-o"aria-hidden="true"style="width:20px;height:16px;padding-top:0px;"></i></span>
                         </div>
                         <input  type="email" id="inputEmail" name="login" class="form-control" placeholder="Email address" required autofocus>
                       </div>
                      </div>
                     <div class="form-group">
                       <label>Mot de passe</label>
                       <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="password-addon"><i class="fa fa-key"aria-hidden="true"style="width:15px;height:16px;padding-top:0px;"></i></span>
                          </div>
                          <input  type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
                        </div>
                     </div>
                     
                     <div class="form-group text-center">
                       <button class="btn btn-danger"  type="submit"  name="valider">Se Connecter</button>
                     </div>
                     <br><br>
                       <a href="inscription.php" style="color:black; font-weight:bold;"><p style= "margin-left:15%;" >Je n'ai pas de compte, je m'inscris !...</p></a>
                   </form>
                 </div>
                 </div>
                   </div>
               </div>
             </div>
           </div>
        </div>
<!---footer--->
<?php include('includes/footer.php');?>
</div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>