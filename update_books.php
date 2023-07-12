<?php
require_once 'header.php';
require_once 'navigation.php';
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

// var_dump($book["cover"]);
// exit;

?>
<div id="update_book">
    <form action="update_book.php" method="post">
        <div class="change-cover">
            <div class="input-group">
                <!-- <label for="book-cover">Cover</label> -->
                <label for="book-cover" class="custom-file-input">
                    <input type="file" class="btn" accept="image/jpg, image/jpeg, image/png" id="book-cover" name="cover" value="<?=$book["cover"]?>">
                </label>
                <!-- <input type="text" class="d-none" name="cover"> -->
                
                <img id="cover-img" src="<?=$book["cover"]?>" alt="book cover">
            </div>
        </div>
    
        <div class="change-desc">
            <div class="groups">
                <div class="form-control">
                    <div class="input-group">
                        <label for="book-title">title</label>
                        <input type="text" name="title" id="book-title" value="<?=$book["title"]?>">
                    </div>
                
                    <div class="input-group">
                        <label for="book-author">author</label>
                        <input type="text" name="author" id="book-author" value="<?=$book["author"]?>">
                    </div>
                
                    <div class="input-group">
                        <label for="book-release-year">release year</label>
                        <input type="date" name="release_year" id="book-release-year" value="<?=$book["release_year"]?>">
                    </div>
                
                    <div class="input-group">
                        <label for="book-edition-house">edition house</label>
                        <input type="text" name="edition_house" id="book-edition-house" value="<?=$book["edition_house"]?>">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input-group">
                        <label for="book-buy-date">buy date</label>
                        <input type="date" name="buy_date" id="book-buy-date" value="<?=$book["buy_date"]?>">
                    </div>
                
                    <div class="input-group">
                        <label for="book-price">price</label>
                        <input type="number" name="price" id="book-price" value="<?=$book["price"]?>">
                    </div>
                
                    <div class="input-group">
                        <label for="book-pages">pages</label>
                        <input type="number" name="pages" id="book-pages" value="<?=$book["pages"]?>">
                    </div>
                </div>
            </div>
        
            <div class="groups">
                <div class="input-group">
                    <button type="submit" class="btn" name="id" value="<?=$id?>">Update Book</button>
                </div>
            </div>
        </div>
    </form>
</div>


<?php require_once 'footer.php'; ?>