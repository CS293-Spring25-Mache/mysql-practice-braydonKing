<?php

function dbConnect(){
    /*** connection credentials *******/
    $servername = "mysqlServer";
    $username = "fakeAirbnbUser";
    $password = "apples11Million!";
    $database = "fakeAirbnb";
    $dbport = 3306;
    /****** connect to database **************/

    try {
        $db = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4;port=$dbport", $username, $password);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    return $db;
}


function getNeighborhoods($db){
    try {
        $stmt = $db->prepare("select * from neighborhoods 
                            order by neighborhood");   
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    
    }
    catch (Exception $e) {
        echo $e;
    }
}

function getNeighborhood($db, $hoodId) {
    try {
        $stmt = $db->prepare("select * FROM neighborhoods 
                              WHERE id=$hoodId");   
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    catch (Exception $e) {
        echo $e;
    }

}


?>