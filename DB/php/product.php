<?php
    header("Content-Type:application/json");
    header("Accept:application/json");
    header("Allow: POST");
    header("Access-Control-Allow-Origin: *");
    include "./connect.php";
    $data = json_decode(file_get_contents('php://input'), true);
    $query = "SELECT p.modello, p.prezzo, p.ImgPath, p.descrizione from prodotto p join tipo t ON p.tipo = t.id WHERE categoria = '". $data["categoria"] ."' AND marca = '". $data["marca"] ."'";
    $result = $db->query($query);
    $i=0;
    $products = array();
    $descriptions = array();
    $prezzi = array();
    $imgs = array();
    while($row = $result->fetch_assoc())
    {
        $products[$i]=$row["modello"];
        $descriptions[$i] = $row["descrizione"];
        $prezzi[$i] = $row["prezzo"];
        $imgs[$i] = $row["ImgPath"];
        $i++;
    }
    $responce = '{"products":[';
    for ($i=0; $i < count($products); $i++) 
    { 
        $responce = $responce . '{
            "id" : "' . $i . '",
            "model" : "'. $products[$i] .'",
            "path" : "'. $imgs[$i] .'",
            "description" : "'. $descriptions[$i] .'"
        },';
    }
    $responce = rtrim($responce, ",");
    $responce = $responce . "]}";
    echo $responce;
?>