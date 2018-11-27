
<!doctype html>
<html lang="en">
  <head>
    <?php include 'style.php'?>
    <meta charset="utf-8">
    <title>Create Account</title>
  </head>

  <body class="bg-secondary">
    <?php include 'nav_bar.php'?>
    <!-- <h1>Create Account</h1>
    <div class="create">
      <form action="controllers/ca_controller.php" method="post">
        <label for="first">First Name:</label>
        <br/>
        <input type="text" name="first" placeholder="John" required/><br/>
        <label for="last">Last Name:</label><br/>
        <input type="text" name="last" placeholder="Doe" required/><br/>
        <label for="email">Email:</label><br/>
        <input type="email" name="email" placeholder="doej@rpi.edu" required/><br/>
        <label for="rin">RIN:</label><br/>
        <input type="number" min="660000000" max="999999999" name="rin" placeholder="660000000" required/><br/>
        <label for="rcsID">RCS ID:</label><br/>
        <input type="text" name="rcsID" placeholder="Use your RCS ID" required/><br/>
        <label for="password">Password:</label><br/>
        <input type="password" name="password" placeholder="Enter password" required/><br/>
        <br/>
        <input type="submit" name='Submit' value="Create">
      </form>
    </div> -->



    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card shadow-lg my-5">
            <div class="card-body">
              <h1 class="card-title text-center">Create Account</h1>
              <form action="controllers/ca_controller.php" method="post">

                <div class="form-group">
                  <input type="text" class="form-control" name="first" placeholder="First Name" required/>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="last" placeholder="Last Name" required/>
                </div>

                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="RPI E-mail" required/>
                </div>

                <div class="form-group">
                  <input type="number" class="form-control" min="660000000" max="999999999" name="rin" placeholder="RIN" required/>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="rcsID" placeholder="RCS ID" required/>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required/>
                </div>

                  <div class="form-group">
                      <input type="text" class="form-control" name="gender" placeholder="Gender (Optional)"/>
                  </div>

                  <div class="form-group">
                      <input type="text" class="form-control" name="major" placeholder="Major" required/>
                  </div>

                  <div class="checkbox">
                      <label><input type="checkbox" value="true" required>I agree to pay the $10 membership Fee</label>
                  </div>

                  <div class="text-center">
                  <button class="btn btn-primary btn-clock text-uppercase" type="submit" name="submit">Create</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
