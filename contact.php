<!DOCTYPE html>
<html class="bg-secondary">

<head>
  <?php include 'style.php';?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="bg-secondary">
  <div class="bg-secondary pt-3 p-2">
      <?php include 'nav_bar.php';?>

      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="text-center pt-3 display-4 text-primary">Contact Us</h1>
                  <p class="text-center">Looking to get in touch?</p>

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

                      <html class="row">
                          <h2 class="text-left">Contact our President</h2>

                          <form class="form-horizontal" role="form" method="post" action="success.php">
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Name</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
                                      <?php echo "<p class='text-danger'>$errName</p>";?>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="email" class="col-sm-2 control-label">Email</label>
                                  <div class="col-sm-10">
                                      <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
                                      <?php echo "<p class='text-danger'>$errEmail</p>";?>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="subject" class="col-sm-2 control-label">Subject</label>
                                  <div class="col-sm-10">
                                      <input type="email" class="form-control" id="subject" name="subject" value="">
                                      <?php echo "<p class='text-danger'>$errSubject</p>";?>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="message" class="col-sm-2 control-label">Message</label>
                                  <div class="col-sm-10">
                                      <textarea class="form-control" rows="4" name="message"></textarea>
                                      <?php echo "<p class='text-danger'>$errMessage</p>";?>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-10 col-sm-offset-2">
                                      <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-10 col-sm-offset-2">
                                      <?php echo $result; ?>
                                  </div>
                              </div>
                          </form>



                      </div>

                  </div>

              </div>
          </div>
      </div>


  </div>
  <?php include 'footer.php';?>
</body>

</html>
