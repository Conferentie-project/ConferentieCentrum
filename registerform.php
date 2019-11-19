<div class="jumbotron">
  <h1 class="display-4">Registreer voor een account</h1>
  <hr class="my-4">
  <div >
    <div class="row">
      <div class="col-sm-4">
        
      </div>
      <div class="col-sm-6">
        <div class="row">
          <div class="col-6">
            <form action="./index.php?content=register" method="post">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="firstname">Voornaam</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Voornaam">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lastname">Achternaam</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Achternaam">
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Jantje5@gmail.com">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="Phone">Telefoonnummer</label>
                      <input type="number" pattern="[0-9]{6}-[0-9]-[0-9]-[0-9]-[0-9]-[0-9]-[0-9]-[0-9]-[0-9]" name="phone" class="form-control" id="Phone" placeholder="0612345678">
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="Address">Adres</label>
                    <input type="text" class="form-control" name="adress" required id="address" placeholder="Stationstraat 10">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="city">Stad</label>
                      <input type="text" class="form-control" name="city" id="city" placeholder="Amsterdam">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="postalcode">Postcode</label>
                      <input type="text" class="form-control" name="postalcode" id="postalcode" placeholder="1234LO">
                    </div>
                  </div>
                  <div class="form-group">
                  </div>
                  <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
          </div>
        </div>
      </div>
      <div class="col-sm-4">

      </div>
    </div>
  </div>