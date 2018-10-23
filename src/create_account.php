
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Create Account</title>
  </head>

  <body>
    <h1>Create Account</h1>
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
    </div>
    <script src="resources/jquery-3.3.1.min.js"></script>
  </body>
</html>