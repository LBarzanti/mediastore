<?php
    header("Content-Type:application/json");
    header("Accept:application/json");
    header("Allow: POST");
    header("Access-Control-Allow-Origin: *");
    $data = json_decode(file_get_contents('php://input'), true);
    $db = new mysqli("db", "root", "progetto", "ecommerce", "3306");
    $query = "SELECT * FROM credenziali";
    $result = $db->query($query);
    $checkMail = false;
    while($row = $result->fetch_assoc())
    {
        if ($row["mail"] == $data["mail"]) 
        {
            if ($row["password"] == $data["password"])
            {
                echo '{"mail":"'. $row["mail"] . '", "password":"'. $row["password"] .'","token":"' . $row["token"] .'"}';
                exit();
            }
            else
            {
                echo '{"error" : "wrong password"}';
                $checkMail = false;
                exit();
            }
            $checkMail = true;
        }
    }
    if (!$checkMail) 
    {
        echo '{"error" : "invalid username"}';
    }
?>