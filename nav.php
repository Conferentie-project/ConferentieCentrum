<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="navbar">
  <a href="./index.php?content=home"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="./index.php?content=agenda"><i class="fa fa-fw fa-book"></i> Agenda</a>
  <a href="./index.php?content=info"><i class="fa fa-fw fa-info"></i> Info</a>
  <a href="./index.php?content=contact"><i class="fa fa-fw fa-map"></i> Contact</a>
  <a href="./index.php?content=checkout"><i class="fas fa-file-invoice-dollar"></i>Bestelling</a>
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
                <a class="nav-link" href="./index.php?content=customer_home"><i class="fas fa-chalkboard-teacher"></i> Mijn Bestellingen </a>
              </li>';
      break;
    default:
      header("Location: url=./index.php?content=logoutform");
      break;
  }
  echo '<li class="nav-item">
            <a class="nav-link" href="./index.php?content=logoutform"><i class="fas fa-sign-out-alt"></i> Uitloggen</a>
          </li>';
} else {
  echo '<li class="nav-item">
              <a class="nav-link" href="./index.php?content=registerform"><i class="fa fa-user-plus"></i> Registreren</a>
            </li>';
  echo '<li class="nav-item">
              <a class="nav-link" href="./index.php?content=loginform"><i class="fa fa-sign-in"></i> Inloggen</a>
            </li>';
}
?>

</div>

