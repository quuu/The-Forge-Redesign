<?php
include_once "db_connector.php";
// Ensures they didn't send bad post data
if(isset($_POST['machine'])){
    $conn = dbConnect();
    $stmt = $conn->prepare("SELECT * FROM users LEFT JOIN sessions ON users.rin = userID WHERE sessions.sessionID = :sessionID;");
    $stmt->bindParam(":sessionID", $_COOKIE['FORGE-SESSION']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conn->prepare("INSERT INTO projects(plastic, amount, plasticColor, plasticBrand, printTemp, payment, machine, forClass, startTime, eta, endTime, success, timesFailed, userID, userInitials) 
    VALUES (:plastic, :amount, :color, :brand, :temp, :payment, :machine, :forClass, :startTime, :eta, NULL, NULL, 0, :ID, :initials);");
    date_default_timezone_set("America/New_York");
    $start = date("Y-m-d H:i:s",time());
    
    if(isset($_POST['time']) && $_POST['time'] != ""){
        $eta = date("Y-m-d H:i:s",time() + $_POST['time'] * 60);
    }else{
        $eta = NULL;
    }
    if(isset($_POST['forclass'])){
        $forclass = 1;
    }else{
        $forclass = 0;
    }
    // The information regarding plastics is in JSON, so we must decode it.
    $plasticInfo = json_decode($_POST['plastic'],true);
    //We make sure to not charge if they're not using plastic
    if(isset($_POST['amount']) && $_POST['amount'] != ""){
        $price = $_POST['amount'] * (float)$plasticInfo['price'];
    }else{
        $price = 0;
    }
    
    // Maps all the variables correctly.
    $paramaterArray = 
    [
        'plastic' => $plasticInfo['type'],
        'amount' => $_POST['amount'],
        'color' => $_POST['color'],
        'brand' => $_POST['brand'],
        'temp' => $_POST['temp'],
        'payment' => $price,
        'machine' => $_POST['machine'],
        'forClass' => $forclass,
        'startTime' => $start,
        'eta' => $eta,
        'ID' => $user['rin'],
        'initials' => $_POST['initials'],
    ];
    $stmt->execute($paramaterArray);
    $stmt = $conn->prepare("UPDATE hardware SET inUse=1 WHERE machineName=:machine;");
    $stmt->bindParam(":machine", $_POST['machine']);
    $stmt->execute();


    //Updates Outstanding Balance in Users Table
    $stmt = $conn->prepare("UPDATE users SET `outstandingBalance` = `outstandingBalance` + :price WHERE `rin` = :rin");
    $stmt->bindParam(":price", $paramaterArray['payment']);
    $stmt->bindParam(":rin", $paramaterArray['ID']);
    $stmt->execute();
    echo "<script>window.location.href = \" ../myforge.php \";</script>";
    exit();
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
