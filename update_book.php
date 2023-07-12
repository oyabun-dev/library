<?php
require_once 'connect.php';
function updateBook (){
    global $conn;
    $post = filter_input_array(INPUT_POST);
    if(isset($post) && !empty($post)) {
        $id = $post['id'];
        $cover = $post['cover'];
        if ($cover != null && $cover != '') {
            $cover = $post['cover'];
        } else {
            $cover = "cover_$id.jpg";
        }
        $title = $post['title'];
        $author = $post['author'];
        $release_year = $post['release_year'];
        $edition_house = $post['edition_house'];
        $buy_date = $post['buy_date'];
        $price = $post['price'];
        $pages = $post['pages'];
        $query = ('UPDATE books SET cover = "img/'. $cover .'", title =" '. $title .'" , author = "'. $author .'", release_year = "'. $release_year .'", edition_house = "'. $edition_house .'", buy_date = "'. $buy_date .'", price = "'. $price .'", pages = "'. $pages .'" WHERE id = "'. $id .'"');
        // var_dump($query);
        // exit;
       try {
        $statement = $conn->prepare($query);

        $statement->execute();

        header('Location: bookshelf.php');
       } catch (PDOException $e) {
           echo $e->getMessage();
       }
    }
}

updateBook();