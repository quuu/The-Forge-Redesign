<?php
include "controllers/auth_controller.php";
include "controllers/print_form_controller.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print Job Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'style.php'?>
    <?php include 'scripts.php'?>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-9 mx-auto">
          <div class="card shadow-lg my-5">
            <div class="card-body">
              <h1 class="card-title text-center">Print Job Form</h1>
              <form action="controllers/print_form_controller.php" method="post">

                <label for="machine" id="machinelabel">Machine Type:</label>
                <select name="machine" id="machine" required>
                  <?php generateMachineDropDown() ?>
                </select>

                <div id="plasticinfo">
                  <div class="form-group">
                    <label for="plastic" id="plasticlabel">Plastic Type:</label>
                    <select name="plastic" id="plastictype" required>
                      <?php generatePlasticsDropDown() ?>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="amount" id="amountlabel">Amount of plastic (g)</label>
                    <input type="text" class="form-control" id="plasticamount" name="amount" required/>
                    <small id="printprice" class="form-text text-muted ml-1"></small>
                  </div>

                  <div class="form-group">
                    <label for="brand" id="brandlabel">Plastic Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" required/>
                  </div>

                  <div class="form-group">
                    <label for="temp" id="templabel">Print temperature</label>
                    <input type="text" class="form-control" name="temp" id="temp" required/>
                  </div>

                  <div class="form-group">
                    <label for="color" id="colorlabel">Color of Plastic</label>
                    <input type="text" class="form-control" name="color" id="color" required/>
                  </div>

                  <div class="form-group">
                    <label for="time">Estimate time to completion (in minutes):</label>
                    <input type="number" class="form-control" name="time" min="1" max="10000" required/>
                  </div>
                </div>

                <div class="form-group">
                  <input type="checkbox" name="forclass" value="1"/>
                  <label for="forclass">This print is for a class</label>
                </div>

                <hr id='sectiondivider1'/>



                <div id="reprintpolicy">
                  <p class="text-center"><strong>Reprint Policy:</strong></p>
                  <p>Your total print is under 50g/7mL. If your print has failed and has consumed less than 50g/7mL of plastic you will not be charged
                  for up to two aditional reprint attempts.</p>
                  <p><strong>The volunteer present has final say. If you wish to appeal your claim, please email kronmm@rpi.edu</strong></p>


                  <div class="form-group">
                    <input type="checkbox" name="reprintpolicy" value="agree" required/>
                    <label for="reprintpolicy"> I agree to the reprint policy.</label>
                  </div>
                </div>

                <hr id='sectiondivider2'/>

                <div class="form-group">
                  <label for="initials" id="initialslabel">Initials</label>
                  <input type="text" class="form-control" name="initials" id="initials" required/>
                  <small id="initialssmall" class="form-text text-muted ml-1">By initialing here, you agree to pay the charge shown above.</small>
                </div>

                <div class="text-center">
                  <button class="btn btn-primary btn-clock text-uppercase" type="submit" name="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/print_form.js"></script>
</html>
