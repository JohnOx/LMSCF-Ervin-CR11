<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption</title>
    <title>Big Library</title>
    <!-- GOOGLE FONTS  -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- BOOTSTRAP  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="#">Pet Adoption</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Animal groups
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="small_animals.php">Small Animals</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="large_animals.php">Large Animals</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="exotic_animals.php">Exotic Animals</a>
        </div>
      </li>
      <?php if (isset($_SESSION["admin"]) || isset($_SESSION["superadmin"])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin</a>
      </li>
      <?php } ?>
      <?php if (isset($_SESSION["superadmin"])) { ?>
        <li class="nav-item">
         <a class="nav-link" href="super_admin.php">Super Admin</a>
       </li>
      <?php } ?>
    </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
    </form>
  </div>
</nav>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/img1.jpg" class="d-block w-100" alt="..." width="100%" height="600px" style="object-fit:cover">
    </div>
    <div class="carousel-item">
      <img src="img/img2.jpg" class="d-block w-100" alt="..." width="100%" height="600px" style="object-fit:cover">
    </div>
    <div class="carousel-item">
      <img src="img/img3.jpg" class="d-block w-100" alt="..." width="100%" height="600px" style="object-fit:cover">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
