<?php
// echo session_id();
$userrol = ['administrator', 'customer', 'root'];
include("./security.php");
include("./functions.php");
?>

<?php
$status = "";
if (isset($_POST['action']) && $_POST['action'] == "remove") {
  if (!empty($_SESSION["shopping_cart"])) {
    foreach ($_SESSION["shopping_cart"] as $key => $value) {
      if ($_POST["code"] == $key) {
        unset($_SESSION["shopping_cart"][$key]);
        $status = "<div class='box' style='color:red;'>
      Het product is verwijderd van uw winkelwagen</div>";
      }
      if (empty($_SESSION["shopping_cart"]))
        unset($_SESSION["shopping_cart"]);
    }
  }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
  foreach ($_SESSION["shopping_cart"] as &$value) {
    if ($value['code'] === $_POST["code"]) {
      $value['quantity'] = $_POST["quantity"];
      break; // Stop the loop after we've found the product
    }
  }
}
?>
<body>
  <div class="cart">
    <?php
    if (isset($_SESSION["shopping_cart"])) {
      $total_price = 0;
      ?>

      <div class="jumbotron jumbotron-fluid">
        <div class="container">
        
          <p class="lead">
            <table class="table">
              <tbody>
                <tr color="white">
                  <td>PRODUCTNAAM</td>
                  <td>AANTAL</td>
                  <td>PRIJS PER</td>
                  <td>PRIJS TOTAAL</td>
                </tr>
          </p>
        </div>
      </div>
      <?php
      foreach ($_SESSION["shopping_cart"] as $product) {
        ?>
        <tr>
          <!-- <td>
            <img src='<?php echo $product["image"]; ?>' width="50" height="40" />
          </td> -->
          <td><?php echo $product["name"]; ?><br />
            <form method='post' action=''>
              <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
              <input type='hidden' name='action' value="remove" />
              <button type='submit' class='remove'>Remove Item</button>
            </form>
          </td>
          <td>
            <form method='post'>
              <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
              <input type='hidden' name='action' value="change" />
              <select name='quantity' class='quantity' onChange="this.form.submit()">
                <option <?php if ($product["quantity"] == 1) echo "selected"; ?> value="1">1</option>
                <option <?php if ($product["quantity"] == 2) echo "selected"; ?> value="2">2</option>
                <option <?php if ($product["quantity"] == 3) echo "selected"; ?> value="3">3</option>
                <option <?php if ($product["quantity"] == 4) echo "selected"; ?> value="4">4</option>
                <option <?php if ($product["quantity"] == 5) echo "selected"; ?> value="5">5</option>
              </select>
            </form>
          </td>
          <td><?php echo "€" . $product["price"]; ?></td>
          <td><?php echo "€" . $product["price"] * $product["quantity"]; ?></td>
        </tr>
        <?php
        $total_price += ($product["price"] * $product["quantity"]);
      }
      $_SESSION['total_price'] = $total_price;
      $_SESSION['code'] = $product["code"];
      $_SESSION['quantity'] = $product["quantity"];

      ?>
      <tr>
        <td colspan="5" allign="right">
          <strong>TOTAL: <?php echo "€" . $total_price; ?></strong>
        </td>
      </tr>
      </tbody>
      <form method='post' action='./index.php?content=checkout'>
        <tr>
          <td colspan="5" allign="right">
            <button type='submit' class='pay'>Betalen</button>
        </tr>
      </form>
      </table>
    <?php
    } else {
      echo "<h3>Your cart is empty!</h3>";
    }
    ?>
  </div>



  <div style="clear:both;"></div>

  <div class="message_box" style="margin:10px 0px;">
    <?php echo $status; ?>
  </div>
</body>