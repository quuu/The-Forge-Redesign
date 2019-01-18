<!doctype html>
<html class="bg-secondary" lang="en">
<head>
    <meta charset="utf-8">
    <title>Print Failed</title>
    <?php include 'style.php';?>
</head>

<body class="bg-secondary">
<div class="bg-secondary pt-3 p-2">
    <?php include_once 'nav_bar.php';?>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 mx-auto">
            <div class="card shadow-lg my-5">
                <div class="card-body">
                    <h1 class="card-title text-center">Send Print Failure Email</h1>
                    <div class="container">
                        </div>

                        <html class="row">

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

</body>

<script src="js/jquery-3.3.1.min.js"></script>

</html>
