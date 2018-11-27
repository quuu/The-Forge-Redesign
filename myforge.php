<!doctype html>
<html class="no-js" lang="">

<head>
    <?php include_once 'style.php';?>
    <?php include_once 'controllers/functions.php';?>
    <?php include_once 'controllers/auth_controller.php';?>
    <?php include_once "controllers/db_connector.php";?>
    <?php include_once 'scripts/table_generation.php';?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <title>The Forge @ RPI</title>
</head>

<body class="bg-secondary">
<?php include_once 'nav_bar.php';?>
<?php
    $user_type = getPerms();
    $last_name = getlastName();
    echo "<h1 class=\"card-title\">Welcome Back [$user_type] $last_name</h1>";

    //generate content based on permission tiers
    if($user_type == "user"){
        generateSpecificTable("","");
        echo "<div>";
            echo "<h3>Innovation station</h3>";
            echo "<i>What will you create today?</i>";
            echo "<a role=\"button\" class=\"btn btn-dark btn-lg\" href='print_form.php'>Use a Machine</a>";
        echo "</div>";

    }else if ($user_type == "volunteer"){
        generateSpecificTable("","");
        generateTotalTable("","");
        echo "<div>";
            echo "<h3>Innovation station</h3>";
            echo "<i>What will you create today?</i>";
            echo "<a role=\"button\" class=\"btn btn-dark btn-lg\" href='print_form.php'>Use a Machine</a>";
            echo "<a role=\"button\" class=\"btn btn-success btn-lg\" href='scripts/free_machine.php'>Free a Machine</a>";
            //display a pop-up asking for failed machine, then pull user info and get email to send
            echo "<button type=\"button\" class=\"btn btn-danger btn-lg\">Send Failed Print Email</button>";
        echo "</div>";
    } else if ($user_type == "admin"){
        generateSpecificTable("","");
        generateTotalTable("","");
        echo "<div>";
            echo "<h3>Admin Panel</h3>";
            echo "<a role=\"button\" class=\"btn btn-dark btn-lg\" href='print_form.php'>Use a Machine</a>";
            echo "<a role=\"button\" class=\"btn btn-success btn-lg\" href='scripts/free_machine.php'>Free a Machine</a>";
            //display a pop-up asking for failed machine, then pull user info and get email to send
            echo "<button type=\"button\" class=\"btn btn-danger btn-lg\">Send Failed Print Email</button>";
            echo "<a role=\"button\" class=\"btn btn-info btn-lg\" href='create_account.php'>Create Account</a>";
            echo "<a role=\"button\" class=\"btn btn-info btn-lg\" href='edit_user.php'>Manage Member</a>";
            echo "<form action=\"reports.php\" method=\"post\" target=\"_blank\">";
                //Heuristic Reports as .xls
                echo "<input type=\"submit\" class=\"btn btn-success btn-lg\" value = \"Open Script\">Generate Reports</input>";
            echo "</form>";
        echo "</div>";
    } else if ($user_type == "TA"){
        generateSpecificTable("","");
        generateTotalTable("","");
        echo "<div>";
            echo "<h3>Super Admin Panel</h3>";
            echo "<a role=\"button\" class=\"btn btn-dark btn-lg\" href='print_form.php'>Use a Machine</a>";
            echo "<a role=\"button\" class=\"btn btn-success btn-lg\" href='scripts/free_machine.php'>Free a Machine</a>";
            //display a pop-up asking for failed machine, then pull user info and get email to send
            echo "<button type=\"button\" class=\"btn btn-danger btn-lg\">Send Failed Print Email</button>";
            echo "<a role=\"button\" class=\"btn btn-info btn-lg\" href='create_account.php'>Create Account</a>";
            echo "<a role=\"button\" class=\"btn btn-info btn-lg\" href='edit_user.php'>Manage Member</a>";
            //Heuristic Report as .xls
            echo "<a role=\"button\" class=\"btn btn-success btn-lg\" href='reports.php'>Generate Reports</a>";
            //Needs a confirm box as this dumps the user Table (Excluding Super Admin Users) and Projects also runs report generation
            echo "<button type=\"button\" class=\"btn btn-danger btn-lg\">End Semester</button>";
            echo "<a role=\"button\" class=\"btn btn-danger btn-lg\" href='edit_admin.php'>Remove Admin</a>";
        echo "</div>";
    }

?>


</body>
