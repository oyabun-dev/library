<?php

require_once 'connect.php';

$post = filter_input_array(INPUT_POST);

if (isset($post) && !empty($post)) {
    search($post['key'], $post['type']);
}

function search($key, $type) {
    $result = [];
    switch ($type) {
        case 'book':
            $key = trim($key);
            $query = ("SELECT * FROM books WHERE title LIKE ?");
            $msg = "book : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;

        case 'release_year':
            $key = date('Y-m-d', strtotime($key));
            $query = ("SELECT * FROM books WHERE release_year LIKE ?");
            $msg = "book released in : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;
        
        case 'price':
            $key = (float)$key;
            $query = ("SELECT * FROM books WHERE price LIKE ?");
            $msg = "book bought for : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;

        case 'pages':
            $key = (int)$key;
            $query = ("SELECT * FROM books WHERE pages LIKE ?");
            $msg = "book with : $key pages found";
            $result = [$query, $msg, $key];
            // return $result;
        break;

        case 'edition_house':
            $key = trim($key);
            $query = ("SELECT * FROM books WHERE edition_house LIKE ?");
            $msg = "book from : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;

        case 'author':
            $key = trim($key);
            $query = ("SELECT * FROM books WHERE author LIKE ?");
            $msg = "book written by : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;
            
        default:
            $key = trim($key);
            $query = ("SELECT * FROM books WHERE title LIKE ?");
            $msg = "book : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;
    }


    try {
        // Connexion à la base de données
        global $conn;
        // Requête d'insertion
        $statement = $conn->prepare($result[0]);
        $searchKey = "%" . $result[2] . "%";
        $statement->bindValue(1, $searchKey);
        $statement->execute();
        $book = $statement->fetch(PDO::FETCH_OBJ);

        $book_id = $book->id;
        $book_title = $book->title;
        $book_author = $book->author;
        $book_release_year = $book->release_year;
        $book_edition_house = $book->edition_house;
        $book_buy_date = $book->buy_date;
        $book_price = $book->price;
        $book_pages = $book->pages;

    
        // echo "$result[1]";
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
