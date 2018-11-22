<?php
include_once "db_connector.php";

function getRCSID(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT `UserID` FROM `Sessions` WHERE `sessionID` = '$sessionID'");
        $rin->execute();

        //use RIN to get RCSID
        $result = $conn->prepare("SELECT `rcsID` FROM `users` WHERE `rin` = '$rin'");
        $result->execute();

        //return value
        return $result;
    }else{
        return 404;
    }
}

function getName(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT `UserID` FROM `Sessions` WHERE `sessionID` = '$sessionID'");
        $rin->execute();

        //use RIN to get firstName
        $result = $conn->prepare("SELECT `firstName` FROM `users` WHERE `rin` = '$rin'");
        $result->execute();

        //return value
        return $result;
    }else{
        return 404;
    }
}

function getEmail(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT `UserID` FROM `Sessions` WHERE `sessionID` = '$sessionID'");
        $rin->execute();

        //use RIN to get Email
        $result = $conn->prepare("SELECT `email` FROM `users` WHERE `rin` = '$rin'");
        $result->execute();

        //return value
        return $result;
    }else{
        return 404;
    }
}

function getPerms(){
    if(isset($_COOKIE['FORGE-SESSION'])){
        $sessionID = $_COOKIE['FORGE-SESSION'];
        $conn = dbConnect();
        //grab the UserID (RIN) from the Session Data
        $rin = $conn->prepare("SELECT `UserID` FROM `Sessions` WHERE `sessionID` = '$sessionID'");
        $rin->execute();

        //use RIN to get Perms (Type)
        $result = $conn->prepare("SELECT `type` FROM `users` WHERE `rin` = '$rin'");
        $result->execute();

        //return value
        return $result;
    }else{
        return 404;
    }
}


?>