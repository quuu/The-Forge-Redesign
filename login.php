<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <?php include 'style.php';?>
</head>

<body>
  <?php include 'nav_bar.php';?>

  <div class="container">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card sign_in_card my-5">
          <div class="card-body">
          <h1 class="card-title text-center">Sign In</h1>
            <form action="controllers/login_controller.php" method="post">
              <div class="form-group">
                  <label for="rcsID">RCS ID:</label>
                  <input type="text" class="form-control" name="rcsID" placeholder="Enter RCS ID" required autofocus />
              </div>

                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter Password" required />
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" />
                  <label class ="custom-control-label" for="customCheck1">Remember Password</label>
                </div>

                <div class="text-center">
                  <button class="btn  btn-primary btn-clock text-uppercase" type="submit">Sign in</button>
                </div>
              </form>
              </div>
          </div>
        </div>
      </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
