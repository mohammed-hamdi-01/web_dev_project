<?php
$selected = isset($_GET['classe']) ? $_GET['classe'] : "";
$selectedValue = 'selected="selected"';
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
  background-image:url('Violet et Vert Typographie Citation Couverture Facebook (2).png');
  background-size:cover;
  font-size: 17px;
    cursor: pointer;
    width:100% 0%;
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
              <h1 class="display-4">Afficher les étudiants par groupe</h1>
              <p>choisir un groupe ci-dessous afin d'afficher les étudiants par groupe!</p>
            </div>
          </div>

<div class="container">
<!--
<input list="classe">
<datalist id="classe" name="classe">
    <option value="1-INFOA">1-INFOA</option>
    <option value="1-INFOB">1-INFOB</option>
    <option value="1-INFOC">1-INFOC</option>
    <option value="1-INFOD">1-INFOD</option>
    <option value="1-INFOE">1-INFOE</option>
</datalist>
-->
<form id="myForm" method="GET" action="">
<div class="form-group">
<label for="classe">Choisir une classe:</label><br>
        <select id="classe" name="classe" class="custom-select custom-select-sm custom-select-lg">
          <option value="selectionner Groupe" <?php if ($selected == "selectionner Groupe") echo $selectedValue ?>>selectionner Groupe</option>
          <option value="INFO1-A" <?php if ($selected == "INFO1-A") echo $selectedValue ?>>1-INFOA</option>
          <option value="INFO1-B" <?php if ($selected == "INFO1-B") echo $selectedValue ?>>1-INFOB</option>
          <option value="INFO1-C" <?php if ($selected == "INFO1-C") echo $selectedValue ?>>1-INFOC</option>
          <option value="INFO1-D" <?php if ($selected == "INFO1-D") echo $selectedValue ?>>1-INFOD</option>
          <option value="INFO1-E" <?php if ($selected == "INFO1-E") echo $selectedValue ?>>1-INFOE</option>
          <option value="INFO2-A" <?php if ($selected == "INFO2-A") echo $selectedValue ?>>2-INFOA</option>
          <option value="INFO2-B" <?php if ($selected == "INFO2-B") echo $selectedValue ?>>2-INFOB</option>
          <option value="INFO2-C" <?php if ($selected == "INFO2-C") echo $selectedValue ?>>2-INFOC</option>
          <option value="INFO2-D" <?php if ($selected == "INFO2-D") echo $selectedValue ?>>2-INFOD</option>
          <option value="INFO2-E" <?php if ($selected == "INFO2-E") echo $selectedValue ?>>2-INFOE</option>
          <option value="INFO3-A" <?php if ($selected == "INFO3-A") echo $selectedValue ?>>3-INFOA</option>
          <option value="INFO3-B" <?php if ($selected == "INFO3-B") echo $selectedValue ?>>3-INFOB</option>
          <option value="INFO3-C" <?php if ($selected == "INFO3-C") echo $selectedValue ?>>3-INFOC</option>
          <option value="INFO3-D" <?php if ($selected == "INFO3-D") echo $selectedValue ?>>3-INFOD</option>
          <option value="INFO3-E" <?php if ($selected == "INFO3-E") echo $selectedValue ?>>3-INFOE</option>
        </select>
</div>
</form>
</div> 
<div class="container">
<div class="row">
<div class="table-responsive"> 
 <table id="demo" class="table table-striped table-hover">
</table>
 <br>
 </div>
 <button type="submit" onclick="refresh()" class="btn btn-primary btn-block active">Actualiser</button>
</div>
</div>
<script>
        function refresh() {
          var xmlhttp = new XMLHttpRequest();
          var url = "http://localhost/mini-projet-info1/auth-php-mysql/afficher.php";
          const select = document.getElementById('classe');
          console.log(select.selectedIndex);
          //Envoie de la requete
          xmlhttp.open("GET", url, true);

          xmlhttp.send();


          //Traiter la reponse
          xmlhttp.onreadystatechange = function() { //alert(this.readyState+" "+this.status);
            if (this.readyState == 4 && this.status == 200) {

              myFunction(this.responseText);
              // alert(this.responseText);
              console.log(this.responseText);
            }
          }


          //Parse la reponse JSON
          function myFunction(response) {
            var obj = JSON.parse(response);
            //alert(obj.success);
            if (obj.success == 1) {

              var arr = obj.etudiants;

              var i;
              var out = "<table  border=1 >";
              for (i = 0; i < arr.length; i++) {
                if (arr[i].classe == select.options[select.selectedIndex].value) {
                  out += "<tr><td>" +
                    arr[i].cin +
                    "</td><td>" +
                    arr[i].nom +
                    "</td><td>" +
                    arr[i].prenom +
                    "</td><td>" +
                    arr[i].adresse +
                    "</td><td>" +
                    arr[i].email +
                    "</td></tr>";
                }
              }
              out += "</table>";
              document.getElementById("demo").innerHTML = out;
            } else document.getElementById("demo").innerHTML = "Aucune Inscriptions!";


          }
        }
      </script>
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>