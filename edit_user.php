<!doctype html>
<html lang="en">
  <head>
    <?php include 'style.php'?>
    <meta charset="utf-8">
    <title>Edit User</title>
  </head>

  <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card shadow-lg mt-5">
              <div class="card-body">
                <h1 class="card-title text-center">User Lookup</h1>
                <form id="get_info">
                  <div class="form-group">
                    <input type="text" id="lookup" class="form-control" name="rin" placeholder="RIN" required/>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-primary btn-clock text-uppercase" type="submit" name="Submit">Lookup</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card shadow-lg my-3">
              <div class="card-body">
                <h1 class="card-title text-center">Update Information</h1>
                <form action="controllers/edit_controller.php" method="post">

                  <div class="form-group">
                    <input type="text" id="first" class="form-control" name="first" placeholder="First Name" required/>
                  </div>

                  <div class="form-group">
                    <input type="text" id="last" class="form-control" name="last" placeholder="Last Name" required/>
                  </div>

                  <div class="form-group">
                    <input type="text" id="email" class="form-control" name="email" placeholder="RPI E-mail" required/>
                  </div>

                  <div class="form-group">
                    <input type="number" id="rin" min="660000000" max="999999999" class="form-control" name="rin" placeholder="RIN" required/>
                  </div>

                  <div class="form-group">
                    <input type="text" id="rcsID" class="form-control" name="rcsID" placeholder="RCS ID" required/>
                  </div>

                   <div class="form-group">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" />
                  </div>

                  <?php
                  $user_type = getPerms();

                  //low permission to high permission
                  //appending on extra functions if needed
                  //may change depending on priveleges
                  if($user_type=="volunteer"){
                    
                    if($user_type=="admin"){
                      //can change volunteer status

                      if($user_type=="TA"){
                        //can change admin status

                        if($user_type=="superAdmin"){
                          //can do everything 
                        }
                      }
                    }
                  }

                ?>

                 <div class="text-center">
                    <button class="btn btn-primary btn-clock text-uppercase" type="submit" name="submit">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/edit_user.js"></script>
  </body>
</html>
