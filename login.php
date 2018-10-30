<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>

<body>
  <?php include 'nav_bar.php';?>
  <?php include 'style.php';?>
  <div class="container">
    <h1>Sign in</h1>
    <div class="form">
      <form action="controllers/login_controller.php" method="post">
        <label for="rcsID">RCS ID:</label>
        <br/>
        <input type="text" name="rcsID" placeholder="Enter RCS ID" required/><br/>
        <label for="password">Password:</label>
        <br/>
        <input type="password" name="password" placeholder="Enter Password" required/><br/><br/>
        <input type="submit" name='submit' value="Log in">
      </form>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
