<?php
    $db = new mysqli("db", "root", "progetto", "ecommerce", "3306");
    $query = "SELECT * FROM prodotto";
    $result = $db->query($query);
    while($row = $result->fetch_assoc())
    {
        echo " id: $row[id], descrizione: $row[descrizione], modello: $row[modello], prezzo: $row[prezzo] ";
    }
?>