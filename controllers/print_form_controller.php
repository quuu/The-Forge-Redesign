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
    $stmt = $connection->prepare('SELECT machineName FROM hardware WHERE inUse = 0');
    $stmt->execute();
    $machines = $stmt->fetchall();
    foreach($machines as $machine){
        $item = "<option value=" . "\"" . $machine["machineName"] . "\"" . ">";
        $item .= $machine["machineName"];
        echo $item;
    }
}

// Polls the database for prices of materials
function generatePlasticsDropDown(){
    $connection = dbconnect();
    $stmt = $connection->prepare('SELECT * FROM plastics');
    $stmt->execute();
    $prices = $stmt->fetchall();
    foreach($prices as $price){
        if($price["type"]  == "Resin"){
            $item = "<option value=" . "\"" . $price["type"] . "\"" . ">" . $price["type"] ."( " . $price["price"] . "mL" . " )";
        }else {
            $item = "<option value=" . "\"" . $price["type"] . "\"" . ">" . $price["type"] . "( " . $price["price"] . "g" . " )";
        }
        $item .= $prices["pID"];
        echo $item;
    }
}
?>