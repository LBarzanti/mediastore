<?php
    header("Content-Type:application/json");
    header("Accept:application/json");
    header("Allow: POST");
    header("Access-Control-Allow-Origin: *");
    $data = json_decode(file_get_contents('php://input'), true);
    include "./connect.php";
    $query = "SELECT mail FROM credenziali";
    $result = $db->query($query);
    $check = false;
    while($row = $result->fetch_assoc())
    {
        if($row["mail"] == $data["mail"])
        {
            $check = true;
        }
    }
    if ($check) 
    {
        echo '{"error" : "mail già in uso"}';
    }
    else
    {
        $token = createId();
        $query = "INSERT INTO `credenziali` (`id`, `mail`, `password`, `token`) VALUES (NULL, '$data[mail]', '$data[password]', '$token')";
        $db->query($query);
        $query = "SELECT id, mail FROM credenziali";
        $result= $db->query($query);
        while ($row = $result->fetch_assoc()) 
        {
            if ($row["mail"] = $data["mail"]) 
            {
                $query = "INSERT INTO `utente` (`cf`, `nome`, `cognome`, `telefono`, `admin`, `credenziali`, `metodo_pagamento`) VALUES ('$data[cf]', '$data[nome]', '$data[cognome]', '$data[telefono]', '0', '$row[id]', 'null')";
            }
        }
        $db->query($query);
        echo '{"cf" : "' . $data["cf"] . '", "nome" : "'. $data["nome"] .'", "cognome" : "'. $data["cognome"] .'", "telefono" : "'. $data["telefono"] .'", "mail" : "' . $data["mail"] . '", "password" : "'. $data["password"] .'", "token":"'. $token .'"}';
    }

    function createId()
    {
        $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = "";
        for ($i=0; $i < 20; $i++) { 
            $token  = $token . $stringSpace[rand(0, strlen($stringSpace)-1)];
        }
        return $token;
    }
?>