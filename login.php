<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <?php include 'style.php';?>
</head>

<body class="bg-secondary">
  <?php include 'nav_bar.php';?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card shadow-lg my-5">
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

                  <div class="text-center">
                    <button class="btn btn-primary btn-clock text-uppercase" type="submit">Sign in</button>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>

      </div>
  </div>
</body>
</html>
