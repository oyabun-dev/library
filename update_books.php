<?php
require_once 'connect.php';

$get = filter_input_array(INPUT_GET);
if (isset($get) && !empty($get)) {
    $id = $get['id'];
}

function get_book($id) {
    global $conn;
    $query = ("SELECT * FROM books WHERE id = $id");
    $statement = $conn->prepare($query);
    $statement->execute();
    $book = $statement->fetch(PDO::FETCH_ASSOC);
    return $book;
}

$book = get_book($id);
// var_dump($book);
// exit;


echo '<form action="update_book.php" method="post">';
echo '<label for="book-id">book id</label>';
echo '<input type="number" name="id" id="book-id" value=' . $book["id"] . '>';
echo '<label for="book-title">title</label>';
echo '<input type="text" name="title" id="book-title" value=' . $book["title"] . '>';
echo '<label for="book-author">author</label>';
echo '<input type="text" name="author" id="book-author" value=' . $book["author"] . '>';
echo '<label for="book-release-year">release year</label>';
echo '<input type="date" name="release_year" id="book-release-year" value=' . $book["release_year"] . '>';
echo '<label for="book-edition-house">edition house</label>';
echo '<input type="text" name="edition_house" id="book-edition-house" value=' . $book["edition_house"] . '>';
echo '<label for="book-buy-date">buy date</label>';
echo '<input type="date" name="buy_date" id="book-buy-date" value=' . $book["buy_date"] . '>';
echo '<label for="book-price">price</label>';
echo '<input type="number" name="price" id="book-price" value=' . $book["price"] . '>';
echo '<label for="book-pages">pages</label>';
echo '<input type="number" name="pages" id="book-pages" value=' . $book["pages"] . '>';
echo '<button type="submit">update book</button>';
echo '</form>';