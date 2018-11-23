<!doctype html>
<html class="no-js" lang="">

<head>
    <?php include_once 'style.php';?>
    <?php include_once 'controllers/functions.php';?>
    <?php include_once 'controllers/auth_controller.php';?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <title>The Forge @ RPI</title>
</head>

<body>
<?php include_once 'nav_bar.php';?>
<?php
    $user_type = getPerms();
    $last_name = getlastName();
    echo "<h1 class=\"card-title\">Welcome Back [$user_type] $last_name</h1>";

    //generate content based on permission tiers
    if($user_type == "TA" || $user_type == "admin" || $user_type == "volunteer" || $user_type == "user"){

    }else if ($user_type == "admin" || $user_type == "volunteer" || $user_type == "user"){

    } else if ($user_type == "volunteer" || $user_type == "user"){

    } else if ($user_type == "user"){

    }

?>


</body>
