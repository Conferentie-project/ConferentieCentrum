<!-- <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Checkout pagina</h1>
        <hr>
        <p class="lead">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Productnaam</th>
                        <th scope="col">Aantal</th>
                        <th scope="col">Prijs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Watermanagement Ticket</td> 
                        <td>2</td>
                        <td>€103,30,-</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Lunch</td>
                        <td>1</td>
                        <td>€10,-</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Diner</td>
                        <td>2</td>
                        <td>€15,-</td>
            
                    </tr>
                </tbody>
            </table>

            <a href="./index.php?content=home" class="btn btn-primary">Betalen</a>
        </p>
    </div>
</div> -->

<?php
$userrol = ['administrator', 'customer', 'root'];
include("./functions.php");
?>

<?php

$iduser = $_SESSION['iduser'];
$price = $_SESSION['total_price'];
$idproduct = $_SESSION['code'];
$quantity = $_SESSION['quantity'];



$sql = "INSERT INTO `order` (`idorder`,
                            `iduser`, 
                            `date`, 
                            `price`, 
                            `status`) 
                    VALUES  (NULL,
                            '$iduser',
                             NOW(),
                            '$price',
                             'open')";



if ($conn->multi_query($sql) === TRUE) {
  echo "Uw bestelling is geplaatst. Om uw Bestellingen te bekijken ga naar de 'Mijn Bestellingen pagina'";
} else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

$sql2 = 'SELECT `idorder` FROM `order` WHERE `idorder` GROUP BY date DESC LIMIT 1';

$result = mysqli_query($conn, $sql2);
$idorder2 = mysqli_fetch_array($result);
$idorder3 = implode($idorder2);
$idorder = substr($idorder3, 0, 2);

$sql1 = "INSERT INTO `orderline` 
                            (`idorderline`,
                             `idorder`, 
                             `idproduct`, 
                             `quantity`, 
                             `price`) 
                      VALUES ( NULL,
                              '$idorder',
                              '$idproduct',
                              '$quantity',
                              '$price')";


if ($conn->multi_query($sql1) === TRUE) {
  echo "";
} else {
  echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
}

?>