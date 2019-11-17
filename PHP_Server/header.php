<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="assets/header.css" rel="stylesheet">

</head>
<body>

<div class="d-flex" id="wrapper">
   
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><a href="index.php"><img src="assets/logo.png" alt=LogoCesi width=50% height=auto></div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Accueil</a>
        <a href="evenements.php" class="list-group-item list-group-item-action bg-light">Évènements</a>
        <a href="boutique.php" class="list-group-item list-group-item-action bg-light">Boutique</a>
        <a href="contact.php" class="list-group-item list-group-item-action bg-light">Contact</a>
      </div>
    </div>
    <!-- Header content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
        <div class="h1-responsive my-4" style><a href="index.php">BDE Cesi Lille</a></div>
        <?php
        if(isset($_SESSION['id']) AND $_SESSION['id'] != 0)
        {
          ?>
          <div class="content-item dropdown">
        <a class="btn dropdown-toggle" style="background-color: #6684BD; color: #F8F9FA; cursor: pointer" id="contentDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connecté en tant que <?php echo $_SESSION['Prenom']?></a>
        <div class="dropdown-menu" style="background-color: #6684BD; color: #F8F9FA" aria-labelledby="contentDropdown">
          <a class="dropdown-item" style="color: #F8F9FA" href="maj.php">Mettre à jour mon profil</a>
          <a class="dropdown-item" style="color: #F8F9FA" href="deconnexion.php">Se déconnecter</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" style="color: #F8F9FA" href="panier.php">Mon panier<i class="fas fa-shopping-cart"></i></a>
        </div>
      </div>
          <?php
        }
        else
        {
          ?>
          <a class="btn" href="connexion.php" style="background-color: #6684BD; color: #F8F9FA" role="button">Se connecter</a>
          <?php
        }
        ?>
      </nav>
     
      <div class="container-fluid">
        <!-- Page content -->


        <!-- Bootstrap core JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
