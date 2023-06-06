<?php
    header("Content-Type:application/json");
    header("Accept:application/json");
    header("Allow: GET");
    header("Access-Control-Allow-Origin: *");
    include "./connect.php";
    $query = "SELECT * FROM tipo";
    $result = $db->query($query);
    $categories = array();
    while($row = $result->fetch_assoc())
    {
        $categories[$row["id"]] = $row["categoria"];
    }
    $responce = '{"categories":[';
    for ($i=1; $i < count($categories); $i++) 
    { 
        $responce = $responce . '{
            "id" : "' . $i . '",
            "tipo" : "'. $categories[$i] .'"
        },';
    }
    $responce = rtrim($responce, ",");
    $responce = $responce . "]}";
    echo $responce;
?>