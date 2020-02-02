
<br>
<div class="jumbotron">
	<h1 class="display-4">Deze Polarwatches zijn in hoge kwaliteit en speciaal voor u bestelt</h1>
	<hr class="my-4">

	<div class="container">
  <div class="row">
    <div class="col-sm">
      
    </div>
    <div class="col-sm">
	<body>
		<?php
		$result = mysqli_query($conn, "SELECT * FROM `products`");
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<div class='product_wrapper'>
							<form method='post' action=''>
							<input type='hidden' name='code' value=" . $row['code'] . " />
							<div class='name'>" . $row['name'] . "</div>
							<div class='description'>" . $row['description'] . "</div>
							<div class='price'>€" . $row['price'] . "</div>
							<button type='submit' class='buy'>Voeg toe aan winkelwagen</button>
							</form>
							</div>";
		}
		?>
		<br>
		<body>
    </div>
    <div class="col-sm">
     
    </div>
  </div>
</div>
	
	
</div>

<br>

