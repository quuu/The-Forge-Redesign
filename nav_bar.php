<?php include_once 'style.php';?>
<?php include_once 'controllers/functions.php';?>
<?php include_once 'scripts.php';?>
<nav class="navbar navbar-expand-md bg-secondary navbar-light">
<div class="container">
  <a class="navbar-brand" href="#">
    <img src="logo/forgelogo revis3.png" width="65" class="d-inline-block align-top" alt="" height="50"> </a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto w-100">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="equipment.php">Equipment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hours.php">Hours of Operation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gallery.php">Gallery
          <br> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="news.php">News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us
                <br> </a>
      </li>
    </ul>

      <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle" style="font-size:36px">
                  <?php
                        $name = getName();
                        if($name != 404){
                            echo $name;
                        }
                  ?>
              </i>
          </button>
          <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuLink\">
          <?php
            if(isset($_COOKIE['FORGE-SESSION'])){
                    echo "<a class=\"dropdown-item\" href=\"login.php\">Login </a>";
                    echo "<a class=\"dropdown-item\" href=\"myforge.php\">My Forge</a>";
                    echo "<a class=\"dropdown-item\" href=\"#\">Logout</a>";
            }else{
                    echo "<a class=\"dropdown-item\" href=\"login.php\">Login </a>";
            }
          ?>
        </div>
      </div>
  </div>
</div>
</nav>
