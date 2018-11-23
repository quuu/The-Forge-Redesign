<?php
//include_once "controllers/db_connector.php";
//include_once 'controllers/functions.php';

function generateSpecificTable($class, $id){//given a user, generate a recent project table
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
        $ret_result = $result->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $ret_result = 404; //if no values are found, throw 404 exception
    }

    //parse output into table
    if($ret_result > 0 && $ret_result != 404){
        //instantiate table format
        echo "<table class=\"table\">";
            echo"<thead>";
                echo"<tr>";
                    echo"<th scope=\"col\">#</th>";
                    echo"<th scope=\"col\">Date</th>";
                    echo"<th scope=\"col\">Machine</th>";
                    echo"<th scope=\"col\">Plastic Info</th>";
                    echo"<th scope=\"col\">Cost</th>";
                echo"</tr>";
            echo"</thead>";
        echo "<tbody>";
        //parse return value for info and infill table
        $count = 1;
        foreach($ret_result as $row){
            //var_dump($row);
            echo"<tr>";
                //#
                echo"<th scope=\"row\">$count</th>";

                //Date
                echo"<td>";
                echo $row['startTime'];
                echo"</td>";

                //Machine
                echo"<td>";
                echo $row['machine'];
                echo"</td>";

                //plasticInfo
                echo"<td>";
                $info = formatPlastic($row);
                echo $info;
                echo"</td>";

                //cost
                echo"<td>";
                echo "$";
                echo $row['payment'];
                echo"</td>";

            echo"</tr>"; //end the table row
            $count++; //bump the index
        }
        echo "</tbody>";

    }else if ($ret_result == 404){
        echo "<div class=\"$class\" id=\"$id\"> <h3> Looks like you haven't started any projects yet, get innovating!</h3></div>";
        return;
    }

}

function formatPlastic($row){
    $hasPlastic = checkPlastic($row['machine']);
    if($hasPlastic == 1) {
        $ret_str = $row['plasticBrand']; //Makerbot
        $ret_str .= " "; //Makerbot
        $ret_str .= $row['plastic']; //Makerbot PLA
        $ret_str .= ", "; //Makerbot PLA,
        $ret_str .= $row['plasticColor']; //Makerbot PLA, Red
        $ret_str .= " - "; //Makerbot PLA, Red -
        $ret_str .= $row['amount']; //Makerbot PLA, Red - 300
        if($row['machine'] == "Form 1+"){
            $ret_str .= "mL"; //Makerbot PLA, Red - 300mL,
        }else {
            $ret_str .= "g"; //Makerbot PLA, Red - 300g,
        }
        $ret_str .= "."; //Makerbot PLA, Red - PLA, 300

    }else{
        $ret_str = "None";
    }
    return $ret_str;
}

function checkPlastic($equipment){
    //echo $equipment;
    $conn = dbConnect();
    //grab the UserID (RIN) from the Session Data
    $machines = $conn->prepare("SELECT * FROM hardware;");
    $machines->execute();
    $machine_array = $machines->fetchAll(PDO::FETCH_ASSOC);

    $usesPlastic = 0;
    foreach($machine_array as $row){//iterate through machines
        if($row['machineName'] == $equipment){//match the machines
            if($row['usesPlastic'] == 1){//check plastic use
                $usesPlastic = 1;
                return $usesPlastic;
            }
        }
    }
    return $usesPlastic;//return default value for error handling.
}

?>



