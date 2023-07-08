<?php

require_once 'connect.php';

$post = filter_input_array(INPUT_POST);

if (isset($post) && !empty($post)) {
    addBook($post['title'], $post['author'], $post['release_year'], $post['edition_house'], $post['buy_date'], $post['price'], $post['pages']);
}

function addBook($title, $author, $release_year, $edition_house, $buy_date, $price, $pages) {
    try {
        // Connexion à la base de données
        global $conn;
        
        // Requête d'insertion
        $query = "INSERT INTO books (title, author, release_year, edition_house, buy_date, price, pages) VALUES (:title, :author, :release_year, :edition_house, :buy_date, :price, :pages)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':author', $author);
        $statement->bindParam(':release_year', $release_year);
        $statement->bindParam(':edition_house', $edition_house);
        $statement->bindParam(':buy_date', $buy_date);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':pages', $pages);
        $statement->execute();
    
        echo "book : $title added";
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
