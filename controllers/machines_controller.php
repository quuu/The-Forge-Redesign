<?php

include_once "db_connector.php";

//gets hardware information
$conn = dbConnect();
$stmt = $conn->prepare('SELECT * FROM hardware');
$stmt->execute();
$result = $stmt->fetchAll();

if(!$result){
    echo "invalid";
}
else{
    echo json_encode($result, JSON_PRETTY_PRINT);
}

?>