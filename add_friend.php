<?php

require_once 'connect.php';

$post = filter_input_array(INPUT_POST);

if (isset($post) && !empty($post)) {
    addFriend($post['name']);
}

function addFriend($name) {
    try {
        // Connexion à la base de données
        global $conn;
        
        // Requête d'insertion
        $query = "INSERT INTO friends (name) VALUES (:name)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':name', $name);
        $statement->execute();
    
        echo "$name added to friends";
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
