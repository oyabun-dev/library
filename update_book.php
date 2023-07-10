<?php
require_once 'connect.php';
function updateBook (){
    global $conn;
    $post = filter_input_array(INPUT_POST);
    if(isset($post) && !empty($post)) {
        $id = $post['id'];
        $title = $post['title'];
        $author = $post['author'];
        $release_year = $post['release_year'];
        $edition_house = $post['edition_house'];
        $buy_date = $post['buy_date'];
        $price = $post['price'];
        $pages = $post['pages'];
        $query = ("UPDATE books SET title = ?, author = ?, release_year = ?, edition_house = ?, buy_date = ?, price = ?, pages = ? WHERE id = ?");
        $statement = $conn->prepare($query);
        $statement->execute([$title, $author, $release_year, $edition_house, $buy_date, $price, $pages, $id]);
        header('Location: index.php');
    }
}

updateBook();