<?php
    header("Content-Type:application/json");
    header("Accept:application/json");
    header("Allow: GET");
    header("Access-Control-Allow-Origin: *");
    include "./connect.php";
    $query = "SELECT * FROM `tipo` WHERE categoria = '". $_GET["tipo"] ."';";
    $result = $db->query($query);
    $brands = array();
    $path = array();
    $i=0;
    while($row = $result->fetch_assoc())
    {
        $brands[$i] = $row["marca"];
        $path[$i] = $row["imgPath"];
        $description[$i] = $row["descrizione"];
        $i++;
    }
    $responce = '{"brands":[';
    for ($i=0; $i < count($brands); $i++) 
    { 
        $responce = $responce . '{
            "id" : "' . $i . '",
            "brand" : "'. $brands[$i] .'",
            "path" : "'. $path[$i] .'",
            "description" : "'. $description[$i] .'"
        },';
    }
    $responce = rtrim($responce, ",");
    $responce = $responce . "]}";
    echo $responce;
?>