<?php

require_once 'connect.php';

$post = filter_input_array(INPUT_POST);

if (isset($post) && !empty($post)) {
    search($post['key']);
}

function search($key) {
    $type = $_POST['type'];
    $result = [];
    switch ($type) {
        case 'book':
            $key = trim($key);
            $query = ("SELECT * FROM books WHERE title LIKE $key");
            // var_dump($query);
            // exit;
            $msg = "book : $key found";
            $result = [$query, $msg, $key];
            // var_dump($result);
            // exit;
            return $result;
        break;

        case 'release_year':
            $key = date('Y-m-d', strtotime($key));
            $query = ("SELECT * FROM books WHERE release_year LIKE '%:key%'");
            $msg = "book released in : $key found";
            $result = [$query, $msg, $key];
            return $result;
        break;
        
        case 'price':
            $key = (float)$key;
            $query = ("SELECT * FROM books WHERE price LIKE '%:key%'");
            $msg = "book bought for : $key found";
            $result = [$query, $msg, $key];
            return $result;
        break;

        case 'pages':
            $key = (int)$key;
            $query = ("SELECT * FROM books WHERE pages LIKE '%:key%'");
            $msg = "book with : $key pages found";
            $result = [$query, $msg, $key];
            return $result;
        break;

        case 'edition_house':
            $key = trim($key);
            $query = ("SELECT * FROM books WHERE edition_house LIKE '%:key%'");
            $msg = "book from : $key found";
            $result = [$query, $msg, $key];
            return $result;
        break;

        case 'author':
            $key = trim($key);
            $query = ("SELECT * FROM books WHERE author LIKE '%:key%'");
            $msg = "book written by : $key found";
            $result = [$query, $msg, $key];
            return $result;
        break;
            
        default:
            $query = ("SELECT * FROM books WHERE title LIKE '%:key%'");
            $msg = "book : $key found";
            $result = [$query, $msg, $key];
            return $result;
        break;
    }
    try {
        // Connexion à la base de données
        global $conn;
        
        // Requête d'insertion
        $statement = $conn->prepare($result[0]);
        var_dump($statement);
        exit;
        $statement->bindParam(':key', $result[2]);
        $statement->execute();
    
        echo "$result[1]";
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
