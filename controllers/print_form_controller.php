<?php
include_once "db_connector.php";
// Ensures they didn't send bad post data
if(isset($_POST['machine'])){
    $conn = dbConnect();
    $stmt = $conn->prepare("SELECT * FROM users LEFT JOIN sessions ON users.rin = userID WHERE sessions.sessionID = :sessionID;");
    $stmt->bindParam(":sessionID", $_COOKIE['FORGE-SESSION']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conn->prepare("INSERT INTO projects(plastic, amount, payment, machine, forClass, startTime, eta, endTime, success, timesFailed, plasticBrand, userID, userInit) 
    VALUES (:plastic, :amount, :payment, :machine, :forClass, :startTime, :eta, NULL, NULL, 0, :brand, :ID, :initials);");
    date_default_timezone_set("America/New_York");
    $start = date("Y-m-d H:i:s",time());
    if(isset($_POST['time'])){
        $eta = date("Y-m-d H:i:s",time() + $_POST['time'] * 60);
    }else{
        $eta = NULL;
    }
    $plasticInfo = json_decode($_POST['plastic'],true);
    $price = $_POST['amount'] * (float)$plasticInfo['price'];
    $stmt->execute(
        [
            'plastic' => $plasticInfo['type'],
            'amount' => $_POST['amount'],
            'payment' => $price,
            'machine' => $_POST['machine'],
            'forClass' => $_POST['forclass'],
            'startTime' => $start,
            'eta' => $eta,
            'brand' => $_POST['brand'],
            'ID' => $user['rin'],
            'initials' => $_POST['initials']
        ]
    );

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
        // JSON Hates single quotes hence all the escapes
        $option_value = "{\"type\":\"" . $price["type"] . "\", \"price\":\"" . $price["price"] . "\"}";
        if($price["type"]  == "Resin"){
            $item = "<option value='" . $option_value . "'>" . $price["type"] . " ( $" . $price["price"] . "/mL" . " )</option>";
        }else {
            $item = "<option value='" . $option_value . "'>" . $price["type"] . " ( $" . $price["price"] . "/g" . " )</option>";
        }
        echo $item;
    }
}
?>
