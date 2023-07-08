<?php

require_once 'connect.php';

$post = filter_input_array(INPUT_POST);

if (isset($post) && !empty($post)) {
    addLend($post['book_id'], $post['friend_id'], $post['lend_date'], $post['return_date']);
}

function addLend($book_id, $friend_id, $lend_date, $return_date) {
    try {
        // Connexion à la base de données
        global $conn;
        
        // Requête d'insertion
        $query = "INSERT INTO lend (book_id, friend_id, lend_date, return_date) VALUES (:book_id, :friend_id, :lend_date, :return_date)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':book_id', $book_id);
        $statement->bindParam(':friend_id', $friend_id);
        $statement->bindParam(':lend_date', $lend_date);
        $statement->bindParam(':return_date', $return_date);
        $statement->execute();
    
        echo "book lended to friend : $lend_date";
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}