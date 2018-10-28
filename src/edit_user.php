<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit User</title>
  </head>

  <body>
    <h1>Edit User</h1>
    <div class="create">
      <form id="get_info">
        <label for="lookup">RIN For Lookup</label><br/>
        <input type="text" id="lookup" name="rin" placeholder="660000000" required/><br/>
        <input type="submit" name='Submit' value="Lookup">
      </form>
      <br/>


      <form action="controllers/edit_controller.php" method="post">
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
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/edit_user.js"></script>
  </body>
</html>