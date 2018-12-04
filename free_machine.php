<?php
function generateInUseButtons(){
    require_once('controllers/db_connector.php');
    $conn = dbConnect();
    $stmt = $conn->prepare("SELECT machineName FROM hardware WHERE inUse = 1;");
    $stmt->execute();
    $count = 0;
    // Basically while there's still stuff to fetch we will generate buttons
    while($machine = $stmt->fetch()){
        $count++;
        $machineName = $machine['machineName'];
        // The controller takes a get parameter with the machine name and then frees that machine
        $href = "controllers/free_machine_controller.php?machinename=" . urlencode($machineName);
        echo "<h3>" . $machineName . "</h3>";
        echo "<a href='" . $href . "'><button>Free Machine</button></a>";
        echo "<br/>";
    }
    if($count == 0){
        echo "<h1> All Machines are available!</h1>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Free Machine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div id="machines">
        <?php generateInUseButtons() ?>
    </div>
</body>
</html>