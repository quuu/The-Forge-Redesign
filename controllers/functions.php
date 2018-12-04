<?php
include_once "db_connector.php";

function getRCSID(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT UserID FROM Sessions WHERE sessionID = :sessionID");
        $rin->bindParam(':sessionID',$sessionID);
        $rin->execute();
        $rin_result = $rin->fetchColumn();

        //use RIN to get RCSID
        $result = $conn->prepare("SELECT rcsID FROM users WHERE rin = :rin");
        $result->bindParam(':rin',$rin_result);
        $result->execute();
        $ret_result = $result->fetchColumn();

        //return value
        return $ret_result;
    }else{
        return 404;
    }
}

function getName(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT UserID FROM Sessions WHERE sessionID = :sessionID");
        $rin->bindParam(':sessionID',$sessionID);
        $rin->execute();
        $rin_result = $rin->fetchColumn();

        //use RIN to get firstName
        $result = $conn->prepare("SELECT firstName FROM users WHERE rin = :rin");
        $result->bindParam(':rin',$rin_result);
        $result->execute();
        $ret_result = $result->fetchColumn();

        //return value
        //var_dump($ret_result);
        return $ret_result;
    }else{
        return 404;
    }
}

function getlastName(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT UserID FROM Sessions WHERE sessionID = :sessionID");
        $rin->bindParam(':sessionID',$sessionID);
        $rin->execute();
        $rin_result = $rin->fetchColumn();

        //use RIN to get firstName
        $result = $conn->prepare("SELECT lastName FROM users WHERE rin = :rin");
        $result->bindParam(':rin',$rin_result);
        $result->execute();
        $ret_result = $result->fetchColumn();

        //return value
        //var_dump($ret_result);
        return $ret_result;
    }else{
        return 404;
    }
}

function getEmail(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT UserID FROM Sessions WHERE sessionID = :sessionID");
        $rin->bindParam(':sessionID',$sessionID);
        $rin->execute();
        $rin_result = $rin->fetchColumn();

        //use RIN to get Email
        $result = $conn->prepare("SELECT email FROM users WHERE rin = :rin");
        $result->bindParam(':rin',$rin_result);
        $result->execute();
        $ret_result = $result->fetchColumn();

        //return value
        return $ret_result;
    }else{
        return 404;
    }
}

function getPerms(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT UserID FROM Sessions WHERE sessionID = :sessionID");
        $rin->bindParam(':sessionID',$sessionID);
        $rin->execute();
        $rin_result = $rin->fetchColumn();

        //use RIN to get Perms (Type)
        $result = $conn->prepare("SELECT type FROM users WHERE rin = :rin");
        $result->bindParam(':rin',$rin_result);
        $result->execute();
        $ret_result = $result->fetchColumn();

        //return value
        return $ret_result;
    }else{
        return 404;
    }
}

function getUses(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT UserID FROM Sessions WHERE sessionID = :sessionID");
        $rin->bindParam(':sessionID',$sessionID);
        $rin->execute();
        $rin_result = $rin->fetchColumn();

        //use RIN to get 10 most recent Projects in reverse chronological order
        $result = $conn->prepare("SELECT * FROM projects WHERE userID = :rin ORDER BY startTime DESC LIMIT 10");
        $result->bindParam(':rin',$rin_result);
        $result->execute();
        $ret_result = $result->fetchColumn();

        //return value
        return $ret_result;
    }else{
        return 404;
    }
}

function emailMachine($machine){
    //grab the Rin of that Machine
    $conn = dbConnect();
    $numUses = $conn->prepare("SELECT userID FROM projects WHERE machine = :machine");
    $stmt->bindParam(':machine',$machine);
    $numUses->execute();
    $rin_ret = $numUses->fetchColumn();

    //grab the email from that RIN
    $conn = dbConnect();
    $numUses = $conn->prepare("SELECT email FROM users WHERE rin = :rin");
    $stmt->bindParam(':rin',$rin_ret);
    $numUses->execute();
    //now we have the email
    $email_ret = $numUses->fetchColumn();
    return $email_ret;
}

function generateMachineDropDown($inUse){
    $connection = dbconnect();
    $stmt = $connection->prepare('SELECT machineName FROM hardware WHERE inUse = :inUse');
    $stmt->bindParam(':inUse',$inUse);
    $stmt->execute();
    $machines = $stmt->fetchall();
    foreach($machines as $machine){
        $item = "<option value=" . "\"" . $machine["machineName"] . "\"" . ">";
        $item .= $machine["machineName"];
        echo $item;
    }
}

?>
