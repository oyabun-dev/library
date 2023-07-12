<?php

require_once 'connect.php';
require_once 'header.php';
require_once 'navigation.php';

$post = filter_input_array(INPUT_POST);

if (isset($post) && !empty($post)) {
    if ($post['cover'] != null && $post['cover'] != '') {
        $post['cover'] = "img/". $post['cover'];
    } else {
        $post['cover'] = "img/no_book_cover.jpg";
    }
    // var_dump($cover);
    // exit;
    addBook($post['title'],$post['cover'], $post['author'], $post['release_year'], $post['edition_house'], $post['buy_date'], $post['price'], $post['pages']);
}

function addBook($title, $cover, $author, $release_year, $edition_house, $buy_date, $price, $pages) {
    try {
        // Connexion à la base de données
        global $conn;
        
        // Requête d'insertion
        $query = "INSERT INTO books (title, cover, author, release_year, edition_house, buy_date, price, pages) VALUES (:title, :cover, :author, :release_year, :edition_house, :buy_date, :price, :pages)";

        // var_dump($query);
        // exit;
        $statement = $conn->prepare($query);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':cover', $cover);
        $statement->bindParam(':author', $author);
        $statement->bindParam(':release_year', $release_year);
        $statement->bindParam(':edition_house', $edition_house);
        $statement->bindParam(':buy_date', $buy_date);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':pages', $pages);
        $statement->execute();
        // header('re: bookshelf.php');
    
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
?>

<a href="bookshelf.php" class="btn go-back"> Go Back </a>

<div id="add_book">
    <form action="add_book.php" method="post">
        <div class="change-cover">
            <div class="input-group">
                <!-- <label for="book-cover">Cover</label> -->
                <label for="book-cover" class="custom-file-input">
                    <input type="file" class="btn" accept="image/jpg, image/jpeg, image/png" id="book-cover" name="cover">
                </label>
                <!-- <input type="text" class="d-none" name="cover"> -->
                
                <img id="cover-img" src="img/no_book_cover.jpg" alt="book cover">
            </div>
        </div>
    
        <div class="change-desc">
            <div class="groups">
                <div class="form-control">
                    <div class="input-group">
                        <label for="book-title">title</label>
                        <input type="text" name="title" id="book-title">
                    </div>
                
                    <div class="input-group">
                        <label for="book-author">author</label>
                        <input type="text" name="author" id="book-author">
                    </div>
                
                    <div class="input-group">
                        <label for="book-release-year">release year</label>
                        <input type="date" name="release_year" id="book-release-year">
                    </div>
                
                    <div class="input-group">
                        <label for="book-edition-house">edition house</label>
                        <input type="text" name="edition_house" id="book-edition-house">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input-group">
                        <label for="book-buy-date">buy date</label>
                        <input type="date" name="buy_date" id="book-buy-date">
                    </div>
                
                    <div class="input-group">
                        <label for="book-price">price</label>
                        <input type="number" name="price" id="book-price">
                    </div>
                
                    <div class="input-group">
                        <label for="book-pages">pages</label>
                        <input type="number" name="pages" id="book-pages">
                    </div>
                </div>
            </div>
        
            <div class="groups">
                <div class="input-group">
                    <button type="submit" class="btn">Add Book</button>
                </div>
            </div>
        </div>
    </form>
</div>


<?php require_once 'footer.php';
require_once 'subfooter.php'; ?>