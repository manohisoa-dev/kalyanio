<?php
 $conn = mysqli_connect("localhost", "root", "", "kalintsika");

$sql = "SELECT * FROM nourritures ORDER BY cout DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kaly Anio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;1,500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left:15%">
  <a class="navbar-brand" style="font-size: 2em;font-weight:800; color: black" href="#">Kaly anio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="margin-left: 5% ; padding-left: 30px">
            
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="font-size: 1em; font-weight:800" ; href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Vos besoins
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: black; opacity:0.8">
            <h4 style= "padding-left:10px; background-color: #d6fb13">Inspirations</h4>
          <a class="dropdown-item" style =" color: #75b603" href="#">Suggestion du jour</a>
          <a class="dropdown-item" style =" color: #75b603" href="#">Simulateur de budget</a>
          <div class="dropdown-divider"></div>
            <h4 style="padding-left:10px; background-color: #419099; color: white">Organisation</h4>
          <a class="dropdown-item" style =" color: #00dadd" href="#">Sauvegardez vos menus</a>
          <a class="dropdown-item" style =" color: #00dadd" href="#">Plannifiez vos repas</a>
          <a class="dropdown-item" style =" color: #00dadd" href="#">Préparer un évènement</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="font-size: 1em; font-weight:800" ; href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Nos services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">A propos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Contact</a>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" style="font-size: 1em" href="#">Se connecter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style ="background-color: red; color: white" href="#">Créer un compte</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-sm-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
    <li data-target="#demo" data-slide-to="6"></li>
    <li data-target="#demo" data-slide-to="7"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/breakfast.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Petit déjeuner</h3>
        <p>pour bonne journée assurée!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/detox.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Détox</h3>
        <p>A vous de jouer !</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/salmon.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Déjeuner</h3>
        <p>Très bon et léger!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/cake.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Gâteau d'anniversaire</h3>
        <p>Offrez-lui(la) un petit geste de tendresse !</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/wine.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Quel vin choisir ?</h3>
        <p>Les conseils d'un Chef</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/strawberry.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Dessert</h3>
        <p>Un petit envie de délice ?</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/bowl.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Dessert</h3>
        <p>Pourquoi choisir ?</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/potato-soup.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Dîner</h3>
        <p>Pour un sommeil réparateur!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<section class="my-3">
    <div class="py-4">
        <h2 class="text-center" style="color:slategrey; font-weight:800; font-size: 3em">Idées - astuces - suggestions</h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <img src="images/eat.jpg" class="img-fluid abouting">
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <h2 class="display-5" style="color:#1d3752">Suggestion du jour</h2>
                <p class="py-3" style="text-align:justify">On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d'y rajouter de petits clins d'oeil, voire des phrases embarassantes).</p>
                <a href="about.php" class="btn btn-success">En savoir plus</a>
            </div>
        </div>
      
        <div class="py-4">
            
            <div class="col-lg-6 col-md-6 col-12">
                <h2 class="display-5" style="color:#1d3752">Simulateur de budget</h2>
                <p class="py-3" style="text-align:justify">On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d'y rajouter de petits clins d'oeil, voire des phrases embarassantes).</p>
                <a href="about.php" class="btn btn-success">En savoir plus</a>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <input type="range" min="0" max="1000" value="0" step="100" id="range_value"> 
              <center>Prix en Ariary:<span id="price_display">--</span></center>
                <div class="containers">
                  <div class="row">
                  <?php
                    while($row = mysqli_fetch_assoc($result)) {
                  ?>
                <div class="col-sm-3" style="border: 1px solid skyblue">
                    <p class="menu"style="background-color:skyblue; text-align:center; height:70px; margin:auto; padding-top:10px"><?php echo $row["libelle"] ?></p>
                    <p style="font-size: 0.8em; font-weigth: 200">Préparation : <?php echo $row["preparation_duree"] ?> </p>
                    <p style="font-size: 0.8em; font-weigth: 200">Cuisson: <?php echo $row["cuisson"] ?> </p>
                    <p style="font-size: 0.9em; font-weigth: 200">Prix : <?php echo $row["cout"] ?> Ariary</p>
                    <a href="about.php" class="btn btn-success" style="width:100%; height:30px; margin-bottom:10px">Voir la recette</a>
                </div>
                <?php
                  } 
                ?>
              </div>   <!--row ends-->
            </div>   <!--containers ends-->
          </div>     <!--container ends-->
          </div>
    </div>

</section>
              <script>
              $(document).ready(function(){     

                $("#range_value").change(function()
                {
                  var range = $("#range_value").val();
                $("#price_display").html(range);

              $.ajax
              ({
                url:"fetch.php",
                method:"POST",
                data:{priced:range},
                success:function(data)
                  {
                  $(".containers").html(data);
                  }
                });
              });
            })
        </script>
    
 
<section class="my-3">
    <div class="py-4">
        <h2 class="text-center" style="color:slategrey; font-weight:800; font-size: 3em">Planifier, organiser... </h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
            </div>
        </div>
    </div>
</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

mysqli_close($conn);

?>