<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="navbar">
  <a href="./index.php?content=home"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="./index.php?content=agenda"><i class="fa fa-fw fa-book"></i> Agenda</a>
  <a href="./index.php?content=info"><i class="fa fa-fw fa-info"></i> Info</a>
  <a href="./index.php?content=contact"><i class="fa fa-fw fa-map"></i> Contact</a>
  <a href="./index.php?content=loginform"><i class="fa fa-sign-in"></i> Inloggen</a>
  <a href="./index.php?content=registerform"><i class="fa fa-user-plus"></i> Registreren</a>

</div>

<?php


if (isset($_SESSION["iduser"])) {
  switch ($_SESSION["userrol"]) {
    case 'administrator':
      echo '<li class="nav-item">
          <a class="nav-link" href="./index.php?content=admin_home"><h5>AdminHome<h5><span class="sr-only">(current)</span></a>
        </li>';
      break;
    case 'customer':
      echo '<li class="nav-item">
          <a class="nav-link" href="./index.php?content=customer_home"><h5>Mijn Bestellingen<h5><span class="sr-only">(current)</span></a>
        </li>';
      break;
    default:
      header("Location: url=./index.php?content=logoutform");
      break;
  }
  echo '<li class="nav-item">
      <a class="nav-link" href="./index.php?content=logoutform"><h5>Uitloggen<h5></a>
    </li>';
} else {
  echo '<li class="nav-item">
        <a class="nav-link" href="./index.php?content=registerform"><h5>Registreer<h5></a>
      </li>';
  echo '<li class="nav-item">
        <a class="nav-link" href="./index.php?content=loginform"><h5>Inloggen<h5></a>
      </li>';
}

?>