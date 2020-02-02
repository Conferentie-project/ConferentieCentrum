<?php
include('connectdb.php');
session_start();
$status = "";
if (isset($_POST['code']) && $_POST['code'] != "") {
    $code = $_POST['code'];
    $result = mysqli_query(
        $conn,
        "SELECT * FROM `products` WHERE `code`='$code'"
    );
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $description = $row['description'];
    $code = $row['code'];
    $price = $row['price'];

    $cartArray = array(
        $code => array(
            'name' => $name,
            'description' => $description,
            'code' => $code,
            'price' => $price,
            'quantity' => 1,
        )
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Product is added to your cart!</div>";
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($code, $array_keys)) {
        } else {
            $_SESSION["shopping_cart"] = array_merge(
                $_SESSION["shopping_cart"],
                $cartArray
            );
            $status = "<div class='box'>Product is added to your cart!</div>";
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" role="style">
    <title>Het Conferentie Centrum</title>
    <link rel="icon" type="image/png" href="/img/favicon.png" />

    <title>Hello, world!</title>
</head>

<body>
    <main>
        <div class="row">
            <div class="col-12">
                <?php include("./banner.php"); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php include("./nav.php"); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php include("./navigation.php"); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php include("./footer.php"); ?>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>