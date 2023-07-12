<?php

require_once 'connect.php';
require_once 'header.php';
require_once 'navigation.php';

$post = filter_input_array(INPUT_POST);

if (!is_null($post)) {
    $matches = search($post['key'], $post['type']);
    $books = $matches[0];
    $statement = $matches[1];
}

function search($key, $type)
{
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
        } else {
            $searchKey = "%{$result[2]}%";
        }
        $statement->bindValue(1, $searchKey);
        $statement->execute();
        $books = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
    return [$books, $statement];
}
?>


<div class="search-bar">
    <h1 class="heading">Book list</h1>
    <div class="search-form">
        <form action="search.php" method="post">
            <a href="add_book.php" class="btn">+ Add Book</a>
            <div class="form-group">
                <select name="type" id="type">
                    <option value="book">Title</option>
                    <option value="release_year">Release year</option>
                    <option value="price">Price</option>
                    <option value="pages">Pages</option>
                    <option value="edition_house">Edition house</option>
                    <option value="author">Author</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="key" id="search" placeholder="search by book name ...">
                <button type="submit""><i class=" zmdi zmdi-search"></i></button>
            </div>
        </form>
    </div>
</div>

<div class="book-shelves">
    <?php
    foreach ($books as $book) {
    ?>
        <a href="description.php?id=<?= $book["id"] ?>" class="book-shelf">
            <div class="book-cover"><img src="<?= $book['cover'] ?>" alt=""></div>
            <div class="book-description">
                <div class="desc">
                    <h1 class="heading"><?= $book['title'] ?></h1>
                    <h5 class="sub-heading"><?= $book['author'] ?></h5>
                    <small class="release-date"><?= $book['release_year'] ?></small>
                    <h5 class="sub-heading"><?= $book['edition_house'] ?></h5>
                </div>
                <div class="book-action">
                    <form action="description.php" method="get" style="width: 100%;">
                        <button class="btn box-shadow" name="id" value="<?= $book["id"] ?>">See more</button>
                    </form>
                </div>
            </div>
        </a>
    <?php
    }
    ?>
</div>

<?php require_once 'subfooter.php'; ?>