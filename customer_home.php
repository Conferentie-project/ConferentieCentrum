<?php
$userrol = ['customer', 'administrator', 'root'];
include("./security.php");
var_dump($_SESSION);
?>



<?php
$iduser = $_SESSION['iduser'];

$orderidget = mysqli_query($conn, "SELECT `idorder` FROM `order` WHERE `iduser` = '$iduser'");
$orderidgetfetch = mysqli_fetch_array($orderidget);
$orderidimplode = implode($orderidgetfetch);
$orderidsub = $orderidimplode;
$orderid = substr($orderidsub, 0, 2);

$productget = mysqli_query($conn, "SELECT `idproduct` FROM `orderline` WHERE `idorder` = '$orderid'");
$productgetfetch = mysqli_fetch_array($productget);
$productimplode = implode($productgetfetch);
$productsub = $productimplode;
$productid = substr($productsub, 0, 1);

$productnameget = mysqli_query($conn, "SELECT `name` FROM `products` WHERE `idproduct` = '$productid'");
$productnamegetfetch = mysqli_fetch_array($productnameget);
$productnameimplode = implode($productnamegetfetch);
$productnamesub = $productnameimplode;
$product = substr($productnamesub, 0, 31);

$quantityget = mysqli_query($conn, "SELECT `quantity`  FROM `orderline` WHERE `idorder` = '$orderid'");
$quantitygetfetch = mysqli_fetch_array($quantityget);
$quantityimplode = implode($quantitygetfetch);
$quantitysub = $quantityimplode;
$quantity = substr($quantitysub, 0, 1);

$priceget = mysqli_query($conn, "SELECT `price` FROM `order` WHERE `idorder` = '$orderid'");
$pricegetfetch = mysqli_fetch_array($priceget);
$priceimplode = implode($pricegetfetch);
$pricesub = $priceimplode;
$price = substr($pricesub, 0, 6);

$statusget = mysqli_query($conn, "SELECT `status` FROM `order` WHERE `idorder` = '$orderid'");
$statusgetfetch = mysqli_fetch_array($statusget);
$statusimplode = implode($statusgetfetch);
$statussub = $statusimplode;
$status = substr($statussub, 0, 4);
?>

<h1>Mijn Bestellingen</h1>
<main class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p class="lead">
                <table class="table">
                    <tbody>
                        <td></td>
                        <div class="row">
                            <div class="col-sm">
                                <td>Order id </td>
                            </div>
                            <div class="col-sm">
                                <td>Product name</td>
                            </div>
                            <div class="col-sm">
                                <td>Aantal</td>
                            </div>
                            <div class="col-sm">
                                <td>Price</td>
                            </div>
                            <div class="col-sm">
                                <td>Status</td>
                            </div>

                        </div>

                        <tr color="white">
                        </tr>

                </table>
            </p>
            <p class="lead">
                <table class="table">
                    <tbody>
                        <tr color="black">

                            <td></td>

                            <div class="row">
                                <div class="col-sm">
                                    <td><?php echo $orderid ?></td>
                                </div>
                                <div class="col-sm">
                                    <td><?php echo $product ?></td>
                                </div>
                                <div class="col-5">
                                    <td><?php echo $quantity ?></td>
                                </div>
                                <div class="col-sm">
                                    <td><?php echo $price ?></td>
                                </div>
                                <div class="col-sm">
                                    <td><?php echo $status ?></td>
                                </div>
                            </div>
                        </tr>

                </table>
            </p>
        </div>
</main>