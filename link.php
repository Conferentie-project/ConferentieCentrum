<img src="./img/banner1.jpg" width="1110px" height="400" href="./index.php?content=home" class="responsive">

<nav class="navbar navbar-expand-lg navbar-light " id="nav">
  <a class="navbar-brand" href="./index.php">
    <img src="./img/logo.png" width="150" height="75" alt="logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php?content=home">
          <h5>Home</h5> <span class="sr-only">(Current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./index.php?content=heren">
          <h5> Polarwatches</h5>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./index.php?content=contact">
          <h5>Over Ons</h5>
        </a>
      </li>


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