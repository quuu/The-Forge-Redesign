<!doctype html>
<html lang="en">
  <head>
    <?php include 'style.php'?>
    <meta charset="utf-8">
    <title>Edit User</title>
  </head>

  <body>
    <!-- <h1>Edit User</h1>
    <div class="create">
      <form id="get_info">
        <label for="lookup">RIN For Lookup</label><br/>
        <input type="text" id="lookup" name="rin" placeholder="660000000" required/><br/>
        <input type="submit" name='Submit' value="Lookup">
      </form>
      <br/> -->

      <!-- <form action="controllers/edit_controller.php" method="post">
        <label for="first">First Name:</label>
        <br/>
        <input type="text" id="first" name="first" placeholder="John" required/><br/>
        <label for="last">Last Name:</label><br/>
        <input type="text" id="last" name="last" placeholder="Doe" required/><br/>
        <label for="email">Email:</label><br/>
        <input type="email" id="email" name="email" placeholder="doej@rpi.edu" required/><br/>
        <label for="rin">RIN:</label><br/>
        <input type="number" id="rin" min="660000000" max="999999999" name="rin" placeholder="660000000" required/><br/>
        <label for="rcsID">RCS ID:</label><br/>
        <input type="text" id="rcsID" name="rcsID" placeholder="Use your RCS ID" required/><br/>
        <br/>
        <input type="submit" name='Submit' value="Update">
      </form>
    </div> -->

      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card shadow-lg mt-5">
              <div class="card-body">
                <h1 class="card-title text-center">User Lookup</h1>
                <form id="get_info">
                  <div class="form-group">
                    <input type="text" id="lookup" class="form-control" name="rin" placeholder="RIN" required/>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-primary btn-clock text-uppercase" type="submit" name="Submit">Lookup</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card shadow-lg my-3">
              <div class="card-body">
                <h1 class="card-title text-center">Update Information</h1>
                <form action="controllers/edit_controller.php" method="post">

                  <div class="form-group">
                    <input type="text" id="first" class="form-control" name="first" placeholder="First Name" required/>
                  </div>

                  <div class="form-group">
                    <input type="text" id="last" class="form-control" name="last" placeholder="Last Name" required/>
                  </div>

                  <div class="form-group">
                    <input type="text" id="email" class="form-control" name="email" placeholder="RPI E-mail" required/>
                  </div>

                  <div class="form-group">
                    <input type="number" id="rin" min="660000000" max="999999999" class="form-control" name="email" placeholder="RIN" required/>
                  </div>

                  <div class="form-group">
                    <input type="text" id="rcsID" class="form-control" name="rcsID" placeholder="RCS ID" required/>
                  </div>

                  <div class="text-center">
                    <button class="btn btn-primary btn-clock text-uppercase" type="submit" name="submit">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/edit_user.js"></script>
  </body>
</html>
