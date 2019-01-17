<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'style.php';?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to the Forge</title>
  </head>
  <body class="text-center">
    <div class="text-center bg-primary w-100 h-100" style="background-image: url('homePagePhotos/cover.jpg');background-size:cover;background-position:center center;">
      <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <header class="masthead mb-auto">
          <div class="inner">
            <a href="index.php"><img src="logo/forgelogo revis3.png" width="50" class="masthead-brand"/></a>
            <nav class="nav nav-masthead justify-content-center roboto" id="mainNav">
              <a class="nav-link" href="index.php">Home</a>
              <a class="nav-link" href="equipment.php">Equipment</a>
              <a class="nav-link" href="hours.php">Hours</a>
              <a class="nav-link" href="gallery.php">Gallery</a>
              <a class="nav-link" href="news.php">News</a>
              <a class="nav-link" href="contact.php">Contact</a>
              <?php
              if(isset($_COOKIE['FORGE-SESSION'])){
                echo "<a class=\"nav-link\" href=\"myforge.php\">My Forge</a>";
                echo "<a class=\"nav-link\" href=\"controllers/logout_controller.php\">Logout</a>";
              }else{
                echo "<a class=\"nav-link\" href=\"login.php\">Login </a>";

              }
              ?>


            </nav>
          </div>
        </header>
        <main role="main" class="inner cover">
          <div class="container py-2">
            <div class="row">
              <div class="col-sm-12">
                <h1 class="cover-heading">THE FORGE</h1>
                <hr class="cover-hr">
                <p class="roboto pb-5 text-justify cover-description">The Forge intends to provide the environment to create a collaborative design community on campus, promoting communication, critical thinking, and STEAM (Science, Technology, Engineering, Arts, Mathematics) ideals. Through this, the Forge will provide easy and everyday access to rapid prototyping tools, communication and collaboration tools, and a casual area to work. The Forge will hold workshops, design competitions, and speakers involved in the Making Movement.</p>
              </div>
            </div>
          </div>
        </main>
    </div>

    <div class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 p-4">
          <div class="row">
            <div class="col-sm-3 text-center">
              <i class="d-block  fa fa-5x fa-globe"></i>
            </div>
            <div class="col-sm-9">
              <h3 class="">Find us Physically</h3>
              <p class="">We are located in the CII 2037. &nbsp;Take the elevators down in the Low building to the second floor. &nbsp;If the sign is flipped to OPEN, come on in. &nbsp;The open hours are linked below</p>
              <a class="btn btn-primary" href="hours.php">Hours of Operation
                <br> </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 p-4">
          <div class="row">
            <div class="col-sm-3 text-center">
              <i class="d-block  fa fa-5x fa-mouse-pointer"></i>
            </div>
            <div class="col-sm-9">
              <h3 class="">Find us Virtually</h3>
              <ul class="list-group">
                <a href="https://www.facebook.com/RPIMakerSpace/" target="_blank" class="virtual_link">
                  <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info virtual_list_item">Facebook
                    <i class="fa fa-fw fa-facebook"></i>
                  </li>
                </a>
                <a href="https://www.instagram.com/rpi.forge/" target="_blank" class="virtual_link">
                  <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info virtual_list_item">Instagram
                    <i class="fa fa-fw fa-instagram"></i>
                  </li>
                </a>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <?php include 'footer.php';?>
  </div>
  </body>
</html>
