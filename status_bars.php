<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Machines</title>

  <!--Bootstrap-->
  <link rel="stylesheet" type="text/css" href="./css/home.css">
  <?php include 'style.php';?>
</head>

<body class="bg-secondary">
  <?php include 'nav_bar.php';?>
  <div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 mx-auto">
            <div class="card shadow-lg my-5">
              <div class="card-body">
              <h1 class="card-title text-center">Machine Status</h1>
              <pre id="statuses"></pre>
              </div>
            </div>
        </div>
    </div>
  </div>
</body>

<script src="js/jquery-3.3.1.min.js"></script>

<!--Actual Status Bars-->
<script src="js/status_bars.js"></script>
</html>
