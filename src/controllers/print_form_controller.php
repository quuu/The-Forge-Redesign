<?php
include_once "db_connector.php";
// Ensures they didn't send bad post data
if(isset($_POST['plastic']) && isset($_POST['amount']) && isset($_POST['time'])){
    $conn = dbConnect();
    // ONCE WE FIX THE DATABASE I CAN FIX THIS
}

// Polls the database for the machines that are not currently in use.
function generateMachineDropDown(){
    $connection = dbconnect();
    $stmt = $connection->prepare('SELECT machineName FROM Hardware WHERE inUse = 0');
    $stmt->execute();
    $machines = $stmt->fetchall();
    foreach($machines as $machine){
        $item = "<option value=" . "\"" . $machine["machineName"] . "\"" . ">";
        $item .= $machine["machineName"];
        echo $item;
    }
}
?>