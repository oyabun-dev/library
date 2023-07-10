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
            $query = ("SELECT * FROM books WHERE title LIKE ?");
            $msg = "book : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;

        case 'release_year':
            $key = date('Y-m-d', strtotime($key));
            $query = ("SELECT * FROM books WHERE release_year = ?");
            $msg = "book released in : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;
        
        case 'price':
            $key = (float)$key;
            $query = ("SELECT * FROM books WHERE price = ?");
            $msg = "book bought for : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;

        case 'pages':
            $key = (int)$key;
            $query = ("SELECT * FROM books WHERE pages = ?");
            $msg = "book with : $key pages found";
            $result = [$query, $msg, $key];
            // return $result;
        break;

        case 'edition_house':
            $query = ("SELECT * FROM books WHERE edition_house LIKE ?");
            $msg = "book from : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;

        case 'author':
            $query = ("SELECT * FROM books WHERE author LIKE ?");
            $msg = "book written by : $key found";
            $result = [$query, $msg, $key];
            // return $result;
        break;
            
        default:
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
        if (is_int($result[2]) || is_float($result[2]) || $result[2] == date('Y-m-d', strtotime($result[2]))) {
            $searchKey = $result[2];
        }else {
            $searchKey = "%" . $result[2] . "%";
        }
        $statement->bindValue(1, $searchKey);
        $statement->execute();
        $book = $statement->fetch(PDO::FETCH_ASSOC);
        showResults($result[1], $book, $statement);
        // echo "$result[1]";
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

function showResults($title, $result, $statement) {
    echo "<h1>$title</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>title</th>";
    echo "<th>author</th>";
    echo "<th>release year</th>";
    echo "<th>edition house</th>";
    echo "<th>buy date</th>";
    echo "<th>price</th>";
    echo "<th>pages</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while($result) {
        echo "<tr>";
        echo "<td>$result[id]</td>";
        echo "<td>$result[title]</td>";
        echo "<td>$result[author]</td>";
        echo "<td>$result[release_year]</td>";
        echo "<td>$result[edition_house]</td>";
        echo "<td>$result[buy_date]</td>";
        echo "<td>$result[price]</td>";
        echo "<td>$result[pages]</td>";
        echo "<td><a href='update_books.php?id=$result[id]'>update</a></td>";
        echo "<td><a href='delete_books.php?id=$result[id]'>delete</a></td>";
        echo "</tr>";
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    }
    echo "</tbody>";
    echo "</table>";
}

