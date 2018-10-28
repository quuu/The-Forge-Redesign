<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
  </head>

  <body>
    <h1>Admin Panel</h1>
    <div class="admin">
      <form action="controllers/auth_controller.php" method="post">
        <a href="./create_account.php">Create Account</a>
        <a href="./edit_user.php">Edit User</a>
      </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/admin.js"></script>
  </body>
</html>